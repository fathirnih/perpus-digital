@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Tambah Anggota')

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
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-r from-white/90 to-white/80 backdrop-blur-xl rounded-2xl shadow-xl p-8 border border-white/50">
                    <div class="flex items-center">
                        <div class="mr-4 p-3 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl">
                            <i class="fas fa-user-plus text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">
                                Tambah <span class="bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">Anggota Baru</span>
                            </h1>
                            <p class="text-gray-600">
                                <i class="fas fa-info-circle mr-2"></i>
                                Isi form berikut untuk menambahkan anggota baru
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Form Header -->
                <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        <i class="fas fa-edit text-green-600 mr-3"></i>
                        Form Data Anggota
                    </h2>
                    <p class="text-sm text-gray-600 mt-1">Semua field bertanda (*) wajib diisi</p>
                </div>

                <!-- Form Content -->
                <form action="{{ route('admin.anggota.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="space-y-6">
                        <!-- NISN -->
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-id-card text-gray-500 mr-2"></i>
                                NISN <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="nisn" 
                                       name="nisn" 
                                       value="{{ old('nisn') }}"
                                       placeholder="Contoh: 1234567890"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 group-hover:border-green-400"
                                       required>
                                <div class="absolute left-3 top-3.5">
                                    <i class="fas fa-hashtag text-gray-400 group-hover:text-green-500 transition-colors duration-200"></i>
                                </div>
                            </div>
                            @error('nisn')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-user text-gray-500 mr-2"></i>
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="nama" 
                                       name="nama" 
                                       value="{{ old('nama') }}"
                                       placeholder="Masukkan nama lengkap"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 group-hover:border-green-400"
                                       required>
                                <div class="absolute left-3 top-3.5">
                                    <i class="fas fa-user-circle text-gray-400 group-hover:text-green-500 transition-colors duration-200"></i>
                                </div>
                            </div>
                            @error('nama')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-graduation-cap text-gray-500 mr-2"></i>
                                Kelas <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="kelas" 
                                       name="kelas" 
                                       value="{{ old('kelas') }}"
                                       placeholder="Contoh: X IPA 1 / XII IPS 2"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 group-hover:border-green-400"
                                       required>
                                <div class="absolute left-3 top-3.5">
                                    <i class="fas fa-school text-gray-400 group-hover:text-green-500 transition-colors duration-200"></i>
                                </div>
                            </div>
                            @error('kelas')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat (Optional) -->
                        <div class="group">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-home text-gray-500 mr-2"></i>
                                Alamat
                            </label>
                            <div class="relative">
                                <textarea id="alamat" 
                                          name="alamat" 
                                          rows="3"
                                          placeholder="Masukkan alamat lengkap (opsional)"
                                          class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 group-hover:border-green-400 resize-none">{{ old('alamat') }}</textarea>
                                <div class="absolute left-3 top-3.5">
                                    <i class="fas fa-map-marker-alt text-gray-400 group-hover:text-green-500 transition-colors duration-200"></i>
                                </div>
                            </div>
                            @error('alamat')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                                <a href="{{ route('admin.anggota.index') }}" 
                                   class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition duration-200 group">
                                    <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                                    Kembali ke Daftar
                                </a>
                                <div class="flex space-x-4">
                                    <button type="reset" 
                                            class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition duration-200">
                                        <i class="fas fa-redo mr-2"></i>
                                        Reset
                                    </button>
                                    <button type="submit" 
                                            class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-600 hover:shadow-lg transition duration-200 group">
                                        <i class="fas fa-save mr-2 group-hover:rotate-12 transition-transform duration-200"></i>
                                        Simpan Anggota
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Info Card -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl shadow-lg p-6 border border-blue-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-lightbulb text-yellow-500 mr-3"></i>
                    Tips Pengisian
                </h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                        <span>Pastikan NISN belum terdaftar sebelumnya</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                        <span>Nama harus sesuai dengan dokumen resmi</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                        <span>Format kelas: [Tingkat] [Jurusan] [Nomor]</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-0.5 mr-3"></i>
                        <span>Anggota baru dapat login dengan NISN dan Nama</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .group:hover .group-hover\:border-green-400 {
        border-color: #10B981;
    }
    
    .group:hover .group-hover\:text-green-500 {
        color: #10B981;
    }
    
    .group:hover .group-hover\:-translate-x-1 {
        transform: translateX(-0.25rem);
    }
    
    .group:hover .group-hover\:rotate-12 {
        transform: rotate(12deg);
    }
    
    /* Custom scrollbar for textarea */
    textarea::-webkit-scrollbar {
        width: 6px;
    }
    
    textarea::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    textarea::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    
    textarea::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto capitalize name input
    const nameInput = document.getElementById('nama');
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            this.value = this.value.replace(/\b\w/g, l => l.toUpperCase());
        });
    }
    
    // Auto uppercase for NISN
    const nisnInput = document.getElementById('nisn');
    if (nisnInput) {
        nisnInput.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    }
    
    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                submitButton.disabled = true;
            }
        });
    }
});
</script>
@endsection