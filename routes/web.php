<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;

// Halaman depan (publik)
Route::view('/', 'pages.landing')->name('landing');

// Login & registrasi pengguna
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::view('/lupa-password', 'auth.forgot-password')->name('password.forgot');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::view('/beranda', 'pages.beranda')->name('beranda');
    Route::view('/destinasi', 'pages.destinasi')->name('destinasi');
    Route::view('/paket-wisata', 'pages.paket-wisata')->name('paket');
    Route::view('/peta-wisata', 'pages.peta-wisata')->name('peta');
    Route::view('/laporan', 'pages.laporan')->name('laporan');
    Route::view('/kontak', 'pages.kontak')->name('kontak');
    Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');
    Route::view('/pembayaran', 'pages.pembayaran')->name('pembayaran');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // CRUD Galeri Wisata (dengan upload foto) — dilindungi middleware auth
    Route::get('/galeri/{galeri}/unduh', [GaleriController::class, 'unduh'])->name('galeri.unduh');
    Route::resource('galeri', GaleriController::class);
});

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.attempt');

    Route::middleware('admin')->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});
