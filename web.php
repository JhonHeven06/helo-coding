<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// 1. Home Page Route (/)
Route::get('/', function () {
    return view('welcome');
});

// 2. Products Page Route (/products)
Route::get('/products', [ProductController::class, 'index']);

// 3. Cart Page Route (/cart)
Route::get('/cart', function () {
    return view('cart');
});

// 4. Checkout Page Route (/checkout)
Route::get('/checkout', function () {
    return view('checkout');
});

// Route to process the order
Route::post('/checkout', [OrderController::class, 'store']);
