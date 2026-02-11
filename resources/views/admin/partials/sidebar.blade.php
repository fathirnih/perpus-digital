<aside class="w-64 p-6 text-white bg-gradient-to-b from-blue-800 via-blue-900 to-indigo-900 shadow-2xl rounded-lg hidden md:block backdrop-blur-sm animate-fade-in" role="navigation" aria-label="Navigasi Admin Panel">
    <!-- Logo/Icon -->
    <div class="text-center mb-6">
        <i class="fas fa-crown text-4xl text-yellow-400 mb-2 animate-bounce"></i>
        <h1 class="text-2xl font-bold text-center bg-gradient-to-r from-white to-yellow-200 bg-clip-text text-transparent">Admin Panel</h1>
    </div>

    <!-- Avatar Placeholder -->
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full mx-auto flex items-center justify-center shadow-lg">
            <i class="fas fa-user text-white text-2xl"></i>
        </div>
        <p class="text-sm text-gray-300 mt-2">Selamat Datang, Admin!</p>
    </div>

    <!-- Navigation Menu -->
    <nav>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-600 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-blue-400 hover:ring-opacity-50 transition duration-300 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 shadow-lg animate-pulse' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3 group-hover:rotate-12 transition duration-300"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.anggota.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-600 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-blue-400 hover:ring-opacity-50 transition duration-300 group {{ request()->routeIs('admin.anggota.*') ? 'bg-blue-700 shadow-lg animate-pulse' : '' }}">
                    <i class="fas fa-users mr-3 group-hover:rotate-12 transition duration-300"></i> Anggota
                </a>
            </li>
            <li>
                <a href="{{ route('admin.buku.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-600 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-blue-400 hover:ring-opacity-50 transition duration-300 group {{ request()->routeIs('admin.buku.*') ? 'bg-blue-700 shadow-lg animate-pulse' : '' }}">
                    <i class="fas fa-book mr-3 group-hover:rotate-12 transition duration-300"></i> Buku
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kategori.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-600 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-blue-400 hover:ring-opacity-50 transition duration-300 group {{ request()->routeIs('admin.kategori.*') ? 'bg-blue-700 shadow-lg animate-pulse' : '' }}">
                    <i class="fas fa-tags mr-3 group-hover:rotate-12 transition duration-300"></i> Kategori
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengembalian.index') }}" class="flex items-center px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-blue-700 hover:to-blue-600 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-blue-400 hover:ring-opacity-50 transition duration-300 group {{ request()->routeIs('admin.pengembalian.*') ? 'bg-blue-700 shadow-lg animate-pulse' : '' }}">
                    <i class="fas fa-undo mr-3 group-hover:rotate-12 transition duration-300"></i> Pengembalian
                </a>
            </li>
            <li class="border-t border-blue-700 pt-3">
                <form method="POST" action="{{ route('admin.logout') }}" class="inline w-full">
                    @csrf
                    <button type="submit" class="flex items-center px-4 py-3 rounded-lg hover:bg-gradient-to-r hover:from-red-600 hover:to-red-700 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-red-400 hover:ring-opacity-50 transition duration-300 w-full text-left group">
                        <i class="fas fa-sign-out-alt mr-3 group-hover:rotate-12 transition duration-300"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>