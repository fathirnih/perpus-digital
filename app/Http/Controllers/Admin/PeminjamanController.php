<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    // Tampilkan semua pengembalian pending
    public function index()
    {
        $peminjaman_pending = Peminjaman::with('anggota', 'buku')
            ->where('status', 'dikembalikan pending')
            ->orderBy('tanggal_pinjam', 'desc')
            ->get();

        return view('admin.peminjaman.index', compact('peminjaman_pending'));
    }

    // Admin menerima pengembalian buku
    public function terimaKembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Ubah status jadi 'dikembalikan' & set tanggal
        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_kembali = now();
        $peminjaman->save();

        // Kembalikan stok buku
        foreach ($peminjaman->buku as $buku) {
            $buku->increment('jumlah', $buku->pivot->jumlah);
        }

        return redirect()->route('admin.peminjaman.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}
