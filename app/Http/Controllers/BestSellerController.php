<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class BestSellerController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('pages.users.best_seller', compact('categories'));
    }
}
