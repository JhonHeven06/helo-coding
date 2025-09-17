<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // 

class ProductCategoryController extends Controller
{
   
    public function create()
    {
        return view('product-categories.create');
    }

     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('product-categories.index')->with('success', 'Kategori produk berhasil ditambahkan!');
    }
}
