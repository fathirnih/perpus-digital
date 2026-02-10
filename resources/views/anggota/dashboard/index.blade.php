@extends('layouts.app')

@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('title', 'Dashboard Siswa')

@section('content')
<h1 class="text-3xl font-bold">Selamat Datang, {{ Auth::user()->nama }}!</h1>
<p class="mt-2">Ini dashboard sederhana.</p>
@endsection
x