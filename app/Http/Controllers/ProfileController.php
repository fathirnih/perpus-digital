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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload foto baru
        if ($request->hasFile('foto')) {
            if ($anggota->foto && Storage::exists('public/' . $anggota->foto)) {
                Storage::delete('public/' . $anggota->foto);
            }
            $fotoPath = $request->file('foto')->store('uploads/anggota', 'public');
            $validated['foto'] = $fotoPath;
        }

        $anggota->update($validated);

        return redirect()->route('anggota.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
