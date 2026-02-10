@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Kategori')

@section('content')
<h1 class="text-3xl font-bold mb-4">Edit Kategori</h1>

<form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="flex flex-col gap-4 w-96">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ $kategori->nama }}" class="border p-2 rounded" required>
    <textarea name="keterangan" class="border p-2 rounded">{{ $kategori->keterangan }}</textarea>
    <button type="submit" class="bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Update</button>
</form>
@endsection
