@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Dashboard Admin')

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
                                Selamat Datang, <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Admin!</span>
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-chart-line text-blue-500 mr-2"></i>
                                Kelola sistem perpustakaan dengan dashboard interaktif
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200">
                                <i class="fas fa-calendar-alt text-blue-600 mr-2"></i>
                                <span class="text-gray-700 font-medium">{{ now()->translatedFormat('l, d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Anggota -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Total Anggota</div>
                                <div class="text-3xl font-bold text-gray-800">{{ \App\Models\Anggota::count() }}</div>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-blue-100 to-indigo-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-users text-2xl text-blue-600"></i>
                                </div>
                                <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                                    <i class="fas fa-user-plus text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                <span>Status</span>
                                <span class="text-green-600 font-medium">Aktif</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-400 to-indigo-500 h-2 rounded-full transition-all duration-1000" 
                                     style="width: {{ \App\Models\Anggota::count() > 0 ? min((\App\Models\Anggota::count() / 100) * 100, 100) : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Buku -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Total Buku</div>
                                <div class="text-3xl font-bold text-gray-800">{{ \App\Models\Buku::count() }}</div>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-green-100 to-emerald-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-book text-2xl text-green-600"></i>
                                </div>
                                <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">
                                    <i class="fas fa-bookmark text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                <span>Stok Tersedia</span>
                                <span class="text-green-600 font-medium">
                                    {{ \App\Models\Buku::where('jumlah', '>', 0)->count() }}
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                @php
                                    $totalBooks = \App\Models\Buku::count();
                                    $availableBooks = \App\Models\Buku::where('jumlah', '>', 0)->count();
                                    $percentage = $totalBooks > 0 ? ($availableBooks / $totalBooks) * 100 : 0;
                                @endphp
                                <div class="bg-gradient-to-r from-green-400 to-emerald-500 h-2 rounded-full transition-all duration-1000" 
                                     style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Buku Dipinjam -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Buku Dipinjam</div>
                                <div class="text-3xl font-bold text-gray-800">
                                    {{ \App\Models\DetailPeminjaman::where('status_kembali', 'dipinjam')->sum('jumlah') }}
                                </div>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-yellow-100 to-amber-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-hand-holding text-2xl text-yellow-600"></i>
                                </div>
                                <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center">
                                    <i class="fas fa-clock text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                <span>Perhatian</span>
                                <span class="text-yellow-600 font-medium">Dipinjam</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                @php
                                    $totalBorrowed = \App\Models\DetailPeminjaman::where('status_kembali', 'dipinjam')->sum('jumlah');
                                    $maxCapacity = \App\Models\Buku::sum('jumlah') * 0.3; // 30% dari total stok
                                    $borrowPercentage = $maxCapacity > 0 ? min(($totalBorrowed / $maxCapacity) * 100, 100) : 0;
                                @endphp
                                <div class="bg-gradient-to-r from-yellow-400 to-amber-500 h-2 rounded-full transition-all duration-1000" 
                                     style="width: {{ $borrowPercentage }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengembalian Hari Ini -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <div class="text-sm font-medium text-gray-500 mb-1">Pengembalian Hari Ini</div>
                                <div class="text-3xl font-bold text-gray-800">
                                    {{ \App\Models\DetailPeminjaman::where('status_kembali', 'dikembalikan')->whereDate('updated_at', now())->sum('jumlah') }}
                                </div>
                            </div>
                            <div class="relative">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-undo text-2xl text-purple-600"></i>
                                </div>
                                <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-purple-500 flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                <span>Trend</span>
                                <span class="text-purple-600 font-medium">Positif</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                @php
                                    $todayReturns = \App\Models\DetailPeminjaman::where('status_kembali', 'dikembalikan')->whereDate('updated_at', now())->sum('jumlah');
                                    $yesterdayReturns = \App\Models\DetailPeminjaman::where('status_kembali', 'dikembalikan')->whereDate('updated_at', now()->subDay())->sum('jumlah');
                                    $returnPercentage = $yesterdayReturns > 0 ? min(($todayReturns / $yesterdayReturns) * 100, 200) : ($todayReturns > 0 ? 100 : 0);
                                @endphp
                                <div class="bg-gradient-to-r from-purple-400 to-pink-500 h-2 rounded-full transition-all duration-1000" 
                                     style="width: {{ min($returnPercentage, 100) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Recent Activity -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-gray-800 flex items-center">
                                <i class="fas fa-history text-blue-600 mr-3"></i>
                                Aktivitas Terbaru
                            </h2>
                            <a href="{{ route('admin.pengembalian.index') }}" 
                               class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach(\App\Models\Peminjaman::with('anggota', 'detailPeminjaman.buku')->latest()->take(6)->get() as $p)
                                @foreach($p->detailPeminjaman->take(1) as $detail)
                                <div class="flex items-start p-4 rounded-xl border border-gray-200 hover:border-blue-200 hover:bg-blue-50/30 transition-colors duration-200">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center 
                                            @switch($detail->status_kembali)
                                                @case('dipinjam')
                                                    bg-yellow-100
                                                    @break
                                                @case('menunggu persetujuan')
                                                    bg-blue-100
                                                    @break
                                                @case('dikembalikan')
                                                    bg-green-100
                                                    @break
                                                @default
                                                    bg-gray-100
                                            @endswitch">
                                            <i class="fas 
                                                @switch($detail->status_kembali)
                                                    @case('dipinjam')
                                                        fa-hand-holding text-yellow-600
                                                        @break
                                                    @case('menunggu persetujuan')
                                                        fa-clock text-blue-600
                                                        @break
                                                    @case('dikembalikan')
                                                        fa-check-circle text-green-600
                                                        @break
                                                    @default
                                                        fa-question-circle text-gray-600
                                                @endswitch"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-start justify-between">
                                            <div>
                                                <p class="font-medium text-gray-800">{{ $detail->buku->judul }}</p>
                                                <p class="text-sm text-gray-600 mt-1">
                                                    Dipinjam oleh <span class="font-medium">{{ $p->anggota->nama }}</span>
                                                    • {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->diffForHumans() }}
                                                </p>
                                            </div>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @switch($detail->status_kembali)
                                                    @case('dipinjam')
                                                        bg-yellow-100 text-yellow-800
                                                        @break
                                                    @case('menunggu persetujuan')
                                                        bg-blue-100 text-blue-800
                                                        @break
                                                    @case('dikembalikan')
                                                        bg-green-100 text-green-800
                                                        @break
                                                    @default
                                                        bg-gray-100 text-gray-800
                                                @endswitch">
                                                {{ ucfirst($detail->status_kembali) }}
                                            </span>
                                        </div>
                                        <div class="mt-2 text-xs text-gray-500">
                                            Jumlah: {{ $detail->jumlah }} buku • 
                                            Tanggal: {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->translatedFormat('d M Y') }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column: Quick Actions & System Info -->
                <div class="space-y-8">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-bolt text-yellow-500 mr-3"></i>
                            Aksi Cepat
                        </h2>
                        
                        <div class="space-y-3">
                            <a href="{{ route('admin.anggota.create') }}" 
                               class="flex items-center p-3 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors duration-200 group">
                                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200">
                                    <i class="fas fa-user-plus text-blue-600"></i>
                                </div>
                                <span class="font-medium text-gray-700">Tambah Anggota Baru</span>
                                <i class="fas fa-arrow-right ml-auto text-blue-400 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                            
                            <a href="{{ route('admin.buku.create') }}" 
                               class="flex items-center p-3 bg-green-50 rounded-xl hover:bg-green-100 transition-colors duration-200 group">
                                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3 group-hover:bg-green-200">
                                    <i class="fas fa-book-medical text-green-600"></i>
                                </div>
                                <span class="font-medium text-gray-700">Tambah Buku Baru</span>
                                <i class="fas fa-arrow-right ml-auto text-green-400 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                            
                            <a href="{{ route('admin.pengembalian.index') }}" 
                               class="flex items-center p-3 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors duration-200 group">
                                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200">
                                    <i class="fas fa-check-double text-purple-600"></i>
                                </div>
                                <span class="font-medium text-gray-700">Verifikasi Pengembalian</span>
                                <i class="fas fa-arrow-right ml-auto text-purple-400 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </a>
                        </div>
                    </div>

                    <!-- System Info -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-info-circle text-gray-600 mr-3"></i>
                            Info Sistem
                        </h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Versi Aplikasi</span>
                                <span class="font-medium text-gray-800">v1.0.0</span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Laravel Version</span>
                                <span class="font-medium text-gray-800">{{ app()->version() }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">PHP Version</span>
                                <span class="font-medium text-gray-800">{{ PHP_VERSION }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Environment</span>
                                <span class="font-medium text-green-600">{{ app()->environment() }}</span>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Waktu Server</span>
                                <span class="font-medium text-gray-800">{{ now()->format('H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:translate-x-1 {
        transform: translateX(0.25rem);
    }

    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate progress bars on load
    const progressBars = document.querySelectorAll('.bg-gradient-to-r');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = width;
        }, 300);
    });
    
    // Add hover effects to cards
    const cards = document.querySelectorAll('.group.bg-white');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.boxShadow = '';
        });
    });
});
</script>
@endsection