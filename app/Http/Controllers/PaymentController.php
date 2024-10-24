<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\Shipping;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function placeorder()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $categories = Category::with('subcategories')->get();
        $shipping = Shipping::where('user_id', auth()->id())->first();

        return view('pages.users.placeorder', compact('categories', 'cartItems', 'shipping'));
    }
}
