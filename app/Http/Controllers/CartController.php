<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        $cartCount = Cart::count();
        $cartItems = Cart::all();
        $products = $cartItems->map(function ($cartItem) {
            return $cartItem->product;
        });
        return view('pages.users.cart', compact('cartCount', 'cartItems', 'products', 'categories'));
    }

    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'required|string',
        ]);

        $product = Products::findOrFail($request->product_id);
        $userId = Auth::id();
        $quantity = $request->quantity;
        $totalPrice = $product->price * $quantity;

        $existingCart = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->where('size', $request->size)
            ->first();

        if ($existingCart) {
            $existingCart->quantity += $quantity;
            $existingCart->total_price += $totalPrice;
            $existingCart->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'size' => $request->size,
                'new_price' => $product->new_price,
                'total_price' => $totalPrice,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        $request->validate(['id' => 'required|exists:carts,id']);
        Cart::destroy($request->id);
        return redirect()->route('customer.cart')->with('success', 'Item removed from cart successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($request->id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['success' => true, 'message' => 'Quantity updated successfully!']);
    }


    public function chekout()
    {
        $userId = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')->with('error', 'Your cart is empty.');
        }

        return view('pages.users.checkout', compact('cartItems'));
    }
}
