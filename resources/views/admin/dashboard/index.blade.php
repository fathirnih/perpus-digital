@extends('layouts.app')

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="text-3xl font-bold">Selamat Datang, Admin!</h1>
<p class="mt-2">Ini dashboard sederhana.</p>
@endsection
