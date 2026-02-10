@extends('layouts.app')

@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('title', 'Peminjaman Buku')

@section('content')
<h1 class="text-3xl font-bold mb-4">Peminjaman Buku</h1>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<h2 class="text-xl font-bold mb-4">Pinjam Buku</h2>

<form action="{{ route('anggota.peminjaman.store') }}" method="POST">
    @csrf
    <table class="w-full table-auto border mb-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-2 py-1">Pilih</th>
                <th class="border px-2 py-1">Judul</th>
                <th class="border px-2 py-1">Jumlah Tersedia</th>
                <th class="border px-2 py-1">Jumlah Pinjam</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $b)
            <tr>
                <td class="border px-2 py-1 text-center">
                    <input type="checkbox" name="buku_ids[]" value="{{ $b->id }}">
                </td>
                <td class="border px-2 py-1">{{ $b->judul }}</td>
                <td class="border px-2 py-1 text-center">{{ $b->jumlah }}</td>
                <td class="border px-2 py-1 text-center">
                    <input type="number" name="jumlah[{{ $b->id }}]" min="1" max="{{ $b->jumlah }}" value="1" class="w-16 border p-1 rounded">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Pinjam Buku
    </button>
</form>

<h2 class="text-xl font-bold mb-4 mt-8">Daftar Buku yang Dipinjam</h2>

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Judul Buku</th>
            <th class="border px-2 py-1">Jumlah</th>
            <th class="border px-2 py-1">Status Pengembalian</th>
            <th class="border px-2 py-1">Status Peminjaman</th>
            <th class="border px-2 py-1">Tanggal Pinjam</th>
            <th class="border px-2 py-1">Tanggal Kembali</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($peminjaman as $i => $p)
        @php
            $bukuCount = $p->buku->count();
        @endphp
        @foreach($p->buku as $index => $b)
        <tr>
            @if($index == 0)
            <td rowspan="{{ $bukuCount }}" class="border px-2 py-1 text-center">{{ $i + 1 }}</td>
            @endif

            <td class="border px-2 py-1">{{ $b->judul }}</td>
            <td class="border px-2 py-1 text-center">{{ $b->pivot->jumlah }}</td>
            <td class="border px-2 py-1 text-center">{{ $b->pivot->status_kembali }}</td>

            @if($index == 0)
            <td rowspan="{{ $bukuCount }}" class="border px-2 py-1 text-center">{{ $p->status }}</td>
            <td rowspan="{{ $bukuCount }}" class="border px-2 py-1 text-center">{{ $p->tanggal_pinjam }}</td>
            <td rowspan="{{ $bukuCount }}" class="border px-2 py-1 text-center">
                @php
                    // Isi tanggal_kembali hanya jika semua buku sudah dikembalikan
                    $allReturned = $p->detailPeminjaman->where('status_kembali', 'dikembalikan')->count() === $p->detailPeminjaman->count();
                @endphp
                {{ $allReturned ? $p->tanggal_kembali : '-' }}
            </td>
            <td rowspan="{{ $bukuCount }}" class="border px-2 py-1 text-center">
                @if($b->pivot->status_kembali == 'dipinjam')
                    <form action="{{ route('anggota.pengembalian.ajukan', $b->pivot->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                            Ajukan Pengembalian
                        </button>
                    </form>
                @elseif($b->pivot->status_kembali == 'menunggu persetujuan')
                    <span class="text-blue-600 font-semibold">Menunggu Persetujuan</span>
                @elseif($b->pivot->status_kembali == 'dikembalikan')
                    <span class="text-green-600 font-semibold">Dikembalikan</span>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    @endforeach
    </tbody>
</table>

@endsection
    