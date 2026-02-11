@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Daftar Kategori')

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
                                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Daftar Kategori</span>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-tags text-blue-500 mr-2"></i>
                                Kelola kategori buku perpustakaan
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <!-- Search Bar -->
                                <form method="GET" action="{{ route('admin.kategori.index') }}" class="relative">
                                    <input type="text" 
                                           name="search"
                                           value="{{ request('search') }}"
                                           placeholder="Cari kategori..." 
                                           class="pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full sm:w-64">
                                    <div class="absolute left-3 top-3.5">
                                        <i class="fas fa-search text-gray-400"></i>
                                    </div>
                                    @if(request('search'))
                                        <a href="{{ route('admin.kategori.index') }}" 
                                           class="absolute right-3 top-3.5 text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    @endif
                                </form>
                                <!-- Add Button -->
                                <a href="{{ route('admin.kategori.create') }}" 
                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-600 hover:shadow-lg transition-all duration-200 group">
                                    <i class="fas fa-plus mr-2 group-hover:rotate-90 transition-transform duration-300"></i>
                                    Tambah Kategori
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-tag text-blue-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Total Kategori</div>
                                    <div class="text-xl font-bold text-gray-800">{{ $totalKategori }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-layer-group text-green-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Kategori Baru Hari Ini</div>
                                    <div class="text-xl font-bold text-gray-800">{{ $kategoriBaruHariIni }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border border-purple-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-star text-purple-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Total Digunakan</div>
                                    <div class="text-xl font-bold text-gray-800">{{ \App\Models\Buku::distinct('kategori_id')->count('kategori_id') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
            @if(session('success'))
            <div class="mb-6 animate-slide-down">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-r-lg p-4 shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-green-800 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 animate-slide-down">
                <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 rounded-r-lg p-4 shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                <i class="fas fa-exclamation-circle text-red-600"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-red-800 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Table Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                <!-- Table Header -->
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <div class="h-10 w-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-list text-blue-600"></i>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Data Kategori Buku</h2>
                                <p class="text-sm text-gray-600">Menampilkan {{ $kategori->count() }} dari {{ $kategori->total() }} kategori</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-hashtag mr-2"></i>
                                        No
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-tag mr-2"></i>
                                        Nama Kategori
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Keterangan
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2"></i>
                                        Dibuat Pada
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($kategori as $i => $k)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <!-- No -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 text-center">
                                        <div class="h-8 w-8 bg-gray-100 rounded-lg flex items-center justify-center mx-auto">
                                            {{ ($kategori->currentPage() - 1) * $kategori->perPage() + $i + 1 }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Nama Kategori -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-tag text-blue-600"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $k->nama }}</div>
                                            <div class="text-xs text-gray-500 mt-1">
                                                ID: {{ $k->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Keterangan -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">
                                        {{ $k->keterangan ?? '-' }}
                                    </div>
                                </td>

                                <!-- Dibuat Pada -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <div class="flex items-center">
                                            <i class="fas fa-calendar-alt mr-2 text-gray-400"></i>
                                            {{ $k->created_at->format('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            {{ $k->created_at->format('H:i') }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Aksi -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.kategori.edit', $k->id) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm font-medium rounded-lg hover:from-blue-600 hover:to-indigo-600 hover:shadow-lg transition-all duration-200 group">
                                            <i class="fas fa-edit mr-2 group-hover:rotate-12 transition-transform duration-200"></i>
                                            Edit
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.kategori.destroy', $k->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white text-sm font-medium rounded-lg hover:from-red-600 hover:to-pink-600 hover:shadow-lg transition-all duration-200 group"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                <i class="fas fa-trash mr-2 group-hover:shake-animation"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="text-gray-400">
                                        <i class="fas fa-tags text-4xl mb-4"></i>
                                        <h3 class="text-lg font-medium text-gray-500">Tidak ada data kategori</h3>
                                        <p class="text-gray-400 mt-2">Mulai dengan menambahkan kategori pertama Anda</p>
                                        <a href="{{ route('admin.kategori.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium rounded-lg hover:from-blue-600 hover:to-indigo-600 hover:shadow-lg transition-all duration-200">
                                            <i class="fas fa-plus mr-2"></i>
                                            Tambah Kategori
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($kategori->hasPages())
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="text-sm text-gray-700 mb-4 sm:mb-0">
                            Menampilkan 
                            <span class="font-medium">{{ ($kategori->currentPage() - 1) * $kategori->perPage() + 1 }}</span>
                            sampai 
                            <span class="font-medium">{{ min($kategori->currentPage() * $kategori->perPage(), $kategori->total()) }}</span>
                            dari 
                            <span class="font-medium">{{ $kategori->total() }}</span>
                            hasil
                        </div>
                        <div>
                            {{ $kategori->withQueryString()->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                </div>
                @endif
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

    @keyframes shake {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(5deg); }
        75% { transform: rotate(-5deg); }
    }

    .animate-slide-down {
        animation: slideDown 0.3s ease-out;
    }

    .shake-animation {
        animation: shake 0.5s ease-in-out;
    }

    .hover\:shake-animation:hover {
        animation: shake 0.5s ease-in-out;
    }

    /* Custom pagination styling */
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        margin: 0 2px;
    }

    .pagination li a,
    .pagination li span {
        display: block;
        padding: 8px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
    }

    .pagination li.active span {
        background: linear-gradient(to right, #3b82f6, #6366f1);
        color: white;
    }

    .pagination li a:not(.active) {
        border: 1px solid #d1d5db;
        color: #374151;
    }

    .pagination li a:not(.active):hover {
        background-color: #f3f4f6;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add animation to buttons on hover
    const actionButtons = document.querySelectorAll('.group');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Auto submit search form when user types (with debounce)
    const searchInput = document.querySelector('input[name="search"]');
    let searchTimeout;
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                this.form.submit();
            }, 500); // 500ms debounce
        });
    }
});
</script>
@endsection