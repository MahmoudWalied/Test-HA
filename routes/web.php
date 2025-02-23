<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () {
//     return view('welcome');
// });

// Add this route before other routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('purchase-orders', PurchaseOrderController::class)->except(['create', 'store']);

Route::get('/low-stock', [ProductController::class, 'lowStock'])
    ->name('products.low-stock');

Route::post('/order-request', [ProductController::class, 'sendOrderRequest'])->name('order.request');

Route::get('/reports', [ReportController::class, 'index'])
    ->name('reports.index');

