<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

Route::resource('products', ProductController::class);
Route::resource('product-categories', ProductCategoryController::class);
