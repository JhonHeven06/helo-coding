<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function index()
    {
      
        $categories = Category::with('products')->get();
        
        return view('products.index', compact('categories'));
    }
}
