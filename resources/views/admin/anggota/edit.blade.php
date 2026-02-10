@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Anggota')

@section('content')
<h1 class="text-3xl font-bold mb-4">Edit Anggota</h1>

<form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST" class="flex flex-col gap-4 w-96">
    @csrf
    @method('PUT')
    <input type="text" name="nisn" value="{{ $anggota->nisn }}" class="border p-2 rounded" required>
    <input type="text" name="nama" value="{{ $anggota->nama }}" class="border p-2 rounded" required>
    <input type="text" name="kelas" value="{{ $anggota->kelas }}" class="border p-2 rounded" required>
    <button type="submit" class="bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Update</button>
</form>
@endsection
