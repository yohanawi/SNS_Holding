<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'products')->get();

        return view('pages.admin.order', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user', 'products')->find($id);
        return view('pages.admin.order.order_view', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.order.show', $id)
            ->with('success', 'Order status updated successfully');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.order')->with('success', 'Order cancelled successfully.');
    }
}
