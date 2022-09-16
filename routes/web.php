<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;

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

    // Lihat Route
    Route::get('/lihat-buku/lihat/buku/{id}', [BackController::class, 'lihat_buku'])->name('lihat-buku');

    // Tambah Route
    Route::get('/tambah-buku', [BackController::class, 'tambah_buku'])->name('tambah-buku');
    Route::get('/tambah-kategori', [BackController::class, 'tambah_kategori'])->name('tambah-kategori');
    Route::get('/tambah-pinjaman', [BackController::class, 'tambah_pinjaman'])->name('tambah-pinjaman');

    // Post Tambah Route
    Route::post('/post-tambah-buku/post', [BackController::class, 'post_tambah_buku'])->name('post-tambah-buku');
    Route::post('/post-tambah-kategori/post', [BackController::class, 'post_tambah_kategori'])->name('post-tambah-kategori');
    Route::post('/post-tambah-pinjaman/post', [BackController::class, 'post_tambah_pinjaman'])->name('post-tambah-pinjaman');

    // Edit Route
    Route::get('/edit-buku/edit/{id}', [BackController::class, 'edit_buku'])->name('edit-buku');

    // Update Route
    Route::post('/update-buku/update/{id}', [BackController::class, 'update_buku'])->name('update-buku');

    // Hapus Route
    Route::post('/hapus-buku/hapus/{id}', [BackController::class, 'hapus_buku'])->name('hapus-buku');
    Route::post('/hapus-kategori/hapus/{id}', [BackController::class, 'hapus_kategori'])->name('hapus-kategori');

    // Test Route
    Route::get('/test-page', [MailController::class, 'redirectmail'])->name('test-page');
    Route::post('/test-page/konfirmasi/{otpkode}', [MailController::class, 'konfirmasi'])->name('sendmail');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/generate-buku', [BackController::class, 'generate_buku'])->name('generate-buku');
});
