<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        // Ambil semua peminjaman yang status_kembali menunggu persetujuan
        $peminjaman_pending = Peminjaman::with('anggota', 'detailPeminjaman.buku')
            ->whereHas('detailPeminjaman', function($q) {
                $q->where('status_kembali', 'menunggu persetujuan'); // <-- fix enum
            })
            ->orderBy('tanggal_pinjam', 'desc')
            ->get();

        return view('admin.pengembalian.index', compact('peminjaman_pending'));
    }

    // Admin menerima pengembalian buku
    public function terimaKembali($id)
{
    $detail = DetailPeminjaman::findOrFail($id);

    // Update status_kembali
    $detail->status_kembali = 'dikembalikan';
    $detail->save();

    // Kembalikan stok buku
    $detail->buku->increment('jumlah', $detail->jumlah);

    // Cek jika semua detail sudah dikembalikan, update status peminjaman
    $peminjaman = $detail->peminjaman;
    $allReturned = $peminjaman->detailPeminjaman()->where('status_kembali', '!=', 'dikembalikan')->count() === 0;

    if ($allReturned) {
        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_kembali = now();
        $peminjaman->save();
    }

    return redirect()->route('admin.pengembalian.index')
        ->with('success', 'Pengembalian buku berhasil disetujui.');
}


    // Admin menolak pengembalian buku
    public function tolakKembali($id)
    {
        $detail = DetailPeminjaman::findOrFail($id);

        $detail->status_kembali = 'dipinjam';
        $detail->save();

        return redirect()->route('admin.pengembalian.index')
            ->with('success', 'Pengembalian buku ditolak.');
    }
}
