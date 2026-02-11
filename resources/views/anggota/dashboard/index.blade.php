@extends('layouts.app')

@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('title', 'Dashboard Siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50/30">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob"></div>
        <div class="absolute top-40 -left-40 w-80 h-80 bg-green-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-20 left-40 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative">
        <!-- Welcome Header -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <div class="bg-gradient-to-r from-white/90 to-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-white/50 overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-green-400/10 to-teal-400/10 rounded-full -translate-y-32 translate-x-20"></div>
                
                <div class="relative flex flex-col md:flex-row items-center justify-between">
                    <div class="text-center md:text-left">
                        <div class="flex items-center justify-center md:justify-start mb-4">
                            <div class="relative">
                                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-green-400 to-teal-400 p-1">
                                    <div class="w-full h-full rounded-full bg-white flex items-center justify-center">
                                        <i class="fas fa-user-graduate text-3xl bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent"></i>
                                    </div>
                                </div>
                                <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full border-4 border-white flex items-center justify-center">
                                    <i class="fas fa-medal text-white text-xs"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                                Halo, <span class="bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent">{{ $anggota->nama }}</span>!
                            </h1>
                            <p class="text-gray-600 text-lg">
                                <i class="fas fa-sparkles text-yellow-500 mr-2"></i>
                                Selamat datang kembali di Perpustakaan Digital
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-6 md:mt-0">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-green-50 to-teal-50 border border-green-200">
                            <i class="fas fa-calendar-alt text-green-600 mr-2"></i>
                            <span class="text-gray-700 font-medium">{{ now()->translatedFormat('l, d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column: Stats Cards -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-chart-line text-green-600 mr-3"></i>
                        Statistik Peminjaman
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Buku Dipinjam -->
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div class="text-sm font-medium text-gray-500 mb-1">Buku Dipinjam</div>
                                        <div class="text-3xl font-bold text-gray-800">{{ $totalDipinjam ?? 0 }}</div>
                                    </div>
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-green-100 to-green-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-book text-2xl text-green-600"></i>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-green-500 flex items-center justify-center">
                                            <i class="fas fa-arrow-up text-white text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                        <span>Progress</span>
                                        <span>{{ $totalDipinjam ? min(($totalDipinjam / 10) * 100, 100) : 0 }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-green-400 to-green-500 h-2 rounded-full transition-all duration-1000" 
                                             style="width: {{ $totalDipinjam ? min(($totalDipinjam / 10) * 100, 100) : 0 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menunggu Pengembalian -->
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div class="text-sm font-medium text-gray-500 mb-1">Menunggu Kembali</div>
                                        <div class="text-3xl font-bold text-gray-800">{{ $totalMenunggu ?? 0 }}</div>
                                    </div>
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-yellow-100 to-yellow-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-clock text-2xl text-yellow-600"></i>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-yellow-500 flex items-center justify-center">
                                            <i class="fas fa-exclamation text-white text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                        <span>Perhatian</span>
                                        <span>{{ $totalMenunggu ? ($totalMenunggu > 0 ? 'Ada' : 'Aman') : 'Aman' }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-2 rounded-full transition-all duration-1000" 
                                             style="width: {{ $totalMenunggu ? min(($totalMenunggu / 5) * 100, 100) : 0 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Dikembalikan -->
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <div class="text-sm font-medium text-gray-500 mb-1">Sudah Dikembalikan</div>
                                        <div class="text-3xl font-bold text-gray-800">{{ $totalDikembalikan ?? 0 }}</div>
                                    </div>
                                    <div class="relative">
                                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-blue-100 to-blue-50 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-check-circle text-2xl text-blue-600"></i>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                                            <i class="fas fa-check text-white text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="flex items-center justify-between text-sm text-gray-600 mb-1">
                                        <span>Komitmen</span>
                                        <span>100%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-2 rounded-full transition-all duration-1000" 
                                             style="width: {{ $totalDikembalikan ? min(($totalDikembalikan / 20) * 100, 100) : 0 }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                            <i class="fas fa-bolt text-yellow-500 mr-3"></i>
                            Aksi Cepat
                        </h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Peminjaman Buku -->
                            <a href="{{ route('anggota.peminjaman') }}" 
                               class="group relative overflow-hidden bg-gradient-to-r from-green-500 to-teal-500 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="absolute inset-0 bg-gradient-to-r from-green-600 to-teal-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="relative p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <div class="text-white text-lg font-bold mb-2">Pinjam Buku</div>
                                            <p class="text-green-100 text-sm opacity-90">Temukan buku baru untuk dibaca</p>
                                        </div>
                                        <div class="w-14 h-14 rounded-full bg-white/20 flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                                            <i class="fas fa-book text-white text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-green-100 text-sm">Klik untuk mulai</span>
                                        <i class="fas fa-arrow-right text-white group-hover:translate-x-2 transition-transform duration-300"></i>
                                    </div>
                                </div>
                                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-white/10 rounded-full"></div>
                                <div class="absolute -top-6 -left-6 w-20 h-20 bg-white/5 rounded-full"></div>
                            </a>

                            <!-- Pengembalian Buku -->
                            <a href="{{ route('anggota.pengembalian') }}" 
                               class="group relative overflow-hidden bg-gradient-to-r from-yellow-500 to-orange-500 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="relative p-6">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <div class="text-white text-lg font-bold mb-2">Kembalikan Buku</div>
                                            <p class="text-yellow-100 text-sm opacity-90">Ajukan pengembalian buku</p>
                                        </div>
                                        <div class="w-14 h-14 rounded-full bg-white/20 flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                                            <i class="fas fa-undo text-white text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-yellow-100 text-sm">{{ $totalMenunggu ?? 0 }} buku menunggu</span>
                                        <i class="fas fa-arrow-right text-white group-hover:translate-x-2 transition-transform duration-300"></i>
                                    </div>
                                </div>
                                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-white/10 rounded-full"></div>
                                <div class="absolute -top-6 -left-6 w-20 h-20 bg-white/5 rounded-full"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Additional Info -->
                <div class="space-y-8">
                    <!-- User Info Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-user-circle text-purple-600 mr-2"></i>
                            Informasi Siswa
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-id-card text-gray-400 w-5 mr-3"></i>
                                <span class="text-sm">NIS: <span class="font-semibold text-gray-800">{{ $anggota->nis ?? 'N/A' }}</span></span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-school text-gray-400 w-5 mr-3"></i>
                                <span class="text-sm">Kelas: <span class="font-semibold text-gray-800">{{ $anggota->kelas ?? 'N/A' }}</span></span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-envelope text-gray-400 w-5 mr-3"></i>
                                <span class="text-sm">Email: <span class="font-semibold text-gray-800">{{ $anggota->email ?? 'N/A' }}</span></span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-phone text-gray-400 w-5 mr-3"></i>
                                <span class="text-sm">Telepon: <span class="font-semibold text-gray-800">{{ $anggota->telepon ?? 'N/A' }}</span></span>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <div class="text-sm text-gray-500 mb-2">Keaktifan Bulan Ini</div>
                            <div class="flex items-center">
                                <div class="flex-1">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-purple-400 to-purple-500 h-2 rounded-full" style="width: 75%"></div>
                                    </div>
                                </div>
                                <span class="ml-3 text-sm font-semibold text-purple-600">Aktif</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-history text-blue-600 mr-2"></i>
                            Aktivitas Terakhir
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <i class="fas fa-book text-green-600 text-xs"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-800">Meminjam "Laskar Pelangi"</p>
                                    <p class="text-xs text-gray-500">2 hari yang lalu</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <i class="fas fa-undo text-blue-600 text-xs"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-800">Mengembalikan "Fisika Dasar"</p>
                                    <p class="text-xs text-gray-500">5 hari yang lalu</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                    <i class="fas fa-star text-purple-600 text-xs"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-800">Mendapat poin kebaikan</p>
                                    <p class="text-xs text-gray-500">1 minggu yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Tips -->
                    <div class="bg-gradient-to-br from-teal-50 to-blue-50 rounded-2xl shadow-lg p-6 border border-teal-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                            Tips Perpustakaan
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-0.5">
                                    <i class="fas fa-check text-teal-600 text-xs"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Kembalikan buku tepat waktu untuk menghindari denda</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-0.5">
                                    <i class="fas fa-check text-teal-600 text-xs"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Jaga buku dengan baik, hindari coretan dan kerusakan</p>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 flex items-center justify-center mt-0.5">
                                    <i class="fas fa-check text-teal-600 text-xs"></i>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">Gunakan bookmark, jangan melipat halaman buku</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:rotate-12 {
        transform: rotate(12deg);
    }

    .group:hover .group-hover\:translate-x-2 {
        transform: translateX(0.5rem);
    }
</style>
@endpush

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate progress bars on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBars = entry.target.querySelectorAll('[style*="width:"]');
                progressBars.forEach(bar => {
                    const currentWidth = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.width = currentWidth;
                    }, 300);
                });
            }
        });
    }, { threshold: 0.5 });

    // Observe stats cards
    document.querySelectorAll('.group.bg-white').forEach(card => {
        observer.observe(card);
    });

    // Add ripple effect to buttons
    document.querySelectorAll('a[href*="route"]').forEach(link => {
        link.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.7);
                transform: scale(0);
                animation: ripple 0.6s linear;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
            `;
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
});

// Add ripple animation
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>
@endsection