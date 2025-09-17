<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
