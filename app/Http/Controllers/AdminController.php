<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = Products::count();
        return view('admin_dashboard', compact('productCount'));
    }
}
