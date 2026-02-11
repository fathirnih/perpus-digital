@extends('layouts.app')

@section('title', 'Pengembalian Buku')

{{-- Sidebar dari partials --}}
@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

{{-- Konten utama --}}
@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Header Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-undo-circle mr-3 text-blue-600"></i> Daftar Pengajuan Pengembalian
        </h1>
        <p class="text-gray-600 mt-2">Kelola pengembalian buku dengan mudah.</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-check-circle mr-3"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Table Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Anggota</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tanggal Pinjam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($peminjaman_pending as $i => $peminjaman)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $i + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $peminjaman->anggota->nama }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @foreach($peminjaman->detailPeminjaman as $detail)
                                <div class="mb-1">{{ $detail->buku->judul }}</div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @foreach($peminjaman->detailPeminjaman as $detail)
                                <div class="mb-1">{{ $detail->jumlah }}</div>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $peminjaman->tanggal_pinjam }}</td>
                        <td class="px-6 py-4 text-sm">
                            @foreach($peminjaman->detailPeminjaman as $detail)
                                @switch($detail->status_kembali)
                                    @case('dipinjam')
                                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-800">
                                            <i class="fas fa-book mr-1"></i> Dipinjam
                                        </span>
                                        @break
                                    @case('menunggu persetujuan')
                                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-blue-100 text-blue-800">
                                            <i class="fas fa-clock mr-1"></i> Menunggu Persetujuan
                                        </span>
                                        @break
                                    @case('dikembalikan')
                                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> Telah Dikembalikan
                                        </span>
                                        @break
                                    @case('ditolak')
                                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i> Ditolak
                                        </span>
                                        @break
                                    @default
                                        <span class="inline-flex items-center px-2 py-1 rounded-lg text-xs font-medium bg-gray-100 text-gray-600">
                                            <i class="fas fa-question-circle mr-1"></i> Status Tidak Diketahui
                                        </span>
                                @endswitch
                                <br>
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            @foreach($peminjaman->detailPeminjaman as $detail)
                                @if($detail->status_kembali == 'menunggu persetujuan')
                                    <div class="flex gap-2 mb-2">
                                        <form action="{{ route('admin.pengembalian.terima', $detail->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition duration-200 flex items-center">
                                                <i class="fas fa-check-circle mr-1"></i> Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.pengembalian.tolak', $detail->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-200 flex items-center">
                                                <i class="fas fa-times-circle mr-1"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                                <br>
                            @endforeach
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox mr-2"></i> Belum ada pengajuan pengembalian.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection