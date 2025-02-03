<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;

Route::middleware(['guest'])->group(function () {
});

//Account
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/loginprocess', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerprocess', [AuthController::class, 'registerProcess'])->name('registerProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//pelanggan
Route::post('/kasir/add/tambahpelangganproces', [HomeController::class, 'TambahPelangganproces'])->name('TambahPelangganproces');
Route::get('/kasir/add/tambahpelanggan', [HomeController::class, 'tambahPelanggan'])->name('tambahPelanggan');
Route::get('/kasir/pelanggan', [HomeController::class, 'tampilPelanggan'])->name('tampilPelanggan');
Route::delete('/kasir/pelanggan/{id}', [HomeController::class, 'hapusPelanggan'])->name('HapusPelanggan');

//pegawai
Route::post('/kasir/add/tambahpegawaiproces', [HomeController::class, 'tambahPegawaiProces'])->name('TambahPegawaiProces');
Route::get('/kasir/add/tambahpegawai', [HomeController::class, 'tambahPegawai'])->name('tambahPegawai');
Route::get('/kasir/pegawai', [HomeController::class, 'tampilPegawai'])->name('tampilPegawai');
Route::delete('/kasir/pegawai/{id_user}', [HomeController::class, 'hapusPegawai'])->name('HapusPegawai');

//barang
Route::post('/kasir/add/tambahbarangproces', [BarangController::class, 'TambahBarangproces'])->name('TambahBarangproces');
Route::get('/kasir/barang', [BarangController::class, 'tampilBarang'])->name('tampilBarang');
Route::get('/kasir/add/tambahbarang', [BarangController::class, 'tambahBarang'])->name('tambahBarang');
Route::delete('/kasir/barang/{id_barang}', [BarangController::class, 'hapusBarang'])->name('HapusBarang');
Route::get('/kasir/barang/{id_barang}/edit', [BarangController::class, 'editBarang'])->name('EditBarang');
Route::patch('/kasir/barang/{id_barang}', [BarangController::class, 'updateBarang'])->name('updateBarang');

//penjualan
Route::get('/transaksi/tambahTransaksi', [PenjualanController::class, 'tambahTransaksi'])->name('tambahTransaksi');
Route::post('/transaksi/simpanTransaksi', [PenjualanController::class, 'simpanTransaksi'])->name('simpanTransaksi');


Route::middleware(['auth'])->group(function () {

});






