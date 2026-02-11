@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Tambah Buku')

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
                                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Tambah Buku Baru</span>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-book text-blue-500 mr-2"></i>
                                Isi form berikut untuk menambahkan buku baru ke koleksi perpustakaan
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <a href="{{ route('admin.buku.index') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-500 to-gray-600 text-white font-medium rounded-xl hover:from-gray-600 hover:to-gray-700 hover:shadow-lg transition-all duration-200 group">
                                <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
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
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                            <i class="fas fa-edit text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Form Tambah Buku</h2>
                            <p class="text-sm text-gray-600">Lengkapi semua data buku di bawah ini</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    @if($errors->any())
                    <div class="mb-6 animate-slide-down">
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 rounded-r-lg p-4 shadow-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-exclamation-circle text-red-600"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-red-800 font-medium">Periksa kembali data yang Anda masukkan</p>
                                    <ul class="mt-2 text-sm text-red-600 list-disc list-inside">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('admin.buku.store') }}" method="POST" class="space-y-8">
                        @csrf

                        <!-- Judul Buku -->
                        <div class="group">
                            <label for="judul" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <i class="fas fa-book mr-2 text-blue-500"></i>
                                Judul Buku
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="judul" 
                                       name="judul" 
                                       value="{{ old('judul') }}"
                                       placeholder="Masukkan judul buku lengkap" 
                                       class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400"
                                       required>
                                <div class="absolute left-3 top-3.5">
                                    <i class="fas fa-heading text-gray-400 group-hover:text-blue-400 transition-colors duration-200"></i>
                                </div>
                            </div>
                            @error('judul')
                                <p class="text-red-600 text-sm mt-2 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Pengarang -->
                            <div class="group">
                                <label for="pengarang" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-user-edit mr-2 text-green-500"></i>
                                    Pengarang
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           id="pengarang" 
                                           name="pengarang" 
                                           value="{{ old('pengarang') }}"
                                           placeholder="Nama pengarang" 
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400">
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-user text-gray-400 group-hover:text-green-400 transition-colors duration-200"></i>
                                    </div>
                                </div>
                                @error('pengarang')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Penerbit -->
                            <div class="group">
                                <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-building mr-2 text-yellow-500"></i>
                                    Penerbit
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           id="penerbit" 
                                           name="penerbit" 
                                           value="{{ old('penerbit') }}"
                                           placeholder="Nama penerbit" 
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400">
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-university text-gray-400 group-hover:text-yellow-400 transition-colors duration-200"></i>
                                    </div>
                                </div>
                                @error('penerbit')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Tahun Terbit -->
                            <div class="group">
                                <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-calendar-alt mr-2 text-purple-500"></i>
                                    Tahun Terbit
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           id="tahun_terbit" 
                                           name="tahun_terbit" 
                                           value="{{ old('tahun_terbit') }}"
                                           placeholder="Contoh: 2024" 
                                           min="1900" 
                                           max="{{ date('Y') + 5 }}"
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400"
                                           required>
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-calendar text-gray-400 group-hover:text-purple-400 transition-colors duration-200"></i>
                                    </div>
                                </div>
                                @error('tahun_terbit')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Jumlah -->
                            <div class="group">
                                <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-boxes mr-2 text-red-500"></i>
                                    Jumlah Buku
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           id="jumlah" 
                                           name="jumlah" 
                                           value="{{ old('jumlah') }}"
                                           placeholder="Jumlah eksemplar" 
                                           min="0"
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400"
                                           required>
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-hashtag text-gray-400 group-hover:text-red-400 transition-colors duration-200"></i>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="flex items-center">
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div id="stok-progress" class="h-2 rounded-full bg-green-500 w-0"></div>
                                        </div>
                                        <span id="stok-status" class="ml-2 text-xs text-gray-500">0 eks</span>
                                    </div>
                                </div>
                                @error('jumlah')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div class="group">
                                <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-tags mr-2 text-indigo-500"></i>
                                    Kategori
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <select id="kategori_id" 
                                            name="kategori_id" 
                                            class="w-full pl-12 pr-10 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400 appearance-none bg-white"
                                            required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-layer-group text-gray-400 group-hover:text-indigo-400 transition-colors duration-200"></i>
                                    </div>
                                    <div class="absolute right-3 top-3.5 pointer-events-none">
                                        <i class="fas fa-chevron-down text-gray-400"></i>
                                    </div>
                                </div>
                                @error('kategori_id')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Info Tambahan (Optional - jika ada field tambahan di database) -->
                            @if(false) <!-- Nonaktifkan jika tidak ada field tambahan -->
                            <div class="group">
                                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <i class="fas fa-barcode mr-2 text-teal-500"></i>
                                    ISBN (Opsional)
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           id="isbn" 
                                           name="isbn" 
                                           value="{{ old('isbn') }}"
                                           placeholder="Kode ISBN buku" 
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 hover:border-gray-400">
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-qrcode text-gray-400 group-hover:text-teal-400 transition-colors duration-200"></i>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <button type="submit" 
                                        class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-600 hover:shadow-xl transition-all duration-200 group flex-1">
                                    <i class="fas fa-plus mr-3 group-hover:rotate-90 transition-transform duration-300"></i>
                                    Simpan Buku
                                </button>
                                <a href="{{ route('admin.buku.index') }}" 
                                   class="inline-flex items-center justify-center px-8 py-4 border-2 border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 group flex-1">
                                    <i class="fas fa-times mr-3 group-hover:rotate-90 transition-transform duration-300"></i>
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl shadow-md p-6 border border-blue-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-info-circle text-blue-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Tips Menambahkan Buku</h3>
                        <div class="mt-2 text-gray-600">
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Pastikan judul buku sesuai dengan sampul</li>
                                <li>Periksa kembali data pengarang dan penerbit</li>
                                <li>Isi jumlah buku dengan benar untuk manajemen stok</li>
                                <li>Pilih kategori yang sesuai untuk memudahkan pencarian</li>
                                <li>Tahun terbit tidak boleh lebih dari {{ date('Y') + 5 }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slide-down {
        animation: slideDown 0.3s ease-out;
    }

    /* Custom styling for number input */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Progress bar for stock quantity
    const jumlahInput = document.getElementById('jumlah');
    const stokProgress = document.getElementById('stok-progress');
    const stokStatus = document.getElementById('stok-status');

    if (jumlahInput && stokProgress && stokStatus) {
        jumlahInput.addEventListener('input', function() {
            const value = parseInt(this.value) || 0;
            let percentage = Math.min(100, (value / 100) * 100);
            
            // Set progress bar color based on quantity
            if (value >= 50) {
                stokProgress.className = 'h-2 rounded-full bg-green-500';
            } else if (value >= 10) {
                stokProgress.className = 'h-2 rounded-full bg-yellow-500';
            } else {
                stokProgress.className = 'h-2 rounded-full bg-red-500';
            }
            
            stokProgress.style.width = percentage + '%';
            stokStatus.textContent = value + ' eks';
        });
    }

    // Auto-format tahun terbit
    const tahunInput = document.getElementById('tahun_terbit');
    if (tahunInput) {
        tahunInput.addEventListener('blur', function() {
            let year = parseInt(this.value);
            const currentYear = new Date().getFullYear();
            
            if (year < 1900) {
                this.value = 1900;
            } else if (year > currentYear + 5) {
                this.value = currentYear + 5;
            }
        });
    }

    // Highlight active form groups
    const formGroups = document.querySelectorAll('.group');
    formGroups.forEach(group => {
        const input = group.querySelector('input, select, textarea');
        if (input) {
            input.addEventListener('focus', function() {
                group.classList.add('ring-2', 'ring-blue-200', 'rounded-xl', 'p-2', '-m-2');
            });
            
            input.addEventListener('blur', function() {
                group.classList.remove('ring-2', 'ring-blue-200', 'rounded-xl', 'p-2', '-m-2');
            });
        }
    });

    // Auto-focus on first input
    const firstInput = document.querySelector('form input');
    if (firstInput) {
        firstInput.focus();
    }
});
</script>
@endsection