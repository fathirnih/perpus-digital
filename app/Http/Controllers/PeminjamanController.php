<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Tampilkan dashboard peminjaman anggota + daftar buku
    public function index()
    {
        $anggota = Auth::guard('anggota')->user();

        // Daftar peminjaman anggota ini
        $peminjaman = Peminjaman::with('buku')
                        ->where('anggota_id', $anggota->id)
                        ->get();

        // Semua buku tersedia (stok > 0)
        $buku = Buku::where('jumlah', '>', 0)->get();

        return view('anggota.peminjaman.index', compact('anggota', 'peminjaman', 'buku'));
    }

    // Simpan peminjaman baru (bisa lebih dari 1 buku & jumlah)
   public function store(Request $request)
{
    $request->validate([
        'buku_ids' => 'required|array',
        'buku_ids.*' => 'exists:buku,id',
        'jumlah.*' => 'required|integer|min:1',
    ]);

    $anggota = Auth::guard('anggota')->user();

    // 1. Buat satu record peminjaman
    $peminjaman = Peminjaman::create([
        'anggota_id' => $anggota->id,
        'tanggal_pinjam' => now(),
        'status' => 'dipinjam',
        'tanggal_kembali' => null,
    ]);

    // 2. Attach buku ke pivot table detail_peminjaman
    foreach ($request->buku_ids as $buku_id) {
        $jumlah = $request->jumlah[$buku_id] ?? 1;
        $peminjaman->buku()->attach($buku_id, ['jumlah' => $jumlah]);

        // Kurangi stok buku
        $buku = Buku::find($buku_id);
        if ($buku) {
            $buku->decrement('jumlah', $jumlah);
        }
    }

    return redirect()->route('anggota.peminjaman')->with('success', 'Buku berhasil dipinjam.');
}


    // Kembalikan buku
    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Hanya anggota yang sama bisa mengembalikan
        if ($peminjaman->anggota_id != Auth::guard('anggota')->id()) {
            abort(403);
        }

        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_kembali = now();
        $peminjaman->save();

        return redirect()->route('anggota.peminjaman')->with('success', 'Buku berhasil dikembalikan.');
    }
}
