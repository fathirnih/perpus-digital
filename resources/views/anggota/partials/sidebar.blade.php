<aside class="w-64 p-4 text-white bg-green-600">
    <h1 class="text-2xl font-bold mb-6">Siswa Panel</h1>
    <ul>
        <li class="mb-2"><a href="{{ route('anggota.dashboard') }}" class="hover:underline">Dashboard</a></li>
        <li class="mb-2"><a href="{{ route('anggota.peminjaman') }}" class="hover:underline">Peminjaman Buku</a></li>
        <li class="mb-2"><a href="{{ route('anggota.pengembalian') }}" class="hover:underline">Pengembalian</a></li>
        <li class="mb-2">
            <form method="POST" action="{{ route('anggota.logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    </ul>
</aside>
