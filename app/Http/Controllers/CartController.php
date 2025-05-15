<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $items = $cart->items()->with('product')->get();
        $total = $cart->getTotal();

        return view('cart.index', compact('items', 'total'));
    }


    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        $item = Item::firstOrNew([
            'cart_id' => $cart->cart_id,
            'product_id' => $productId,
        ]);

        // Default to quantity 1 if new item, otherwise add 1
        $quantity = $request->input('quantity', 1);
        $item->quantity = ($item->exists ? $item->quantity : 0) + $quantity;
        $item->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item = Item::findOrFail($itemId);

        // Ensure the item belongs to the user's cart
        if ($item->cart->user_id != Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Unauthorized action!');
        }

        $item->quantity = $request->quantity;
        $item->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove($itemId)
    {
        $item = Item::findOrFail($itemId);

        // Ensure the item belongs to the user's cart
        if ($item->cart->user_id != Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Unauthorized action!');
        }

        $item->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function clear()
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            $cart->items()->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
