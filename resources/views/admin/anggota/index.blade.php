@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Daftar Anggota')

@section('content')
<h1 class="text-3xl font-bold mb-4">Daftar Anggota</h1>

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-2 py-1">#</th>
            <th class="border px-2 py-1">Nama</th>
            <th class="border px-2 py-1">NISN</th>
            <th class="border px-2 py-1">Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $i => $a)
        <tr>
            <td class="border px-2 py-1">{{ $i + 1 }}</td>
            <td class="border px-2 py-1">{{ $a->nama }}</td>
            <td class="border px-2 py-1">{{ $a->nisn }}</td>
            <td class="border px-2 py-1">{{ $a->kelas }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
