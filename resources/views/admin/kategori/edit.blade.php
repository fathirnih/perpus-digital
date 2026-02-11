@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Kategori')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Kategori</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-gradient-to-r from-white to-gray-50 shadow-xl rounded-xl p-8">
        <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Input -->
            <div class="relative">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                <div class="relative">
                    <i class="fas fa-tag absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="nama" name="nama" value="{{ $kategori->nama }}" placeholder="Masukkan Nama Kategori" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                </div>
                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan Textarea -->
            <div class="relative">
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <div class="relative">
                    <i class="fas fa-comment absolute left-3 top-3 text-gray-400"></i>
                    <textarea id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" rows="4" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200">{{ $kategori->keterangan }}</textarea>
                </div>
                @error('keterangan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-3 px-6 rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition duration-300 flex items-center justify-center shadow-md">
                <i class="fas fa-edit mr-2"></i> Update Kategori
            </button>
        </form>
    </div>
</div>
@endsection
