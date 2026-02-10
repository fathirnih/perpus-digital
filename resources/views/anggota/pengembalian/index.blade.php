@extends('layouts.app')

@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('title', 'Pengembalian Buku')

@section('content')
<h1 class="text-3xl font-bold mb-4">Pengembalian Buku</h1>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Judul Buku</th>
            <th class="border px-2 py-1">Jumlah</th>
            <th class="border px-2 py-1">Tanggal Pinjam</th>
            <th class="border px-2 py-1">Tanggal Kembali</th>
            <th class="border px-2 py-1">Status Pengembalian</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($detailPeminjaman as $i => $detail)
        <tr>
            <td class="border px-2 py-1 text-center">{{ $i + 1 }}</td>
            <td class="border px-2 py-1">{{ $detail->buku->judul }}</td>
            <td class="border px-2 py-1 text-center">{{ $detail->jumlah }}</td>
            <td class="border px-2 py-1 text-center">{{ $detail->peminjaman->tanggal_pinjam }}</td>
            <td class="border px-2 py-1 text-center">
                {{ $detail->status_kembali == 'dikembalikan' ? $detail->peminjaman->tanggal_kembali : '-' }}
            </td>
            <td class="border px-2 py-1 text-center">
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

                    @default
                        <span class="text-gray-600">Status Tidak Diketahui</span>
                @endswitch
            </td>
            <td class="border px-2 py-1 text-center">
                @if($detail->status_kembali == 'dipinjam')
                    <form action="{{ route('anggota.pengembalian.ajukan', $detail->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                            Ajukan Pengembalian
                        </button>
                    </form>
                @else
                    <span class="text-gray-500">-</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="border px-2 py-1 text-center">Tidak ada buku untuk dikembalikan</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
