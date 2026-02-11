@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Edit Kategori')

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
                                <span class="bg-gradient-to-r from-yellow-600 to-amber-600 bg-clip-text text-transparent">Edit Kategori</span>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-tags text-yellow-500 mr-2"></i>
                                Edit kategori "{{ $kategori->nama }}" untuk mengelola koleksi buku
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
                <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Nama Kategori -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-3">
                            <span class="flex items-center">
                                <i class="fas fa-tag text-yellow-500 mr-2"></i>
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
                                   value="{{ old('nama', $kategori->nama) }}"
                                   placeholder="Masukkan nama kategori"
                                   class="w-full pl-10 pr-4 py-3 text-lg border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200 hover:border-yellow-300"
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
                                <i class="fas fa-comment-dots text-yellow-500 mr-2"></i>
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
                                      class="w-full pl-10 pr-4 py-3 text-lg border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200 hover:border-yellow-300 resize-none">{{ old('keterangan', $kategori->keterangan) }}</textarea>
                        </div>
                        @error('keterangan')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Stats Card -->
                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl p-6 border border-yellow-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-sm font-medium text-yellow-800 mb-2">Informasi Kategori</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-calendar text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-600">Dibuat Pada</div>
                                            <div class="text-sm font-medium text-gray-800">{{ $kategori->created_at->format('d M Y, H:i') }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-history text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-600">Terakhir Diperbarui</div>
                                            <div class="text-sm font-medium text-gray-800">{{ $kategori->updated_at->format('d M Y, H:i') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-yellow-800 mb-2">Status Kategori</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-barcode text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-600">ID Kategori</div>
                                            <div class="text-sm font-medium text-gray-800">KAT-{{ str_pad($kategori->id, 4, '0', STR_PAD_LEFT) }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-book text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <div class="text-xs text-gray-600">Status</div>
                                            <div class="text-sm font-medium text-gray-800">
                                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $kategori->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ $kategori->status ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="flex-1 inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-yellow-500 to-amber-500 text-white font-medium rounded-xl hover:from-yellow-600 hover:to-amber-600 hover:shadow-lg transition-all duration-200 group">
                                <i class="fas fa-save mr-3 group-hover:rotate-12 transition-transform duration-200"></i>
                                Perbarui Kategori
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

            <!-- Danger Zone -->
            <div class="mt-8 bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl p-6 border border-red-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="h-12 w-12 rounded-xl bg-red-100 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Zona Berbahaya</h3>
                        <p class="text-gray-600 mb-4">Hati-hati dengan tindakan ini. Menghapus kategori akan menghapus semua data terkait dan tindakan ini tidak dapat dibatalkan.</p>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 text-white font-medium rounded-xl hover:from-red-600 hover:to-pink-600 hover:shadow-lg transition-all duration-200 group">
                                    <i class="fas fa-trash mr-3 group-hover:shake-animation"></i>
                                    Hapus Kategori
                                </button>
                            </form>
                            <button type="button" 
                                    onclick="showResetConfirmation()"
                                    class="inline-flex items-center px-6 py-3 border-2 border-red-300 text-red-700 font-medium rounded-xl hover:bg-red-50 transition-all duration-200">
                                <i class="fas fa-redo mr-3"></i>
                                Reset Form
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    input:focus, textarea:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
    }
    
    .resize-none {
        resize: none;
    }
    
    @keyframes shake {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(5deg); }
        75% { transform: rotate(-5deg); }
    }
    
    .shake-animation {
        animation: shake 0.5s ease-in-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Focus on first input
        document.getElementById('nama').focus();
        
        // Real-time validation for nama
        const namaInput = document.getElementById('nama');
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
        
        // Initialize border color based on current value
        if (namaInput.value.trim().length < 2) {
            namaInput.classList.add('border-red-300');
        } else {
            namaInput.classList.add('border-green-300');
        }
        
        // Form submission animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i> Memperbarui...';
            submitBtn.disabled = true;
            submitBtn.classList.remove('hover:from-yellow-600', 'hover:to-amber-600', 'hover:shadow-lg');
        });
    });
    
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus kategori ini? Tindakan ini tidak dapat dibatalkan.');
    }
    
    function showResetConfirmation() {
        if (confirm('Apakah Anda yakin ingin mengembalikan form ke nilai awal?')) {
            window.location.reload();
        }
    }
</script>
@endsection