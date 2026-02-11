@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Tambah Kategori')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50/30">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
        <div class="absolute top-40 -left-40 w-80 h-80 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    </div>

    <div class="relative">
        <!-- Header -->
        <div class="mb-8 pt-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-r from-white/90 to-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-8 border border-white/50">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Tambah Kategori Baru</span>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-tags text-blue-500 mr-2"></i>
                                Tambah kategori baru untuk mengelola koleksi buku
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <a href="{{ route('admin.kategori.index') }}" 
                               class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
            <!-- Form Card -->
            <div class="bg-gradient-to-r from-white/90 to-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-8 border border-white/50">
                <form action="{{ route('admin.kategori.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Nama Kategori -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-3">
                            <span class="flex items-center">
                                <i class="fas fa-tag text-blue-500 mr-2"></i>
                                Nama Kategori
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-heading text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama') }}"
                                   placeholder="Masukkan nama kategori"
                                   class="w-full pl-10 pr-4 py-3 text-lg border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-300"
                                   required>
                        </div>
                        @error('nama')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-3">
                            <span class="flex items-center">
                                <i class="fas fa-comment-dots text-blue-500 mr-2"></i>
                                Keterangan
                            </span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="fas fa-align-left text-gray-400"></i>
                            </div>
                            <textarea id="keterangan" 
                                      name="keterangan" 
                                      rows="4"
                                      placeholder="Masukkan keterangan kategori (opsional)"
                                      class="w-full pl-10 pr-4 py-3 text-lg border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-300 resize-none">{{ old('keterangan') }}</textarea>
                        </div>
                        @error('keterangan')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="flex-1 inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-600 hover:shadow-lg transition-all duration-200 group">
                                <i class="fas fa-save mr-3 group-hover:rotate-12 transition-transform duration-200"></i>
                                Simpan Kategori
                            </button>
                            <a href="{{ route('admin.kategori.index') }}" 
                               class="inline-flex items-center justify-center px-6 py-4 border-2 border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-200">
                                <i class="fas fa-times mr-3"></i>
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Info Card -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="h-12 w-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Tips Menambahkan Kategori</h3>
                        <ul class="text-gray-600 space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Gunakan nama kategori yang jelas dan deskriptif
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Pastikan nama kategori belum pernah digunakan sebelumnya
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                Tambahkan keterangan untuk memudahkan pengelolaan
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    input:focus, textarea:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .resize-none {
        resize: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Focus on first input
        document.getElementById('nama').focus();
        
        // Form validation
        const form = document.querySelector('form');
        const namaInput = document.getElementById('nama');
        
        // Real-time validation for nama
        namaInput.addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length < 2) {
                this.classList.add('border-red-300');
                this.classList.remove('border-green-300');
            } else {
                this.classList.remove('border-red-300');
                this.classList.add('border-green-300');
            }
        });
        
        // Form submission animation
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i> Menyimpan...';
            submitBtn.disabled = true;
            submitBtn.classList.remove('hover:from-green-600', 'hover:to-emerald-600', 'hover:shadow-lg');
        });
    });
</script>
@endsection