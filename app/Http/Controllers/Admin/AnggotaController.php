<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:anggota,nisn',
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable',
        ]);

        Anggota::create($request->only(['nisn', 'nama', 'kelas', 'alamat']));

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota.show', compact('anggota'));
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|unique:anggota,nisn,'.$id,
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'nullable',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->only(['nisn', 'nama', 'kelas', 'alamat']));

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        
        // Cek apakah anggota memiliki peminjaman aktif
        if ($anggota->peminjaman()->where('status', 'dipinjam')->exists()) {
            return redirect()->route('admin.anggota.index')
                ->with('error', 'Anggota tidak dapat dihapus karena masih memiliki buku yang dipinjam.');
        }
        
        $anggota->delete();

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}