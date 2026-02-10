@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Buku')

@section('content')
<h1 class="text-3xl font-bold mb-4">Edit Buku</h1>

<form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" class="flex flex-col gap-4 w-96">
    @csrf
    @method('PUT')
    
    <input type="text" name="judul" value="{{ $buku->judul }}" class="border p-2 rounded" placeholder="Judul" required>
    <input type="text" name="pengarang" value="{{ $buku->pengarang }}" class="border p-2 rounded" placeholder="Pengarang">
    <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="border p-2 rounded" placeholder="Penerbit">

    <!-- Tahun Terbit -->
    <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" class="border p-2 rounded" placeholder="Tahun Terbit" required>

    <!-- Jumlah -->
    <input type="number" name="jumlah" value="{{ $buku->jumlah }}" class="border p-2 rounded" placeholder="Jumlah Buku" required>

    <!-- Dropdown Kategori -->
    <select name="kategori_id" class="border p-2 rounded" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $k)
            <option value="{{ $k->id }}" {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                {{ $k->nama }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Update</button>
</form>
@endsection
