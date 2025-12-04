<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Order saving
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Order placed successfully');
    }

    // user/admin order list
    public function index()
    {
        
         $user = Auth::user();

        // If admin → show all orders
        if($user->hasRole('admin')) {
            // Admin sees all orders with user info
            $orders = Order::with('user', 'product')->latest()->get();
        } 
        else {
            // Normal user → sees only his orders
            $orders = Order::with('product')
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

            return view('orders.index', compact('orders'));
        }
}
