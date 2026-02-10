@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Tambah Anggota')

@section('content')
<h1 class="text-3xl font-bold mb-4">Tambah Anggota</h1>

<form action="{{ route('admin.anggota.store') }}" method="POST" class="flex flex-col gap-4 w-96">
    @csrf
    <input type="text" name="nisn" placeholder="NISN" class="border p-2 rounded" required>
    <input type="text" name="nama" placeholder="Nama" class="border p-2 rounded" required>
    <input type="text" name="kelas" placeholder="Kelas" class="border p-2 rounded" required>
    <button type="submit" class="bg-green-600 text-white py-2 rounded hover:bg-green-700">Tambah</button>
</form>
@endsection
