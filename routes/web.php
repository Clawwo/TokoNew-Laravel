<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\App;

Route::middleware(['guest'])->group(function () {});

//Account
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/loginprocess', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerprocess', [AuthController::class, 'registerProcess'])->name('registerProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//pelanggan
Route::post('/TokoNew/add/customersproces', [HomeController::class, 'TambahPelangganproces'])->name('TambahPelangganproces');
Route::get('/TokoNew/add/customers', [HomeController::class, 'tambahPelanggan'])->name('tambahPelanggan');
Route::get('/TokoNew/customers', [HomeController::class, 'tampilPelanggan'])->name('tampilPelanggan');
Route::get('/TokoNew/edit/customers/{id_pelanggan}', [HomeController::class, 'editPelanggan'])->name('editPelanggan');
Route::patch('/TokoNew/update/customers/{id_pelanggan}', [HomeController::class, 'updatePelanggan'])->name('updatePelanggan');
Route::delete('/TokoNew/delete/customers/{id}', [HomeController::class, 'hapusPelanggan'])->name('HapusPelanggan');

//pegawai
Route::post('/TokoNew/add/employeesproces', [HomeController::class, 'tambahPegawaiProces'])->name('TambahPegawaiProces');
Route::get('/TokoNew/add/employees', [HomeController::class, 'tambahPegawai'])->name('tambahPegawai');
Route::get('/TokoNew/employees', [HomeController::class, 'tampilPegawai'])->name('tampilPegawai');
Route::get('/TokoNew/edit/employees/{id_user}', [HomeController::class, 'editPegawai'])->name('editPegawai');
Route::patch('/TokoNew/update/employees/{id_user}', [HomeController::class, 'updatePegawai'])->name('updatePegawai');
Route::delete('/TokoNew/delete/employees/{id_user}', [HomeController::class, 'hapusPegawai'])->name('HapusPegawai');

//barang
Route::post('/TokoNew/add/itemsproces', [BarangController::class, 'TambahBarangproces'])->name('TambahBarangproces');
Route::get('/TokoNew/add/items', [BarangController::class, 'tambahBarang'])->name('tambahBarang');
Route::get('/TokoNew/items', [BarangController::class, 'tampilBarang'])->name('tampilBarang');
Route::delete('/TokoNew/delete/items/{id_barang}', [BarangController::class, 'hapusBarang'])->name('HapusBarang');
Route::get('/TokoNew/edit/items/{id_barang}', [BarangController::class, 'editBarang'])->name('EditBarang');
Route::patch('/TokoNew/update/items/{id_barang}', [BarangController::class, 'updateBarang'])->name('updateBarang');

//penjualan
Route::get('/transaksi', [PenjualanController::class, 'create'])->name('transaksi.create');
Route::post('/transaksiprocess', [PenjualanController::class, 'store'])->name('simpanTransaksi');
Route::get('/barang/{id_barang}', [PenjualanController::class, 'getBarang'])->name('getBarang');
Route::get('/invoice/riwayat', [PenjualanController::class, 'riwayatInvoice'])->name('riwayatInvoice');
Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('hapusInvoice');
Route::get('/get-pelanggan/{id}', [PenjualanController::class, 'getPelanggan']);
Route::get('/get-transaction/{id}', [PenjualanController::class, 'getTransaction'])->name('dataTransaction');
Route::get('/filterInvoice', [PenjualanController::class, 'filterInvoice'])->name('filterInvoice');

Route::middleware(['auth'])->group(function () {});
