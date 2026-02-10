@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Daftar Kategori')

@section('content')
<h1 class="text-3xl font-bold mb-4">Daftar Kategori</h1>

<a href="{{ route('admin.kategori.create') }}" class="bg-green-600 text-white py-2 px-4 rounded mb-4 inline-block hover:bg-green-700">Tambah Kategori</a>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Nama</th>
            <th class="border px-2 py-1">Keterangan</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategori as $i => $k)
        <tr>
            <td class="border px-2 py-1">{{ $i + 1 }}</td>
            <td class="border px-2 py-1">{{ $k->nama }}</td>
            <td class="border px-2 py-1">{{ $k->keterangan }}</td>
            <td class="border px-2 py-1 flex gap-2">
                <a href="{{ route('admin.kategori.edit', $k->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                <form action="{{ route('admin.kategori.destroy', $k->id) }}" method="POST">
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
