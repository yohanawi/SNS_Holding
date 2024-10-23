<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $categories = Category::with('subcategories')->get();
        return view('welcome', compact('products', 'categories'));
    }
}
