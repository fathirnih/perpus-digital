@extends('layouts.app')

@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('title', 'Pengembalian Buku')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-teal-50 via-white to-blue-50">
    <!-- Header -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-teal-600/10 to-green-600/10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2 flex items-center">
                        <div class="mr-3 p-2 bg-gradient-to-r from-teal-500 to-green-500 rounded-xl shadow-lg">
                            <i class="fas fa-exchange-alt text-white text-xl"></i>
                        </div>
                        Pengembalian Buku
                    </h1>
                    <p class="text-gray-600">Kelola dan ajukan pengembalian buku yang telah dipinjam</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200">
                            <div class="text-sm text-gray-500">Total Dipinjam</div>
                            <div class="text-xl font-bold text-teal-600">{{ $detailPeminjaman->count() }}</div>
                        </div>
                        <div class="bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-200">
                            <div class="text-sm text-gray-500">Belum Dikembalikan</div>
                            <div class="text-xl font-bold text-yellow-600">
                                {{ $detailPeminjaman->where('status_kembali', 'dipinjam')->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
        <!-- Success Message -->
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
                        <p class="text-green-600 text-sm mt-1">Status buku akan diperbarui setelah konfirmasi admin</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Main Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-gradient-to-r from-teal-50 to-green-50 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <div class="h-10 w-10 rounded-lg bg-teal-100 flex items-center justify-center mr-3">
                            <i class="fas fa-book-open text-teal-600"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Daftar Buku Dipinjam</h2>
                            <p class="text-sm text-gray-600">Ajukan pengembalian buku yang telah selesai dibaca</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <input type="text" id="searchInput" 
                                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 w-full sm:w-64" 
                                   placeholder="Cari buku...">
                            <div class="absolute left-3 top-2.5">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <button id="filterButton" class="p-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-filter text-gray-600"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <span>No</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-book mr-2"></i>
                                    <span>Buku</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-hashtag mr-2"></i>
                                    <span>Jumlah</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <span>Tanggal</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    <span>Status</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-cogs mr-2"></i>
                                    <span>Aksi</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($detailPeminjaman as $i => $detail)
                        <tr class="hover:bg-gray-50 transition-colors duration-150 book-row" 
                            data-title="{{ strtolower($detail->buku->judul) }}"
                            data-status="{{ $detail->status_kembali }}">
                            <!-- Nomor -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 text-center">
                                    <div class="h-8 w-8 bg-gray-100 rounded-lg flex items-center justify-center mx-auto">
                                        {{ $i + 1 }}
                                    </div>
                                </div>
                            </td>

                            <!-- Informasi Buku -->
                            <td class="px-6 py-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-teal-100 to-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-book text-teal-600"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $detail->buku->judul }}</div>
                                        <div class="text-xs text-gray-500 mt-1">
                                            <div class="flex items-center space-x-3">
                                                <span class="flex items-center">
                                                    <i class="fas fa-user-edit mr-1"></i>
                                                    <span>Kode: B{{ str_pad($detail->buku->id, 3, '0', STR_PAD_LEFT) }}</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Jumlah -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-center">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 border border-blue-100">
                                        <i class="fas fa-layer-group text-blue-600 mr-2 text-sm"></i>
                                        <span class="font-semibold text-blue-700">{{ $detail->jumlah }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Tanggal -->
                            <td class="px-6 py-4">
                                <div class="space-y-1">
                                    <div class="flex items-center text-sm text-gray-900">
                                        <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>
                                        {{ date('d M Y', strtotime($detail->peminjaman->tanggal_pinjam)) }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-sign-in-alt mr-2 text-gray-400"></i>
                                        @if($detail->status_kembali == 'dikembalikan')
                                            {{ date('d M Y', strtotime($detail->peminjaman->tanggal_kembali)) }}
                                        @else
                                            <span class="italic">Belum dikembalikan</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($detail->status_kembali)
                                    @case('dipinjam')
                                        <div class="inline-flex flex-col items-start">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                <i class="fas fa-clock mr-1.5"></i>
                                                Dipinjam
                                            </span>
                                            <div class="mt-1 text-xs text-gray-500">
                                                <i class="fas fa-hourglass-half mr-1"></i>
                                                {{ \Carbon\Carbon::parse($detail->peminjaman->tanggal_pinjam)->diffForHumans() }}
                                            </div>
                                        </div>
                                        @break
                                    @case('menunggu persetujuan')
                                        <div class="inline-flex flex-col items-start">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="fas fa-hourglass-half mr-1.5 animate-pulse"></i>
                                                Menunggu Persetujuan
                                            </span>
                                            <div class="mt-1 text-xs text-blue-600">
                                                <i class="fas fa-info-circle mr-1"></i>
                                                Menunggu konfirmasi admin
                                            </div>
                                        </div>
                                        @break
                                    @case('dikembalikan')
                                        <div class="inline-flex flex-col items-start">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">
                                                <i class="fas fa-check-circle mr-1.5"></i>
                                                Telah Dikembalikan
                                            </span>
                                            <div class="mt-1 text-xs text-green-600">
                                                <i class="fas fa-calendar-check mr-1"></i>
                                                {{ \Carbon\Carbon::parse($detail->peminjaman->tanggal_kembali)->diffForHumans() }}
                                            </div>
                                        </div>
                                        @break
                                    @default
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                            <i class="fas fa-question-circle mr-1.5"></i>
                                            Status Tidak Diketahui
                                        </span>
                                @endswitch
                            </td>

                            <!-- Aksi -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if($detail->status_kembali == 'dipinjam')
                                    <div class="relative group">
                                        <form action="{{ route('anggota.pengembalian.ajukan', $detail->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-4 py-2 rounded-lg transition-all duration-200 transform hover:scale-105 active:scale-95
                                                           bg-gradient-to-r from-yellow-500 to-amber-500 text-white font-medium shadow-lg hover:shadow-xl hover:from-yellow-600 hover:to-amber-600
                                                           focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 group">
                                                <i class="fas fa-paper-plane mr-2 group-hover:rotate-12 transition-transform duration-200"></i>
                                                Ajukan Pengembalian
                                            </button>
                                        </form>
                                        <div class="absolute z-10 invisible group-hover:visible opacity-0 group-hover:opacity-100 
                                                    transition-all duration-200 transform -translate-y-2 group-hover:translate-y-0
                                                    w-full text-center mt-2">
                                            <div class="bg-gray-900 text-white text-xs rounded py-1 px-2 whitespace-nowrap">
                                                Klik untuk mengajukan pengembalian
                                            </div>
                                            <div class="w-3 h-3 bg-gray-900 transform rotate-45 absolute -top-1 left-1/2 -translate-x-1/2"></div>
                                        </div>
                                    </div>
                                @elseif($detail->status_kembali == 'menunggu persetujuan')
                                    <div class="inline-flex items-center px-4 py-2 bg-blue-50 border border-blue-200 rounded-lg">
                                        <i class="fas fa-spinner fa-spin text-blue-600 mr-2"></i>
                                        <span class="text-blue-700 font-medium">Dalam Proses</span>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center mx-auto">
                                            <i class="fas fa-check text-green-600"></i>
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1">Selesai</div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <!-- Empty State -->
                        <tr>
                            <td colspan="6" class="px-6 py-12">
                                <div class="text-center">
                                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-br from-gray-100 to-gray-200 mb-4">
                                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada buku untuk dikembalikan</h3>
                                    <p class="text-gray-500 max-w-md mx-auto mb-6">
                                        Saat ini Anda tidak memiliki buku yang perlu dikembalikan. 
                                        Kunjungi halaman peminjaman untuk meminjam buku baru.
                                    </p>
                                    <a href="{{ route('anggota.peminjaman') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-teal-500 to-green-500 text-white rounded-lg hover:from-teal-600 hover:to-green-600 transition-all duration-200">
                                        <i class="fas fa-book-reader mr-2"></i>
                                        Pinjam Buku Baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="text-sm text-gray-500 mb-4 sm:mb-0">
                        Menampilkan <span class="font-semibold">{{ $detailPeminjaman->count() }}</span> buku
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="text-sm text-gray-500">
                            Status:
                        </div>
                        <div class="flex space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-800">
                                <i class="fas fa-circle text-yellow-500 mr-1"></i>
                                Dipinjam ({{ $detailPeminjaman->where('status_kembali', 'dipinjam')->count() }})
                            </span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                                <i class="fas fa-circle text-blue-500 mr-1"></i>
                                Menunggu ({{ $detailPeminjaman->where('status_kembali', 'menunggu persetujuan')->count() }})
                            </span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                <i class="fas fa-circle text-green-500 mr-1"></i>
                                Dikembalikan ({{ $detailPeminjaman->where('status_kembali', 'dikembalikan')->count() }})
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
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

    .book-row {
        transition: all 0.2s ease;
    }

    .book-row:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const bookRows = document.querySelectorAll('.book-row');

        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            
            bookRows.forEach(row => {
                const title = row.getAttribute('data-title');
                if (title.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Filter button functionality
        const filterButton = document.getElementById('filterButton');
        let showingAll = true;

        filterButton.addEventListener('click', function() {
            showingAll = !showingAll;
            
            bookRows.forEach(row => {
                const status = row.getAttribute('data-status');
                if (showingAll) {
                    row.style.display = '';
                } else {
                    // Show only pending return
                    if (status === 'dipinjam') {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });

            // Update button icon
            const icon = filterButton.querySelector('i');
            if (showingAll) {
                icon.className = 'fas fa-filter text-gray-600';
                filterButton.setAttribute('title', 'Filter: Semua');
            } else {
                icon.className = 'fas fa-filter text-yellow-600';
                filterButton.setAttribute('title', 'Filter: Belum Dikembalikan');
            }
        });

        // Add subtle animation to action buttons
        document.querySelectorAll('form button[type="submit"]').forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endpush
@endsection