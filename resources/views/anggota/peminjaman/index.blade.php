@extends('layouts.app')

@section('sidebar')
    @include('anggota.partials.sidebar')
@endsection

@section('title', 'Peminjaman Buku')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Peminjaman Buku</h1>
            <p class="text-gray-600 mt-2">Pinjam buku yang tersedia dan kelola peminjaman Anda</p>
        </div>
        <div class="mt-4 md:mt-0">
            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">
                {{ $buku->count() }} Buku Tersedia
            </span>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Form Peminjaman Section -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <div class="flex items-center mb-6">
            <div class="bg-blue-100 p-2 rounded-lg mr-3">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Pinjam Buku Baru</h2>
        </div>

        <form action="{{ route('anggota.peminjaman.store') }}" method="POST">
            @csrf
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <input type="checkbox" id="selectAll" class="h-4 w-4 text-blue-600 rounded border-gray-300">
                                    <label for="selectAll" class="ml-2">Pilih Semua</label>
                                </div>
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tersedia</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Pinjam</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($buku as $b)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" name="buku_ids[]" value="{{ $b->id }}" 
                                       class="book-checkbox h-4 w-4 text-blue-600 rounded border-gray-300">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $b->judul }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $b->jumlah > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $b->jumlah }} buku
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <input type="number" 
                                           name="jumlah[{{ $b->id }}]" 
                                           min="1" 
                                           max="{{ $b->jumlah }}" 
                                           value="1" 
                                           class="w-20 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                           {{ $b->jumlah == 0 ? 'disabled' : '' }}>
                                    <span class="ml-2 text-sm text-gray-500">max {{ $b->jumlah }}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($buku->count() > 0)
            <div class="mt-6 flex justify-end">
                <button type="submit" 
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Pinjam Buku Terpilih
                </button>
            </div>
            @else
            <div class="text-center py-8">
                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <p class="mt-4 text-gray-500">Tidak ada buku yang tersedia untuk dipinjam</p>
            </div>
            @endif
        </form>
    </div>

    <!-- Daftar Peminjaman Section -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center mb-6">
            <div class="bg-purple-100 p-2 rounded-lg mr-3">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Riwayat Peminjaman</h2>
        </div>

        @if($peminjaman->count() > 0)
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail Buku</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($peminjaman as $i => $p)
                        @php
                            $bukuCount = $p->buku->count();
                            $allReturned = $p->detailPeminjaman->where('status_kembali', 'dikembalikan')->count() === $p->detailPeminjaman->count();
                        @endphp
                        
                        @foreach($p->buku as $index => $b)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            @if($index == 0)
                            <td rowspan="{{ $bukuCount }}" class="px-6 py-4 align-top">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">{{ $i + 1 }}</div>
                                </div>
                            </td>
                            @endif

                            <td class="px-6 py-4">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <span class="text-blue-600 text-xs font-bold">{{ $loop->iteration }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $b->judul }}</div>
                                        <div class="text-sm text-gray-500 mt-1">
                                            <span class="inline-flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                                </svg>
                                                Jumlah: {{ $b->pivot->jumlah }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex flex-col space-y-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($b->pivot->status_kembali == 'dipinjam') bg-yellow-100 text-yellow-800
                                        @elseif($b->pivot->status_kembali == 'menunggu persetujuan') bg-blue-100 text-blue-800
                                        @elseif($b->pivot->status_kembali == 'dikembalikan') bg-green-100 text-green-800
                                        @endif">
                                        {{ ucfirst($b->pivot->status_kembali) }}
                                    </span>
                                    @if($index == 0)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($p->status == 'dipinjam') bg-purple-100 text-purple-800
                                        @elseif($p->status == 'selesai') bg-green-100 text-green-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                    @endif
                                </div>
                            </td>

                            @if($index == 0)
                            <td rowspan="{{ $bukuCount }}" class="px-6 py-4 align-top">
                                <div class="space-y-2">
                                    <div>
                                        <div class="text-xs text-gray-500">Pinjam</div>
                                        <div class="text-sm font-medium">{{ $p->tanggal_pinjam }}</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">Kembali</div>
                                        <div class="text-sm font-medium {{ $allReturned ? 'text-green-600' : 'text-gray-500' }}">
                                            {{ $allReturned ? $p->tanggal_kembali : 'Belum dikembalikan' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td rowspan="{{ $bukuCount }}" class="px-6 py-4 align-top">
                                @if($b->pivot->status_kembali == 'dipinjam')
                                    <form action="{{ route('anggota.pengembalian.ajukan', $b->pivot->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white text-sm font-medium rounded-lg hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Ajukan Pengembalian
                                        </button>
                                    </form>
                                @elseif($b->pivot->status_kembali == 'menunggu persetujuan')
                                    <div class="flex items-center text-blue-600">
                                        <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-medium">Menunggu Persetujuan</span>
                                    </div>
                                @elseif($b->pivot->status_kembali == 'dikembalikan')
                                    <div class="flex items-center text-green-600">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        <span class="font-medium">Dikembalikan</span>
                                    </div>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada peminjaman</h3>
            <p class="text-gray-500">Mulai dengan meminjam buku dari daftar di atas</p>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Select all checkbox functionality
    document.getElementById('selectAll').addEventListener('change', function(e) {
        const checkboxes = document.querySelectorAll('.book-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = e.target.checked;
            // Enable/disable quantity inputs based on checkbox
            const inputId = checkbox.value;
            const quantityInput = document.querySelector(`input[name="jumlah[${inputId}]"]`);
            if (quantityInput) {
                quantityInput.disabled = !e.target.checked;
            }
        });
    });

    // Individual checkbox functionality
    document.querySelectorAll('.book-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function(e) {
            const inputId = this.value;
            const quantityInput = document.querySelector(`input[name="jumlah[${inputId}]"]`);
            if (quantityInput) {
                quantityInput.disabled = !e.target.checked;
            }
            
            // Update select all checkbox
            const allChecked = Array.from(document.querySelectorAll('.book-checkbox'))
                .every(cb => cb.checked);
            document.getElementById('selectAll').checked = allChecked;
        });
    });

    // Initialize quantity inputs based on initial checkbox state
    document.querySelectorAll('.book-checkbox').forEach(checkbox => {
        const inputId = checkbox.value;
        const quantityInput = document.querySelector(`input[name="jumlah[${inputId}]"]`);
        if (quantityInput) {
            quantityInput.disabled = !checkbox.checked;
        }
    });
</script>
@endpush

<style>
    /* Smooth transitions */
    .transition-colors {
        transition-property: background-color, border-color, color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }

    /* Custom scrollbar */
    .overflow-x-auto::-webkit-scrollbar {
        height: 6px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 3px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 3px;
    }
    
    .overflow-x-auto::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
@endsection