<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
       $search = $request->get('search');
    
    $kategori = Kategori::when($search, function ($query) use ($search) {
        return $query->where('nama', 'like', '%'.$search.'%')
                     ->orWhere('keterangan', 'like', '%'.$search.'%');
    })->paginate(10); // Menambahkan pagination 10 item per halaman
    
    $totalKategori = Kategori::count();
    $kategoriBaruHariIni = Kategori::whereDate('created_at', now())->count();
    
    return view('admin.kategori.index', compact('kategori', 'totalKategori', 'kategoriBaruHariIni', 'search'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama',
            'keterangan' => 'nullable',
        ]);

        Kategori::create($request->all());

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama,'.$id,
            'keterangan' => 'nullable',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
