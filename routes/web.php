<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\AnggotaAuthController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\KategoriController;


Route::get('/', function() {
    return view('auth.choose');
});

// Login Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
});

// Login Anggota
Route::get('/anggota/login', [AnggotaAuthController::class, 'showLoginForm'])->name('anggota.login');
Route::post('/anggota/login', [AnggotaAuthController::class, 'login']);
Route::post('/anggota/logout', [AnggotaAuthController::class, 'logout'])->name('anggota.logout');

Route::middleware('auth:anggota')->group(function () {
    Route::get('/anggota/dashboard', [AnggotaAuthController::class, 'dashboard'])->name('anggota.dashboard');
});


// Route CRUD Anggota untuk admin
Route::middleware('auth')->group(function () {
    Route::resource('/admin/anggota', AnggotaController::class, ['as' => 'admin']);
    Route::resource('/admin/buku', BukuController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('/admin/kategori', KategoriController::class, ['as' => 'admin'])->except(['show']);
});