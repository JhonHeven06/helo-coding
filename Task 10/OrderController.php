<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Simple validation
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'total_price' => 'required|numeric',
        ]);

        // Create a new order
        $order = Order::create($validatedData);

        return redirect('/checkout')->with('success', 'Pesanan Anda berhasil diproses!');
    }
}
