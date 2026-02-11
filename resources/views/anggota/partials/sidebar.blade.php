<aside class="w-64 bg-gradient-to-b from-green-50 via-white to-white shadow-lg border-r border-green-200 min-h-screen flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b border-green-200 bg-gradient-to-r from-green-600 to-emerald-600">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center border border-white/30">
                <i class="fas fa-book text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-lg font-bold text-white">Perpustakaan</h1>
                <p class="text-xs text-emerald-100">Portal Siswa</p>
            </div>
        </div>
    </div>

    <!-- User Profile -->
<div class="p-6 border-b border-green-200 bg-gradient-to-r from-green-50 to-emerald-50">
    <div class="flex items-center space-x-3">
        <div class="relative">
            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center shadow-md">
                <div class="w-full h-full rounded-full bg-white flex items-center justify-center overflow-hidden border-2 border-white">
                    <!-- Menampilkan inisial nama atau ikon -->
                    @if(isset($anggota) && $anggota->nama)
                        <span class="text-green-600 font-bold text-lg">
                            {{ substr($anggota->nama, 0, 1) }}
                        </span>
                    @else
                        <i class="fas fa-user text-green-600 text-xl"></i>
                    @endif
                </div>
            </div>
            <!-- Status online indicator -->
            <span class="absolute bottom-1 right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white"></span>
        </div>
        <div class="flex-1 min-w-0">
            <h3 class="font-semibold text-gray-800 truncate">{{ $anggota->nama ?? 'Siswa' }}</h3>
            <p class="text-sm text-gray-600 truncate">{{ $anggota->kelas ?? 'Kelas' }}</p>
        </div>
    </div>
</div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('anggota.dashboard') }}" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 
                          {{ request()->routeIs('anggota.dashboard') 
                             ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 border-l-4 border-green-500 shadow-sm' 
                             : 'text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 hover:shadow-sm' }}">
                    <div class="w-8 h-8 rounded-lg {{ request()->routeIs('anggota.dashboard') ? 'bg-gradient-to-r from-green-500 to-emerald-500' : 'bg-green-100' }} flex items-center justify-center mr-3">
                        <i class="fas fa-home {{ request()->routeIs('anggota.dashboard') ? 'text-white' : 'text-green-600' }} text-sm"></i>
                    </div>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('anggota.peminjaman') }}" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 
                          {{ request()->routeIs('anggota.peminjaman') 
                             ? 'bg-gradient-to-r from-blue-100 to-sky-100 text-blue-700 border-l-4 border-blue-500 shadow-sm' 
                             : 'text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-sky-50 hover:text-blue-700 hover:shadow-sm' }}">
                    <div class="w-8 h-8 rounded-lg {{ request()->routeIs('anggota.peminjaman') ? 'bg-gradient-to-r from-blue-500 to-sky-500' : 'bg-blue-100' }} flex items-center justify-center mr-3">
                        <i class="fas fa-book {{ request()->routeIs('anggota.peminjaman') ? 'text-white' : 'text-blue-600' }} text-sm"></i>
                    </div>
                    <span class="font-medium">Peminjaman Buku</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('anggota.pengembalian') }}" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 
                          {{ request()->routeIs('anggota.pengembalian') 
                             ? 'bg-gradient-to-r from-amber-100 to-orange-100 text-amber-700 border-l-4 border-amber-500 shadow-sm' 
                             : 'text-gray-700 hover:bg-gradient-to-r hover:from-amber-50 hover:to-orange-50 hover:text-amber-700 hover:shadow-sm' }}">
                    <div class="w-8 h-8 rounded-lg {{ request()->routeIs('anggota.pengembalian') ? 'bg-gradient-to-r from-amber-500 to-orange-500' : 'bg-amber-100' }} flex items-center justify-center mr-3">
                        <i class="fas fa-undo {{ request()->routeIs('anggota.pengembalian') ? 'text-white' : 'text-amber-600' }} text-sm"></i>
                    </div>
                    <span class="font-medium">Pengembalian</span>
                    @if(isset($totalMenunggu) && $totalMenunggu > 0)
                    <span class="ml-auto bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center animate-pulse shadow-sm">
                        {{ $totalMenunggu }}
                    </span>
                    @endif
                </a>
            </li>
            
            <li>
                <a href="{{ route('anggota.profile') }}" 
                   class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 
                          {{ request()->routeIs('anggota.profile') 
                             ? 'bg-gradient-to-r from-purple-100 to-violet-100 text-purple-700 border-l-4 border-purple-500 shadow-sm' 
                             : 'text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-violet-50 hover:text-purple-700 hover:shadow-sm' }}">
                    <div class="w-8 h-8 rounded-lg {{ request()->routeIs('anggota.profile') ? 'bg-gradient-to-r from-purple-500 to-violet-500' : 'bg-purple-100' }} flex items-center justify-center mr-3">
                        <i class="fas fa-user {{ request()->routeIs('anggota.profile') ? 'text-white' : 'text-purple-600' }} text-sm"></i>
                    </div>
                    <span class="font-medium">Profil</span>
                </a>
            </li>
        </ul>
        
        <!-- Divider -->
        <div class="mt-6 mb-4 px-3">
            <div class="h-px bg-gradient-to-r from-transparent via-green-300 to-transparent"></div>
        </div>
        
        <!-- Quick Stats -->
        <div class="px-3 mb-4">
            <div class="text-xs font-medium text-green-600 mb-2">Statistik Cepat</div>
            <div class="space-y-2">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Buku Dipinjam</span>
                    <span class="text-sm font-semibold text-green-600">{{ $totalDipinjam ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Menunggu Kembali</span>
                    <span class="text-sm font-semibold text-amber-600">{{ $totalMenunggu ?? 0 }}</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-green-200 bg-gradient-to-r from-green-50 to-emerald-50">
        <form method="POST" action="{{ route('anggota.logout') }}">
            @csrf
            <button type="submit" 
                    class="flex items-center w-full px-4 py-3 rounded-xl transition-all duration-300 bg-gradient-to-r from-gray-800 to-gray-900 text-white hover:from-red-600 hover:to-red-700 hover:shadow-md group">
                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center mr-3 group-hover:bg-white/20">
                    <i class="fas fa-sign-out-alt text-white text-sm"></i>
                </div>
                <span class="font-medium">Keluar</span>
                <i class="fas fa-arrow-right ml-auto text-white/60 group-hover:text-white group-hover:translate-x-1 transition-transform duration-300"></i>
            </button>
        </form>
        
        <!-- Version -->
        <div class="mt-3 text-center">
            <p class="text-xs text-gray-500">v1.0 • {{ date('Y') }}</p>
        </div>
    </div>
</aside>

<style>
    /* Custom scrollbar untuk sidebar */
    nav::-webkit-scrollbar {
        width: 4px;
    }
    
    nav::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    nav::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #10b981, #059669);
        border-radius: 10px;
    }
    
    nav::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #059669, #047857);
    }
    
    /* Smooth transitions */
    * {
        transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add hover effects to menu items
    const menuItems = document.querySelectorAll('nav a');
    
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(2px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
    
    // Add click animation
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
});
</script>