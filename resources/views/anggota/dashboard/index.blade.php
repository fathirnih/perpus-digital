@extends('layouts.app')

@section('sidebar')
<aside class="w-64 p-4 text-white bg-green-700">
    <h1 class="text-2xl font-bold mb-6">Siswa Panel</h1>
    <ul>
        <li class="mb-2">
            <a href="{{ route('anggota.dashboard') }}" class="hover:underline">Dashboard</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('anggota.peminjaman') }}" class="hover:underline">Peminjaman Buku</a>
        </li>
        <li class="mb-2">
            <a href="{{ route('anggota.pengembalian') }}" class="hover:underline">Pengembalian</a>
        </li>
        <li class="mb-2">
            <form method="POST" action="{{ route('anggota.logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    </ul>
</aside>
@endsection

@section('title', 'Dashboard Siswa')

@section('content')
<div class="p-6">
    <h1 class="text-3xl font-bold mb-4">Halo, {{ $anggota->nama }}!</h1>
    <p class="text-gray-700 mb-6">Selamat datang di Perpustakaan Digital.</p>

    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('anggota.peminjaman') }}" class="bg-green-600 text-white p-6 rounded hover:bg-green-700 text-center">
            Peminjaman Buku
        </a>
        <a href="{{ route('anggota.pengembalian') }}" class="bg-yellow-500 text-white p-6 rounded hover:bg-yellow-600 text-center">
            Pengembalian Buku
        </a>
    </div>
</div>
@endsection
