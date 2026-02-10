<aside class="w-64 p-4 text-white bg-blue-800">
    <h1 class="text-2xl font-bold mb-6">Admin Panel</h1>
    <ul>
        <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a></li>
        <li class="mb-2"><a href="{{ route('admin.anggota.index') }}" class="hover:underline">Anggota</a></li>
        <li class="mb-2"><a href="{{ route('admin.buku.index') }}" class="hover:underline">Buku</a></li>
        <li class="mb-2"><a href="{{ route('admin.kategori.index') }}" class="hover:underline">Kategori</a></li>
        <li class="mb-2"><a href="#" class="hover:underline">Peminjaman</a></li>
        <li class="mb-2">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    </ul>
</aside>
