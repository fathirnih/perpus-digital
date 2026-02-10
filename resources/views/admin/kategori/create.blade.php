@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Tambah Kategori')

@section('content')
<h1 class="text-3xl font-bold mb-4">Tambah Kategori</h1>

<form action="{{ route('admin.kategori.store') }}" method="POST" class="flex flex-col gap-4 w-96">
    @csrf
    <input type="text" name="nama" placeholder="Nama Kategori" class="border p-2 rounded" required>
    <textarea name="keterangan" placeholder="Keterangan" class="border p-2 rounded"></textarea>
    <button type="submit" class="bg-green-600 text-white py-2 rounded hover:bg-green-700">Tambah</button>
</form>
@endsection
