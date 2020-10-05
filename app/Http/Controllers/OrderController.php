<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
    	return view('orders.create');
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
        ]);

        foreach ($request->orderProducts as $product) {
            $order->products()->attach($product['product_id'],
                ['quantity' => $product['quantity']]);
        }

        return 'Order stored successfully!';
    }
}
