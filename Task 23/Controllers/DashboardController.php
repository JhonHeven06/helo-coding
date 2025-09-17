<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
       
        $totalProducts = Product::count();

        $totalClicks = Product::sum('klik');

        $totalCategories = Category::count();

        return view('dashboard.index', compact('totalProducts', 'totalClicks', 'totalCategories'));
    }
}
