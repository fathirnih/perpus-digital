@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Daftar Buku')

@section('content')
<h1 class="text-3xl font-bold mb-4">Daftar Buku</h1>

<a href="{{ route('admin.buku.create') }}" class="bg-green-600 text-white py-2 px-4 rounded mb-4 inline-block hover:bg-green-700">Tambah Buku</a>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Judul</th>
            <th class="border px-2 py-1">Pengarang</th>
            <th class="border px-2 py-1">Penerbit</th>
            <th class="border px-2 py-1">Kategori</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($buku as $i => $b)
        <tr>
            <td class="border px-2 py-1">{{ $i + 1 }}</td>
            <td class="border px-2 py-1">{{ $b->judul }}</td>
            <td class="border px-2 py-1">{{ $b->pengarang }}</td>
            <td class="border px-2 py-1">{{ $b->penerbit }}</td>
            <td class="border px-2 py-1">{{ $b->kategori }}</td>
            <td class="border px-2 py-1 flex gap-2">
                <a href="{{ route('admin.buku.edit', $b->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('admin.buku.destroy', $b->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
