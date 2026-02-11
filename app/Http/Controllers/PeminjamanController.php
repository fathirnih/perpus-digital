<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    // Tampilkan dashboard peminjaman anggota + daftar buku
    public function index()
    {
        $anggota = Auth::guard('anggota')->user();

        // Daftar peminjaman anggota ini dengan relasi
        $peminjaman = Peminjaman::with('buku', 'detailPeminjaman')
                        ->where('anggota_id', $anggota->id)
                        ->get();

        // Semua buku tersedia (stok > 0)
        $buku = Buku::where('jumlah', '>', 0)->get();

        return view('anggota.peminjaman.index', compact('anggota', 'peminjaman', 'buku'));
    }

    // Simpan peminjaman baru (bisa lebih dari 1 buku & jumlah) dengan validasi stok
    public function store(Request $request)
    {
        $request->validate([
            'buku_ids' => 'required|array|min:1',
            'buku_ids.*' => 'exists:buku,id',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        $anggota = Auth::guard('anggota')->user();

        DB::beginTransaction();
        try {
            // 1. Buat satu record peminjaman
            $peminjaman = Peminjaman::create([
                'anggota_id' => $anggota->id,
                'tanggal_pinjam' => now(),
                'status' => 'dipinjam',
                'tanggal_kembali' => null,
            ]);

            // 2. Attach buku ke pivot table detail_peminjaman dengan cek stok
            foreach ($request->buku_ids as $buku_id) {
                $jumlah = $request->jumlah[$buku_id] ?? 1;
                $buku = Buku::find($buku_id);

                if (!$buku || $buku->jumlah < $jumlah) {
                    throw ValidationException::withMessages([
                        'buku_ids' => "Stok buku '{$buku->judul}' tidak cukup. Stok tersedia: {$buku->jumlah}."
                    ]);
                }

                $peminjaman->buku()->attach($buku_id, ['jumlah' => $jumlah, 'status_kembali' => 'dipinjam']);

                // Kurangi stok buku
                $buku->decrement('jumlah', $jumlah);
            }

            DB::commit();
            return redirect()->route('anggota.peminjaman')->with('success', 'Buku berhasil dipinjam.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    // Kembalikan buku (hanya yang masih dipinjam atau menunggu)
    public function pengembalian()
    {
        $anggota = Auth::guard('anggota')->user();

        // Ambil detail peminjaman yang masih dipinjam atau menunggu persetujuan
        $detailPeminjaman = DetailPeminjaman::with('buku', 'peminjaman')
            ->whereHas('peminjaman', function($q) use ($anggota) {
                $q->where('anggota_id', $anggota->id)
                  ->where('status', 'dipinjam');
            })
            ->whereIn('status_kembali', ['dipinjam', 'menunggu persetujuan'])
            ->get();

        return view('anggota.pengembalian.index', compact('detailPeminjaman'));
    }

    // Ajukan pengembalian per buku dengan error handling
    public function ajukanKembali($detail_id)
    {
        $detail = DetailPeminjaman::with('peminjaman')->findOrFail($detail_id);

        // Cek apakah anggota sama
        if ($detail->peminjaman->anggota_id != Auth::guard('anggota')->id()) {
            abort(403, 'Akses ditolak.');
        }

        // Cek status sudah ajukan atau dikembalikan
        if ($detail->status_kembali != 'dipinjam') {
            return redirect()->back()->withErrors(['error' => 'Buku sudah diajukan atau dikembalikan.']);
        }

        // Update status_kembali menjadi menunggu persetujuan
        $detail->status_kembali = 'menunggu persetujuan';
        $detail->save();

        return redirect()->route('anggota.pengembalian')->with('success', 'Pengembalian buku diajukan, menunggu konfirmasi admin.');
    }
}