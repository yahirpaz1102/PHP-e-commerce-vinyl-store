<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }


    public function checkout()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = $cart->getTotal();

        return view('checkout.index', compact('cart', 'total'));
    }


    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
        ]);

        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = $cart->getTotal();

        // Create order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $total,
            'shipping_address' => $request->shipping_address,
            'billing_address' => $request->billing_address,
        ]);

        // Create order items from cart items
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price, // Store current price
            ]);
        }

        // Clear the cart
        $cart->items()->delete();

        return redirect()->route('orders.show', $order->order_id)
            ->with('success', 'Order placed successfully!');
    }


    public function show($id)
    {
        $order = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
