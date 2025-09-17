<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function show(Product $product)
    {
        $product->increment('click_count');
      
        return view('products.show', compact('product'));
    }
}
