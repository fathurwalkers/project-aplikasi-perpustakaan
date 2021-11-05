<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;

Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'post_login'])->name('post-login');
Route::post('/post-register', [BackController::class, 'post_register'])->name('post-register');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/dashboard', 'middleware' => 'ceklogin'], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
    Route::get('/profile/user', [BackController::class, 'profile'])->name('profile');

    // Daftar Route
    Route::get('/daftar-pengguna', [BackController::class, 'daftar_pengguna'])->name('daftar-pengguna');
    Route::get('/daftar-buku', [BackController::class, 'daftar_buku'])->name('daftar-buku');
    Route::get('/daftar-kategori', [BackController::class, 'daftar_kategori'])->name('daftar-kategori');
    Route::get('/daftar-pinjaman', [BackController::class, 'daftar_pinjaman'])->name('daftar-pinjaman');
    Route::get('/daftar-laporan', [BackController::class, 'daftar_laporan'])->name('daftar-laporan');

    // Tambah Route
    Route::get('/tambah-buku', [BackController::class, 'tambah_buku'])->name('tambah-buku');
    Route::get('/tambah-kategori', [BackController::class, 'tambah_kategori'])->name('tambah-kategori');
    
    // Post Tambah Route
    Route::post('/post-tambah-buku/post', [BackController::class, 'post_tambah_buku'])->name('post-tambah-buku');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
