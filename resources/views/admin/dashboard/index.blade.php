@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Dashboard Admin')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang, Admin!</h1>
        <p class="text-gray-600">Kelola sistem perpustakaan dengan mudah. Berikut ringkasan data terkini.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1: Total Anggota -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-users text-blue-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800">Total Anggota</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ \App\Models\Anggota::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Buku -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-book text-green-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800">Total Buku</h3>
                    <p class="text-2xl font-bold text-green-600">{{ \App\Models\Buku::count() }}</p>
                </div>
            </div>
        </div>

        <!-- Card 3: Buku Dipinjam -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-hand-holding text-yellow-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800">Buku Dipinjam</h3>
                    <p class="text-2xl font-bold text-yellow-600">
                        {{ \App\Models\DetailPeminjaman::where('status_kembali', 'dipinjam')->sum('jumlah') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Card 4: Pengembalian Hari Ini -->
        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-full">
                    <i class="fas fa-undo text-red-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800">Pengembalian Hari Ini</h3>
                    <p class="text-2xl font-bold text-red-600">
                        {{ \App\Models\DetailPeminjaman::where('status_kembali', 'dikembalikan')
                            ->whereDate('updated_at', now())->sum('jumlah') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Aktivitas Terbaru</h2>
        <ul class="space-y-3">
            @foreach(\App\Models\Peminjaman::with('anggota', 'detailPeminjaman.buku')->latest()->take(5)->get() as $p)
                @foreach($p->detailPeminjaman as $detail)
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-circle text-blue-500 mr-3"></i> 
                        Buku "{{ $detail->buku->judul }}" dipinjam oleh {{ $p->anggota->nama }} ({{ ucfirst($detail->status_kembali) }})
                    </li>
                @endforeach
            @endforeach
        </ul>
        <a href="{{ route('admin.pengembalian.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Lihat Semua Aktivitas</a>
    </div>
</div>
@endsection
