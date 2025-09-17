<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;

Route::get('/product-categories/create', [ProductCategoryController::class, 'create'])->name('product-category.create');
Route::post('/product-categories', [ProductCategoryController::class, 'store'])->name('product-category.store');

Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');

