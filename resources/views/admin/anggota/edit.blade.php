@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Anggota')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Anggota</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-gradient-to-r from-white to-gray-50 shadow-xl rounded-xl p-8">
        <form action="{{ route('admin.anggota.update', $anggota->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- NISN Input -->
                <div class="relative">
                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                    <div class="relative">
                        <i class="fas fa-id-card absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" id="nisn" name="nisn" value="{{ $anggota->nisn }}" placeholder="Masukkan NISN" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                    </div>
                    @error('nisn')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Input -->
                <div class="relative">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" id="nama" name="nama" value="{{ $anggota->nama }}" placeholder="Masukkan Nama" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                    </div>
                    @error('nama')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Kelas Input (Full Width) -->
            <div class="relative">
                <label for="kelas" class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                <div class="relative">
                    <i class="fas fa-school absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" id="kelas" name="kelas" value="{{ $anggota->kelas }}" placeholder="Masukkan Kelas" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                </div>
                @error('kelas')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-3 px-6 rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition duration-300 flex items-center justify-center shadow-md">
                <i class="fas fa-edit mr-2"></i> Update Anggota
            </button>
        </form>
    </div>
</div>
@endsection