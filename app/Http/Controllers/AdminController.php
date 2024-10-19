<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = Products::count();
        $orderCount = Order::count();

        $completedOrdersCount = Order::where('status', 'completed')->count();

        return view('admin_dashboard', compact('productCount', 'orderCount', 'completedOrdersCount'));
    }
}
