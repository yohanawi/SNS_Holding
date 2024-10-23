<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('pages.users.shop');
    }

    public function show(Request $request)
    {
        $categories = Category::with('subcategories')->get();
        $products = Products::paginate(50);

        // Check if the request is an AJAX request (for load more)
        if ($request->ajax()) {
            return view('pages.users.partials.product_card', compact('products'))->render();
        }

        return view('pages.users.shop', compact('categories', 'products'));
    }
}
