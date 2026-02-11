<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;

class BukuController extends Controller
{
    // Tampilkan daftar buku
   public function index(Request $request)
{
    // Query dasar dengan eager loading dan ordering
    $query = Buku::with('kategori')
                 ->orderBy('created_at', 'desc');

    // Tambahkan filter search jika ada
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('judul', 'like', '%' . $search . '%')
              ->orWhere('pengarang', 'like', '%' . $search . '%')
              ->orWhere('penerbit', 'like', '%' . $search . '%')
              ->orWhereHas('kategori', function($q) use ($search) {
                  $q->where('nama', 'like', '%' . $search . '%');
              });
        });
    }

     // Filter berdasarkan kategori
    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('kategori_id', $request->kategori);
    }

    // Lakukan pagination pada query yang telah difilter
    $buku = $query->paginate(10);

    $kategori = Kategori::all();

    return view('admin.buku.index', compact('buku','kategori'));
}

    // Form tambah buku
    public function create()
    {
        $kategori = Kategori::all(); // untuk dropdown kategori
        return view('admin.buku.create', compact('kategori'));
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'nullable',
            'penerbit' => 'nullable',
            'tahun_terbit' => 'required|integer',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        Buku::create($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all(); // untuk dropdown kategori
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    // Update buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'nullable',
            'penerbit' => 'nullable',
            'tahun_terbit' => 'required|integer',
            'jumlah' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Hapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}