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
            <th class="border px-2 py-1">Status</th>
            <th class="border px-2 py-1">Tanggal Pinjam</th>
            <th class="border px-2 py-1">Tanggal Kembali</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peminjaman as $i => $p)
        <tr>
            <td class="border px-2 py-1">{{ $i + 1 }}</td>
            <td class="border px-2 py-1">
                @foreach($p->buku as $b)
                    {{ $b->judul }}<br>
                @endforeach
            </td>
            <td class="border px-2 py-1 text-center">
                @foreach($p->buku as $b)
                    {{ $b->pivot->jumlah }}<br>
                @endforeach
            </td>
            <td class="border px-2 py-1">{{ $p->status }}</td>
            <td class="border px-2 py-1">{{ $p->tanggal_pinjam }}</td>
            <td class="border px-2 py-1">{{ $p->tanggal_kembali ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
