<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;

class AnggotaAuthController extends Controller
{
    public function showLoginForm() {
        return view('anggota.auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
        ]);

        $anggota = Anggota::where('nisn', $request->nisn)
                           ->where('nama', $request->nama)
                           ->first();

        if ($anggota) {
            Auth::guard('anggota')->login($anggota);
            $request->session()->regenerate();
            return redirect()->intended('/anggota/dashboard');
        }

        return back()->withErrors(['nisn' => 'NISN atau Nama salah!']);
    }

    public function logout(Request $request) {
        Auth::guard('anggota')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/anggota/login');
    }

    public function dashboard() {
        return view('anggota.dashboard.index');
    }
}
