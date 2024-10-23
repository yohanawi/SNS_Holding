<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('pages.admin.products', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'category' => 'required|string',
            'product_details' => 'nullable|string',
            'image01' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image02' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image03' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $imagePaths = [];
        if ($request->hasFile('image01')) {
            $imagePaths['image01'] = $request->file('image01')->store('images', 'public');
        }
        if ($request->hasFile('image02')) {
            $imagePaths['image02'] = $request->file('image02')->store('images', 'public');
        }
        if ($request->hasFile('image03')) {
            $imagePaths['image03'] = $request->file('image03')->store('images', 'public');
        }

        $sizes = $request->input('sizes', []);
        $quantities = [];
        foreach ($sizes as $size) {
            $quantities["quantity_$size"] = $request->input("quantity_$size");
        }

        Products::create([
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'category' => $request->input('category'),
            'product_details' => $request->input('product_details'),
            'sizes' => json_encode($sizes),
            'quantity_S' => $quantities['quantity_S'] ?? null,
            'quantity_M' => $quantities['quantity_M'] ?? null,
            'quantity_L' => $quantities['quantity_L'] ?? null,
            'quantity_XL' => $quantities['quantity_XL'] ?? null,
            'quantity_XXL' => $quantities['quantity_XXL'] ?? null,
            'image01' => $imagePaths['image01'] ?? null,
            'image02' => $imagePaths['image02'] ?? null,
            'image03' => $imagePaths['image03'] ?? null,

        ]);

        return redirect()->route('admin.product')->with('success', 'Product added successfully!');
    }

    public function show()
    {
        $products = Products::all();
        return view('pages.admin.product.show_products', compact('products'));
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $sizes = json_decode($product->sizes, true);

        $quantities = [];
        foreach ($sizes as $size) {
            $quantities["quantity_$size"] = $product->{"quantity_$size"};
        }

        return view('pages.admin.product.edit_product', compact('product', 'quantities'));
    }
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'product_details' => 'nullable|string',
            'image01' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image02' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image03' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('image01')) {
            $imagePaths['image01'] = $request->file('image01')->store('images', 'public');
        }
        if ($request->hasFile('image02')) {
            $imagePaths['image02'] = $request->file('image02')->store('images', 'public');
        }
        if ($request->hasFile('image03')) {
            $imagePaths['image03'] = $request->file('image03')->store('images', 'public');
        }

        $sizes = $request->input('sizes', []);
        $quantities = [];
        foreach ($sizes as $size) {
            $quantities["quantity_$size"] = $request->input("quantity_$size");
        }

        $product->update([
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'product_details' => $request->input('product_details'),
            'sizes' => json_encode($sizes),
            'quantity_S' => $quantities['quantity_S'] ?? null,
            'quantity_M' => $quantities['quantity_M'] ?? null,
            'quantity_L' => $quantities['quantity_L'] ?? null,
            'quantity_XL' => $quantities['quantity_XL'] ?? null,
            'quantity_XXL' => $quantities['quantity_XXL'] ?? null,
            'image01' => $imagePaths['image01'] ?? $product->image01,
            'image02' => $imagePaths['image02'] ?? $product->image02,
            'image03' => $imagePaths['image03'] ?? $product->image03,
        ]);

        return redirect()->route('admin.product')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.show')->with('success', 'Product deleted successfully!');
    }

    public function quickView($id)
    {
        $product = Products::findOrFail($id);

        return view('pages.users.quick_view', compact('product'));
    }

    public function checkStock($id, $size)
    {
        $product = Products::findOrFail($id);
        $sizeColumn = match ($size) {
            'S' => 'quantity_S',
            'M' => 'quantity_M',
            'L' => 'quantity_L',
            'XL' => 'quantity_XL',
            'XXL' => 'quantity_XXL',
            default => null,
        };

        if ($sizeColumn && isset($product->$sizeColumn)) {
            $stock = $product->$sizeColumn;
            return response()->json([
                'stock' => $stock,
                'message' => $stock > 0 ? 'In Stock' : 'Out of Stock',
            ]);
        }

        return response()->json(['message' => 'Invalid Size'], 400);
    }
}
