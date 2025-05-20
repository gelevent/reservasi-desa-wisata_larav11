<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriWisataController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\ObyekWisataController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PenginapanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;

// Auth routes (login, logout, register)
Auth::routes(['register' => true]);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', fn() => view('auth.login'))->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Halaman utama user
Route::get('/', [HomeController::class, 'index'])->name('home');

// Form reservasi (user/public)
Route::controller(ReservasiController::class)->group(function () {
    Route::get('/reservasi', 'create')->name('reservasi.form');
    Route::post('/reservasi', 'store')->name('reservasi.store');
});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita
    Route::controller(BeritaController::class)->prefix('berita')->name('berita.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{berita}', 'show')->name('show');
        Route::get('/{berita}/edit', 'edit')->name('edit');
        Route::put('/{berita}', 'update')->name('update');
        Route::delete('/{berita}', 'destroy')->name('destroy');
    });

    // Karyawan
    Route::controller(KaryawanController::class)->prefix('karyawan')->name('karyawan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{karyawan}', 'show')->name('show');
        Route::get('/{karyawan}/edit', 'edit')->name('edit');
        Route::put('/{karyawan}', 'update')->name('update');
        Route::delete('/{karyawan}', 'destroy')->name('destroy');
    });

    // Kategori Berita
    Route::controller(KategoriBeritaController::class)->prefix('kategori-berita')->name('kategori-berita.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{kategori_berita}', 'show')->name('show');
        Route::get('/{kategori_berita}/edit', 'edit')->name('edit');
        Route::put('/{kategori_berita}', 'update')->name('update');
        Route::delete('/{kategori_berita}', 'destroy')->name('destroy');
    });

    // Kategori Wisata
    Route::controller(KategoriWisataController::class)->prefix('kategori-wisata')->name('kategori-wisata.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{kategori_wisata}', 'show')->name('show');
        Route::get('/{kategori_wisata}/edit', 'edit')->name('edit');
        Route::put('/{kategori_wisata}', 'update')->name('update');
        Route::delete('/{kategori_wisata}', 'destroy')->name('destroy');
    });

    // Obyek Wisata
    Route::controller(ObyekWisataController::class)->prefix('obyek-wisata')->name('obyek-wisata.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{obyek_wisata}', 'show')->name('show');
        Route::get('/{obyek_wisata}/edit', 'edit')->name('edit');
        Route::put('/{obyek_wisata}', 'update')->name('update');
        Route::delete('/{obyek_wisata}', 'destroy')->name('destroy');
    });

    // Paket Wisata
    Route::controller(PaketWisataController::class)->prefix('paket-wisata')->name('paket-wisata.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{paket_wisata}', 'show')->name('show');
        Route::get('/{paket_wisata}/edit', 'edit')->name('edit');
        Route::put('/{paket_wisata}', 'update')->name('update');
        Route::delete('/{paket_wisata}', 'destroy')->name('destroy');
    });

    // Pelanggan
    Route::controller(PelangganController::class)->prefix('pelanggan')->name('pelanggan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{pelanggan}', 'show')->name('show');
        Route::get('/{pelanggan}/edit', 'edit')->name('edit');
        Route::put('/{pelanggan}', 'update')->name('update');
        Route::delete('/{pelanggan}', 'destroy')->name('destroy');
    });

    // Penginapan
    Route::controller(PenginapanController::class)->prefix('penginapan')->name('penginapan.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{penginapan}', 'show')->name('show');
        Route::get('/{penginapan}/edit', 'edit')->name('edit');
        Route::put('/{penginapan}', 'update')->name('update');
        Route::delete('/{penginapan}', 'destroy')->name('destroy');
    });

    // Reservasi Admin
    Route::controller(ReservasiController::class)->prefix('reservasi')->name('reservasi.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{reservasi}', 'show')->name('show');
        Route::get('/{reservasi}/edit', 'edit')->name('edit');
        Route::put('/{reservasi}', 'update')->name('update');
        Route::delete('/{reservasi}', 'destroy')->name('destroy');
    });
});
