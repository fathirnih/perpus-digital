<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Anggota;

class ProfileController extends Controller
{
    public function index()
    {
        $anggota = Auth::guard('anggota')->user();
        return view('anggota.profile.index', compact('anggota'));
    }

    public function update(Request $request)
    {
        $anggota = Auth::guard('anggota')->user();
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:500',
        ]);

        $anggota->update($validated);

        return redirect()->route('anggota.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
