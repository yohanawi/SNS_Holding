<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('pages.admin.category', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $existingCategory = Category::where('category', $request->input('category'))->first();
        if ($existingCategory) {
            return redirect()->back()->withErrors(['category' => 'This category already exists!'])->withInput();
        }

        $imagePaths = [];
        if ($request->hasFile('image')) {
            $imagePaths['image'] = $request->file('image')->store('images', 'public');
        }

        Category::create([
            'category' => $request->input('category'),
            'image' => $imagePaths['image'] ?? null,
        ]);

        return redirect()->route('admin.category')->with('success', 'Category added successfully!');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category')->with('success', 'Category deleted successfully.');
    }

    public function create(Request $request)
    {
        $request->validate([
            'subcategory' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $existingSubCategory = Subcategory::where('subcategory', $request->input('subcategory'))->first();
        if ($existingSubCategory) {
            return redirect()->back()->withErrors(['subcategory' => 'This subcategory already exists!'])->withInput();
        }

        $path = $request->file('image')->store('subcategories', 'public');

        Subcategory::create([
            'subcategory' => $request->subcategory,
            'image' => $path,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.category')->with('success', 'Subcategory added successfully!');
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        Storage::disk('public')->delete($subcategory->image);
        $subcategory->delete();

        return redirect()->route('admin.category')->with('success', 'Subcategory deleted successfully!');
    }
}
