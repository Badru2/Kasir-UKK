<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('petugas', [PetugasController::class, 'create'])->name('index.petugas');
    Route::post('store/petugas', [PetugasController::class, 'store'])->name('store.petugas');
    Route::delete('delete/petugas/{id}', [PetugasController::class, 'destroy'])->name('delete.petugas');
    Route::get('edit/petugas/{id}', [PetugasController::class, 'edit'])->name('edit.petugas');
    Route::patch('update/petugas/{id}', [PetugasController::class, 'update'])->name('update.petugas');

    Route::get('produk', [ProdukController::class, 'index'])->name('index.produk');
    Route::post('store/produk', [ProdukController::class, 'store'])->name('store.produk');
    Route::delete('delete/produk/{id}', [ProdukController::class, 'destroy'])->name('delete.produk');
    Route::get('edit/produk/{id}', [ProdukController::class, 'edit'])->name('edit.produk');
    Route::patch('update/produk/{id}', [ProdukController::class, 'update'])->name('update.produk');

    Route::get('pelanggan', [PelangganController::class, 'index'])->name('index.pelanggan');
    Route::delete('delete/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('delete.pelanggan');

    Route::get('transaksi', [PenjualanController::class, 'index'])->name('index.penjualan');
    Route::post('store/penjualan', [PenjualanController::class, 'store'])->name('store.penjualan');
    Route::delete('delete/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('delete.penjualan');

    Route::get('detail/{id}', [DetailPenjualanController::class, 'index'])->name('detail.penjualan');
    Route::post('store/detail', [DetailPenjualanController::class, 'store'])->name('store.detail');
    Route::post('bayar/{id}', [DetailPenjualanController::class, 'bayar'])->name('bayar');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
