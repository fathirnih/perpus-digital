@extends('layouts.app')

@section('title', 'Pengembalian Buku')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

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
                                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Daftar Pengajuan Pengembalian</span>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-undo-circle text-blue-500 mr-2"></i>
                                Kelola pengembalian buku dengan mudah
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <!-- Refresh Button -->
                                <a href="{{ route('admin.pengembalian.index') }}" 
                                   class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-200">
                                    <i class="fas fa-redo mr-2"></i>
                                    Refresh
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    @php
                        $totalPending = 0;
                        $totalApproved = 0;
                        $totalRejected = 0;
                        $totalBooks = 0;
                        
                        foreach($peminjaman_pending as $peminjaman) {
                            foreach($peminjaman->detailPeminjaman as $detail) {
                                if($detail->status_kembali == 'menunggu persetujuan') {
                                    $totalPending++;
                                    $totalBooks += $detail->jumlah;
                                } elseif($detail->status_kembali == 'dikembalikan') {
                                    $totalApproved++;
                                } elseif($detail->status_kembali == 'ditolak') {
                                    $totalRejected++;
                                }
                            }
                        }
                    @endphp

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-clock text-blue-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Menunggu Persetujuan</div>
                                    <div class="text-xl font-bold text-gray-800">{{ $totalPending }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-check-circle text-green-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Disetujui</div>
                                    <div class="text-xl font-bold text-gray-800">{{ $totalApproved }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-xl p-4 border border-red-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-times-circle text-red-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Ditolak</div>
                                    <div class="text-xl font-bold text-gray-800">{{ $totalRejected }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border border-purple-100">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                    <i class="fas fa-book text-purple-600"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-600">Total Buku</div>
                                    <div class="text-xl font-bold text-gray-800">{{ $totalBooks }}</div>
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
                                <h2 class="text-lg font-semibold text-gray-800">Data Pengajuan Pengembalian</h2>
                                <p class="text-sm text-gray-600">Menampilkan {{ $peminjaman_pending->count() }} pengajuan</p>
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
                                        <i class="fas fa-user mr-2"></i>
                                        Anggota
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-book mr-2"></i>
                                        Buku
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-boxes mr-2"></i>
                                        Jumlah
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2"></i>
                                        Tanggal Pinjam
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-circle mr-2"></i>
                                        Status
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
                            @forelse($peminjaman_pending as $i => $peminjaman)
                                @foreach($peminjaman->detailPeminjaman as $detail)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <!-- No -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 text-center">
                                            <div class="h-8 w-8 bg-gray-100 rounded-lg flex items-center justify-center mx-auto">
                                                {{ $loop->parent->iteration * 100 + $loop->iteration }}
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Anggota -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-user text-blue-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">{{ $peminjaman->anggota->nama }}</div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    <span class="flex items-center">
                                                        <i class="fas fa-id-card mr-1 text-gray-400"></i>
                                                        {{ $peminjaman->anggota->kode_anggota ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Buku -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-green-100 to-emerald-100 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-book text-green-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">{{ $detail->buku->judul }}</div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    <span class="flex items-center">
                                                        <i class="fas fa-barcode mr-1 text-gray-400"></i>
                                                        {{ $detail->buku->isbn ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Jumlah -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-center">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                                <i class="fas fa-boxes mr-1"></i>
                                                {{ $detail->jumlah }} eks
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Tanggal Pinjam -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <div class="flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-gray-400"></i>
                                                {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}
                                            </div>
                                            <div class="text-xs text-gray-500 mt-1">
                                                {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($detail->status_kembali)
                                            @case('dipinjam')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                                    <i class="fas fa-book mr-1"></i>
                                                    Dipinjam
                                                </span>
                                                @break
                                            @case('menunggu persetujuan')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    Menunggu Persetujuan
                                                </span>
                                                @break
                                            @case('dikembalikan')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                    <i class="fas fa-check-circle mr-1"></i>
                                                    Telah Dikembalikan
                                                </span>
                                                @break
                                            @case('ditolak')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                                    <i class="fas fa-times-circle mr-1"></i>
                                                    Ditolak
                                                </span>
                                                @break
                                            @default
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                                    <i class="fas fa-question-circle mr-1"></i>
                                                    Status Tidak Diketahui
                                                </span>
                                        @endswitch
                                    </td>

                                    <!-- Aksi -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($detail->status_kembali == 'menunggu persetujuan')
                                            <div class="flex items-center space-x-2">
                                                <!-- Setujui Button -->
                                                <form action="{{ route('admin.pengembalian.terima', $detail->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-sm font-medium rounded-lg hover:from-green-600 hover:to-emerald-600 hover:shadow-lg transition-all duration-200 group"
                                                            onclick="return confirm('Setujui pengembalian buku ini?')">
                                                        <i class="fas fa-check-circle mr-2 group-hover:rotate-12 transition-transform duration-200"></i>
                                                        Setujui
                                                    </button>
                                                </form>

                                                <!-- Tolak Button -->
                                                <form action="{{ route('admin.pengembalian.tolak', $detail->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" 
                                                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white text-sm font-medium rounded-lg hover:from-red-600 hover:to-pink-600 hover:shadow-lg transition-all duration-200 group"
                                                            onclick="return confirm('Tolak pengembalian buku ini?')">
                                                        <i class="fas fa-times-circle mr-2 group-hover:shake-animation"></i>
                                                        Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <div class="text-gray-400 text-center">
                                                <i class="fas fa-ban"></i>
                                                <span class="block text-xs mt-1">Tidak tersedia</span>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center">
                                    <div class="text-gray-400">
                                        <i class="fas fa-inbox text-4xl mb-4"></i>
                                        <h3 class="text-lg font-medium text-gray-500">Tidak ada pengajuan pengembalian</h3>
                                        <p class="text-gray-400 mt-2">Belum ada anggota yang mengajukan pengembalian buku</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
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

        // Confirm actions
        const confirmButtons = document.querySelectorAll('button[type="submit"]');
        confirmButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (this.classList.contains('bg-gradient-to-r')) {
                    if (this.closest('form').action.includes('terima')) {
                        if (!confirm('Apakah Anda yakin ingin menyetujui pengembalian ini?')) {
                            e.preventDefault();
                        }
                    } else if (this.closest('form').action.includes('tolak')) {
                        if (!confirm('Apakah Anda yakin ingin menolak pengembalian ini?')) {
                            e.preventDefault();
                        }
                    }
                }
            });
        });

        // Auto refresh every 30 seconds
        setInterval(() => {
            fetch(window.location.href, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                // You can implement partial refresh here if needed
                console.log('Auto-refreshed at', new Date().toLocaleTimeString());
            });
        }, 30000);
    });
</script>
@endsection