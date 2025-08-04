<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\ServiceReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'profil'])->name('profile');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// Halaman Publik
Route::get('/services', function () {
    return view('services');
})->name('services');
// Reservasi (Hanya bisa diakses jika login)
Route::get('/services/reservasi', function () {
    return auth()->check()
        ? view('formservices')
        : redirect()->route('signin')->with('error', 'Silakan login terlebih dahulu.');
})->name('services.form');

Route::post('/reservasi-layanan', [ServiceReservationController::class, 'store'])
    ->name('reservasi.store')
    ->middleware('auth');

Route::get('/doctor', [DokterController::class, 'showPublic'])->name('doctor');
Route::get('/article', [ArtikelController::class, 'showPublic'])->name('article');
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');
// Login
Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [LoginController::class, 'login'])->name('signin.submit');
// Daftar
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup');
Route::post('/signup', [RegisterController::class, 'register'])->name('register.submit');
// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Grup Middleware: Admin & Dokter
Route::middleware(['auth', 'adminOrDokter'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // Kelola Dokter
    Route::get('/admin/kelola-dokter', [DokterController::class, 'index'])->name('kelola-dokter');
    Route::post('/admin/kelola-dokter', [DokterController::class, 'store'])->name('dokter.store');
    Route::put('/admin/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
    Route::delete('/admin/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');
    // Kelola Artikel
    Route::get('/admin/kelola-artikel', [ArtikelController::class, 'index'])->name('kelola-artikel');
    Route::post('/admin/kelola-artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::put('/admin/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/admin/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    // Kelola Layanan
    Route::get('/admin/kelola-layanan', [ServiceReservationController::class, 'index'])->name('kelola-layanan');
    // Kelola Pengguna
    Route::get('/admin/pengguna', [PenggunaController::class, 'index'])->name('kelola-pengguna');
});
