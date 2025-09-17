<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductCategoryController extends Controller
{
    
    public function edit(Category $category)
    {
        return view('product-categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
      
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('product-categories.index')->with('success', 'Kategori produk berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('product-categories.index')->with('success', 'Kategori produk berhasil dihapus!');
    }
}
