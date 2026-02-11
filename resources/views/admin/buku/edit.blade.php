@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Buku')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit Buku</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-gradient-to-r from-white to-gray-50 shadow-xl rounded-xl p-8">
        <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Input Grid (Judul and Pengarang) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Input -->
                <div class="relative">
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <div class="relative">
                        <i class="fas fa-book absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" id="judul" name="judul" value="{{ $buku->judul }}" placeholder="Masukkan Judul Buku" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                    </div>
                    @error('judul')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pengarang Input -->
                <div class="relative">
                    <label for="pengarang" class="block text-sm font-medium text-gray-700 mb-2">Pengarang</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}" placeholder="Masukkan Pengarang" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                    </div>
                    @error('pengarang')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Input Grid (Penerbit and Tahun Terbit) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Penerbit Input -->
                <div class="relative">
                    <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                    <div class="relative">
                        <i class="fas fa-building absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}" placeholder="Masukkan Penerbit" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                    </div>
                    @error('penerbit')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tahun Terbit Input -->
                <div class="relative">
                    <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                    <div class="relative">
                        <i class="fas fa-calendar absolute left-3 top-3 text-gray-400"></i>
                        <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" placeholder="Masukkan Tahun Terbit" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                    </div>
                    @error('tahun_terbit')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Input Grid (Jumlah and Kategori) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jumlah Input -->
                <div class="relative">
                    <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Buku</label>
                    <div class="relative">
                        <i class="fas fa-hashtag absolute left-3 top-3 text-gray-400"></i>
                        <input type="number" id="jumlah" name="jumlah" value="{{ $buku->jumlah }}" placeholder="Masukkan Jumlah Buku" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                    </div>
                    @error('jumlah')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori Select -->
                <div class="relative">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <div class="relative">
                        <i class="fas fa-tags absolute left-3 top-3 text-gray-400"></i>
                        <select id="kategori_id" name="kategori_id" class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('kategori_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-3 px-6 rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition duration-300 flex items-center justify-center shadow-md">
                <i class="fas fa-edit mr-2"></i> Update Buku
            </button>
        </form>
    </div>
</div>
@endsection
