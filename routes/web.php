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
Route::get('/', [DashboardController::class, 'index']);
Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
Route::get('/purchasing', [PurchasingController::class, 'index'])->name('purchasing.index');
Route::get('/purchasing/create', [PurchasingController::class, 'index'])->name('purchasing.create');

// backend
Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('sales', SalesController::class);