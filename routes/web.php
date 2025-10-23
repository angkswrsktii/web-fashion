<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// frontend
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route untuk menampilkan daftar inventaris
Route::get('/inventory', function () {
    return view('inventory.index');
})->name('inventory.index');

// Route untuk menampilkan form tambah produk baru
Route::get('/inventory/create', function () {
    return view('inventory.create');
})->name('inventory.create');

// Route untuk menampilkan daftar invoices
Route::get('/invoices', function () {
    return view('invoices.index');
})->name('invoices.index');

// Route untuk menampilkan detail satu invoice (kita gunakan ID 1 sebagai contoh)
Route::get('/invoices/show/1', function () {
    return view('invoices.show');
})->name('invoices.show');

// Route untuk menampilkan halaman laporan
Route::get('/reports', function () {
    return view('reports.index');
})->name('reports.index');

Route::get('/', function () {
    // Arahkan root URL ke view dashboard
    return view('dashboard.index');
})->name('dashboard.index'); // Nama route ini harus 'dashboard.index'

Route::get('/dashboard', function () {
    // Ini juga bisa jadi route alternatif
    return view('dashboard.index');
});
Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::get('/purchasing', [PurchasingController::class, 'index'])->name('purchasing.index');
Route::get('/purchasing/create', [PurchasingController::class, 'create'])->name('purchasing.create');

Route::get('/users', function () {
    return view('users.index');
})->name('users.index');

Route::get('/users/create', function () {
    return view('users.create');
})->name('users.create');

// Route 'edit' akan menggunakan ID 1 sebagai contoh
Route::get('/users/1/edit', function () {
    return view('users.edit');
})->name('users.edit');

Route::get('/purchasing/show/1', function () {
    return view('purchasing.show');
})->name('purchasing.show');

// Route untuk menampilkan form edit inventory
Route::get('/inventory/1/edit', function () {
    return view('inventory.edit');
})->name('inventory.edit');