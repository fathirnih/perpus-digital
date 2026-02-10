@extends('layouts.app')

@section('title', 'Pengembalian Buku')

{{-- Sidebar khusus admin --}}
@section('sidebar')
<aside class="w-64 p-4 text-white bg-blue-800 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Admin Panel</h1>
    <ul>
        <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a></li>
        <li class="mb-2"><a href="{{ route('admin.anggota.index') }}" class="hover:underline">Anggota</a></li>
        <li class="mb-2"><a href="{{ route('admin.buku.index') }}" class="hover:underline">Buku</a></li>
        <li class="mb-2"><a href="{{ route('admin.kategori.index') }}" class="hover:underline">Kategori</a></li>
        <li class="mb-2"><a href="{{ route('admin.pengembalian.index') }}" class="hover:underline">Pengembalian</a></li>
        <li class="mb-2">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    </ul>
</aside>
@endsection

{{-- Konten utama --}}
@section('content')
<h1 class="text-3xl font-bold mb-4">Daftar Pengajuan Pengembalian</h1>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Nama Anggota</th>
            <th class="border px-2 py-1">Judul Buku</th>
            <th class="border px-2 py-1">Jumlah</th>
            <th class="border px-2 py-1">Tanggal Pinjam</th>
            <th class="border px-2 py-1">Status</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($peminjaman_pending as $i => $peminjaman)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $peminjaman->anggota->nama }}</td>
            <td>
                @foreach($peminjaman->detailPeminjaman as $detail)
                    {{ $detail->buku->judul }} ({{ $detail->jumlah }})<br>
                @endforeach
            </td>
            <td>{{ $peminjaman->tanggal_pinjam }}</td>
            <td>
                @foreach($peminjaman->detailPeminjaman as $detail)
                    @switch($detail->status_kembali)
                        @case('dipinjam')
                            <span class="text-gray-800 font-semibold">Dipinjam</span>
                            @break
                        @case('menunggu persetujuan')
                            <span class="text-blue-600 font-semibold">Menunggu Persetujuan</span>
                            @break
                        @case('dikembalikan')
                            <span class="text-green-600 font-semibold">Telah Dikembalikan</span>
                            @break
                        @case('ditolak')
                            <span class="text-red-600 font-semibold">Ditolak</span>
                            @break
                        @default
                            <span class="text-gray-600">Status Tidak Diketahui</span>
                    @endswitch
                    <br>
                @endforeach
            </td>
            <td>
                @foreach($peminjaman->detailPeminjaman as $detail)
                    @if($detail->status_kembali == 'menunggu persetujuan')
                        <form action="{{ route('admin.pengembalian.terima', $detail->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button class="bg-green-500 text-white px-2 py-1 rounded">Setujui</button>
                        </form>

                        <form action="{{ route('admin.pengembalian.tolak', $detail->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">Tolak</button>
                        </form>
                    @else
                        <span class="text-gray-500 font-semibold">-</span>
                    @endif
                    <br>
                @endforeach
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada pengajuan</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
