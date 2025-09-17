<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = ProductCategory::count();
        $totalClicks = Product::sum('click_count');
        
        return view('dashboard', compact('totalProducts', 'totalCategories', 'totalClicks'));
    }
}
