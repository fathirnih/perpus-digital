<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AnggotaAuthController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;


Route::get('/', function() {
    return view('auth.choose');
});

// Login Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Login Anggota
Route::get('/anggota/login', [AnggotaAuthController::class, 'showLoginForm'])->name('anggota.login');
Route::post('/anggota/login', [AnggotaAuthController::class, 'login']);
Route::post('/anggota/logout', [AnggotaAuthController::class, 'logout'])->name('anggota.logout');

// Form register anggota
Route::get('/anggota/register', [AnggotaAuthController::class, 'showRegisterForm'])->name('anggota.register');
Route::post('/anggota/register', [AnggotaAuthController::class, 'register']);



// Middleware admin
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard.index');

    // CRUD admin
    Route::resource('/admin/anggota', AnggotaController::class, ['as' => 'admin']);
    Route::resource('/admin/buku', BukuController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('/admin/kategori', KategoriController::class, ['as' => 'admin'])->except(['show']);

    Route::get('peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::patch('peminjaman/{id}/terima', [AdminPeminjamanController::class, 'terimaKembali'])->name('admin.peminjaman.terima');
});

// Middleware anggota
Route::middleware('auth:anggota')->group(function () {
    Route::get('/anggota/dashboard', [AnggotaAuthController::class, 'dashboard'])->name('anggota.dashboard');

    Route::get('/anggota/peminjaman', [PeminjamanController::class, 'index'])->name('anggota.peminjaman');
    Route::post('/anggota/peminjaman', [PeminjamanController::class, 'store'])->name('anggota.peminjaman.store');
    Route::get('pengembalian', [PeminjamanController::class, 'pengembalian'])->name('anggota.pengembalian');
    Route::patch('pengembalian/{id}/ajukan', [PeminjamanController::class, 'ajukanKembali'])->name('anggota.pengembalian.ajukan');
});
