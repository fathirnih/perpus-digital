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
    <input type="text" name="judul" value="{{ $buku->judul }}" class="border p-2 rounded" required>
    <input type="text" name="pengarang" value="{{ $buku->pengarang }}" class="border p-2 rounded">
    <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="border p-2 rounded">
    <input type="text" name="kategori" value="{{ $buku->kategori }}" class="border p-2 rounded">
    <button type="submit" class="bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Update</button>
</form>
@endsection
