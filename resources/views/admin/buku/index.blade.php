@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Daftar Buku')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Buku</h1>
        <a href="{{ route('admin.buku.create') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-700 transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Buku
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengarang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerbit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Terbit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($buku as $i => $b)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $i + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $b->judul }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $b->pengarang }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $b->penerbit }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $b->tahun_terbit }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $b->kategori ? $b->kategori->nama : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $b->jumlah }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-2">
                            <a href="{{ route('admin.buku.edit', $b->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-200 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.buku.destroy', $b->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-200 flex items-center" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
