<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AnggotaAuthController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;

Route::get('/', function () {
    return view('auth.choose');
});

Route::get('/', function() {
    return view('auth.choose');
})->name('login');


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
Route::middleware('admin.auth')->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    // CRUD admin
    Route::resource('anggota', AnggotaController::class, ['as' => 'admin']);
    Route::resource('buku', BukuController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('kategori', KategoriController::class, ['as' => 'admin'])->except(['show']);

    Route::get('pengembalian', [PengembalianController::class, 'index'])->name('admin.pengembalian.index');
    Route::patch('pengembalian/terima/{id}', [App\Http\Controllers\Admin\PengembalianController::class, 'terimaKembali'])->name('admin.pengembalian.terima');
    Route::patch('pengembalian/tolak/{id}', [App\Http\Controllers\Admin\PengembalianController::class, 'tolakKembali'])->name('admin.pengembalian.tolak');
});

// Middleware anggota
Route::middleware('anggota.auth')->group(function () {
    Route::get('/anggota/dashboard', [AnggotaAuthController::class, 'dashboard'])->name('anggota.dashboard');

    Route::get('/anggota/peminjaman', [PeminjamanController::class, 'index'])->name('anggota.peminjaman');
    Route::post('/anggota/peminjaman', [PeminjamanController::class, 'store'])->name('anggota.peminjaman.store');
    Route::get('pengembalian', [PeminjamanController::class, 'pengembalian'])->name('anggota.pengembalian');
    Route::patch('pengembalian/{detail_id}/ajukan', [PeminjamanController::class, 'ajukanKembali'])->name('anggota.pengembalian.ajukan');

    Route::get('/profile', [ProfileController::class, 'index'])->name('anggota.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('anggota.profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('anggota.profile.password');
});
