<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\inventory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return view('welcome', ['title' => 'Aplikasi Inventory barang dengan  Laravel']);
});

Route::get('home', function () {
    return view('home');
});

//Data Jenis Barang  
Route::get('jenis', [JenisController::class, 'index'])->name('jenis.index');
Route::get('jenis/create', [JenisController::class, 'create'])->name('jenis.create');
Route::post('jenis', [JenisController::class, 'store'])->name('jenis.store');
Route::get('jenis/{id_jenis}/edit', [JenisController::class, 'edit'])->name('jenis.edit');
Route::put('jenis/{id_jenis}', [JenisController::class, 'update'])->name('jenis.update');
Route::delete('jenis/{id_jenis}', [JenisController::class, 'destroy'])->name('jenis.destroy');


//Data location   
Route::get('location', [LocationController::class, 'index'])->name('location.index');
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('location', [LocationController::class, 'store'])->name('location.store');
Route::get('location/{location_id}/edit', [LocationController::class, 'edit'])->name('location.edit');
Route::put('location/{location_id}', [LocationController::class, 'update'])->name('location.update');
Route::delete('location/{location_id}', [LocationController::class, 'destroy'])->name('location.destroy');


//Data user   
Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('pengguna/{user_id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::put('pengguna/{user_id}', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('pengguna/{user_id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

#tambahkan route berikut
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');
Route::get('/signup', [AuthController::class, 'signUpForm'])->name('auth.signUpForm');
// //Data inventory
Route::get('inventory', [inventory::class, 'index'])->name('inventory.index');
Route::get('inventory/create', [inventory::class, 'create'])->name('inventory.create');
Route::post('inventory', [inventory::class, 'store'])->name('inventory.store');
Route::get('inventory/{id}/edit', [inventory::class, 'edit'])->name('inventory.edit');
Route::put('inventory/{id}', [inventory::class, 'update'])->name('inventory.update');
Route::delete('inventory/{id}', [inventory::class, 'destroy'])->name('inventory.destroy');
