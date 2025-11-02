<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\FrontPosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalesController;
// Impor controller auth front-end Anda
use App\Http\Controllers\Front\FrontAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login'); 


Route::post('/login', [FrontAuthController::class, 'login'])->middleware('guest');


Route::post('/logout', [FrontAuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

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


    Route::get('/invoices/show/1', function () {
        return view('invoices.show');
    })->name('invoices.show');

    // Route untuk menampilkan halaman laporan
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');

    Route::get('/pos', [FrontPosController::class, 'index'])->name('pos.index');
    Route::post('/pos/process-payment', [FrontPosController::class, 'processPayment'])->name('pos.processPayment');

    Route::get('/purchasing', [PurchasingController::class, 'index'])->name('purchasing.index');
    Route::get('/purchasing/create', [PurchasingController::class, 'create'])->name('purchasing.create');

    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');

    Route::get('/users/create', function () {
        return view('users.create');
    })->name('users.create');

 
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

});
