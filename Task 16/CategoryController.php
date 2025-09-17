<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    
        $categories = ProductCategory::withCount('products')->get();

        return view('categories.index', compact('categories'));
    }
}
