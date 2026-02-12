<aside class="w-64 min-h-screen bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 shadow-xl border-r border-gray-700/50" role="navigation" aria-label="Navigasi Admin">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-700/50 bg-gradient-to-r from-blue-900/80 to-indigo-900/80">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-md">
                <i class="fas fa-crown text-white"></i>
            </div>
            <div>
                <h1 class="text-lg font-bold text-white">Admin Panel</h1>
                <p class="text-xs text-blue-200">Perpustakaan Digital</p>
            </div>
        </div>
    </div>

    <!-- User Info -->
    <div class="p-6 border-b border-gray-700/50 bg-gradient-to-r from-gray-800/80 to-gray-900/80">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center">
                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center">
                    <i class="fas fa-user text-white"></i>
                </div>
            </div>
            <div class="flex-1 min-w-0">
                <h3 class="font-semibold text-white truncate">Administrator</h3>
                <p class="text-sm text-gray-400 truncate">Super Admin</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="p-4">
        <div class="mb-4">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3">Menu Utama</p>
        </div>
        
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                          {{ request()->routeIs('admin.dashboard') 
                             ? 'bg-gradient-to-r from-blue-600/30 to-indigo-600/30 text-white border-l-4 border-blue-500' 
                             : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt w-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-400' : 'text-gray-400' }}"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.anggota.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                          {{ request()->routeIs('admin.anggota.*') 
                             ? 'bg-gradient-to-r from-blue-600/30 to-indigo-600/30 text-white border-l-4 border-blue-500' 
                             : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }}">
                    <i class="fas fa-users w-5 mr-3 {{ request()->routeIs('admin.anggota.*') ? 'text-blue-400' : 'text-gray-400' }}"></i>
                    <span class="font-medium">Anggota</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.buku.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                          {{ request()->routeIs('admin.buku.*') 
                             ? 'bg-gradient-to-r from-blue-600/30 to-indigo-600/30 text-white border-l-4 border-blue-500' 
                             : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }}">
                    <i class="fas fa-book w-5 mr-3 {{ request()->routeIs('admin.buku.*') ? 'text-blue-400' : 'text-gray-400' }}"></i>
                    <span class="font-medium">Buku</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.kategori.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                          {{ request()->routeIs('admin.kategori.*') 
                             ? 'bg-gradient-to-r from-blue-600/30 to-indigo-600/30 text-white border-l-4 border-blue-500' 
                             : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }}">
                    <i class="fas fa-tags w-5 mr-3 {{ request()->routeIs('admin.kategori.*') ? 'text-blue-400' : 'text-gray-400' }}"></i>
                    <span class="font-medium">Kategori</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('admin.pengembalian.index') }}" 
                   class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 
                          {{ request()->routeIs('admin.pengembalian.*') 
                             ? 'bg-gradient-to-r from-blue-600/30 to-indigo-600/30 text-white border-l-4 border-blue-500' 
                             : 'text-gray-300 hover:bg-gray-800/50 hover:text-white' }}">
                    <i class="fas fa-undo w-5 mr-3 {{ request()->routeIs('admin.pengembalian.*') ? 'text-blue-400' : 'text-gray-400' }}"></i>
                    <span class="font-medium">Pengembalian</span>
                </a>
            </li>
        </ul>
        
        <!-- Divider -->
        <div class="my-4 border-t border-gray-700/50"></div>
        
        <!-- Logout -->
        <form method="POST" action="{{ route('anggota.logout') }}">
            @csrf
            <button type="submit" 
                    class="flex items-center w-full px-4 py-3 rounded-lg text-gray-300 hover:bg-red-900/30 hover:text-red-300 transition-all duration-200 group">
                <div class="w-8 h-8 rounded-lg bg-red-900/20 flex items-center justify-center mr-3 group-hover:bg-red-900/40">
                    <i class="fas fa-sign-out-alt text-red-400 text-sm"></i>
                </div>
                <span class="font-medium">Keluar</span>
                <i class="fas fa-arrow-right ml-auto text-gray-500 group-hover:text-red-400 group-hover:translate-x-1 transition-transform duration-200"></i>
            </button>
        </form>
    </nav>

    <!-- Version Info -->
    <div class="p-4 border-t border-gray-700/50 mt-auto">
        <p class="text-xs text-gray-500 text-center">v1.0 • {{ date('Y') }}</p>
    </div>
</aside>

<style>
    /* Smooth transitions */
    * {
        transition-property: background-color, border-color, color, fill, stroke, transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 200ms;
    }
    
    /* Custom scrollbar */
    nav::-webkit-scrollbar {
        width: 4px;
    }
    
    nav::-webkit-scrollbar-track {
        background: transparent;
    }
    
    nav::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.5);
        border-radius: 10px;
    }
    
    nav::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.7);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple hover effect
    const menuItems = document.querySelectorAll('nav a');
    menuItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(2px)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});
</script>