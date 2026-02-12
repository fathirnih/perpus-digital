<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;

class AnggotaAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('anggota.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string',
            'nama' => 'required|string',
        ]);

        $anggota = Anggota::where('nisn', trim($request->nisn))
                           ->where('nama', trim($request->nama))
                           ->first();

        if ($anggota) {
            Auth::guard('anggota')->login($anggota);
            $request->session()->regenerate();
            return redirect()->intended('/anggota/dashboard');
        }

        return back()->withErrors(['nisn' => 'NISN atau Nama salah!'])->withInput();
    }

    public function showRegisterForm()
    {
        return view('anggota.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|unique:anggota,nisn',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'alamat' => 'required|string|max:500',
        ]);

        try {
            Anggota::create([
                'nisn' => trim($request->nisn),
                'nama' => trim($request->nama),
                'kelas' => trim($request->kelas),
                'alamat' => trim($request->alamat),
            ]);

            return redirect()->route('anggota.login')->with('success', 'Registrasi berhasil, silakan login.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('anggota')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $anggota = Auth::guard('anggota')->user();  

        if (!$anggota) {
            return redirect()->route('login');
        }

        // Total buku yang sedang dipinjam
        $totalDipinjam = \App\Models\DetailPeminjaman::whereHas('peminjaman', function($q) use ($anggota) {
            $q->where('anggota_id', $anggota->id);
        })->where('status_kembali', 'dipinjam')->sum('jumlah');

        // Total buku yang menunggu pengembalian / menunggu persetujuan
        $totalMenunggu = \App\Models\DetailPeminjaman::whereHas('peminjaman', function($q) use ($anggota) {
            $q->where('anggota_id', $anggota->id);
        })->where('status_kembali', 'menunggu persetujuan')->sum('jumlah');

        // Total buku yang sudah dikembalikan
        $totalDikembalikan = \App\Models\DetailPeminjaman::whereHas('peminjaman', function($q) use ($anggota) {
            $q->where('anggota_id', $anggota->id);
        })->where('status_kembali', 'dikembalikan')->sum('jumlah');

        return view('anggota.dashboard.index', compact(
            'anggota',
            'totalDipinjam',
            'totalMenunggu',
            'totalDikembalikan'
        ));
    }
}