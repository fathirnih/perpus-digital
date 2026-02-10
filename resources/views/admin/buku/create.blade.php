@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Tambah Buku')

@section('content')
<h1 class="text-3xl font-bold mb-4">Tambah Buku</h1>

<form action="{{ route('admin.buku.store') }}" method="POST" class="flex flex-col gap-4 w-96">
    @csrf
    <input type="text" name="judul" placeholder="Judul" class="border p-2 rounded" required>
    <input type="text" name="pengarang" placeholder="Pengarang" class="border p-2 rounded">
    <input type="text" name="penerbit" placeholder="Penerbit" class="border p-2 rounded">
    <input type="text" name="kategori" placeholder="Kategori" class="border p-2 rounded">
    <button type="submit" class="bg-green-600 text-white py-2 rounded hover:bg-green-700">Tambah</button>
</form>
@endsection
