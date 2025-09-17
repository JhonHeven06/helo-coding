<?php

use Illuminate\Support\Facades\Route;

// Rute untuk Halaman Utama
Route::get('/', function () {
    return view('homepage');
});

// Rute untuk Halaman Daftar Produk
Route::get('/produk', function () {
    return view('products');
});

// Rute untuk Halaman Keranjang Belanja
Route::get('/keranjang', function () {
    return view('cart');
});
