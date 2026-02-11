@extends('layouts.app')

@section('title', 'Profil Siswa')
@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Profil Siswa</h1>

    @if(session('success'))
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex items-center space-x-6">
            <div class="w-24 h-24 rounded-full bg-gray-100 border-4 border-white shadow flex items-center justify-center overflow-hidden">
                @if($anggota->foto)
                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt="{{ $anggota->nama }}" class="w-full h-full object-cover">
                @else
                    <i class="fas fa-user text-gray-400 text-3xl"></i>
                @endif
            </div>
            <div>
                <h2 class="text-xl font-bold">{{ $anggota->nama }}</h2>
                <p class="mt-1">
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">{{ $anggota->kelas }}</span>
                    <span class="ml-3 text-gray-600">NISN: {{ $anggota->nisn }}</span>
                </p>
            </div>
        </div>

        <form action="{{ route('anggota.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $anggota->nama) }}" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Kelas</label>
                    <input type="text" name="kelas" value="{{ old('kelas', $anggota->kelas) }}" class="w-full px-4 py-2 border rounded-lg" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ old('alamat', $anggota->alamat) }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">Foto Profil</label>
                    <input type="file" name="foto" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('anggota.dashboard') }}" class="px-6 py-2 border rounded-lg">Batal</a>
                <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
