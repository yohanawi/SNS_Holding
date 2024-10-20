<?php

namespace App\Http\Controllers;

use App\Models\Products;

abstract class Controller
{
    public function index()
    {

        $products = Products::all();
        return view('welcome', compact('products'));
    }
}
