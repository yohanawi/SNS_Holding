<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BestSellerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatgoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');
Route::get('/customer/dashboard', [CustomerController::class, 'index'])->middleware(['auth', 'customer']);


Route::get('/customer/cart', [CartController::class, 'index'])->name('customer.cart');
Route::get('/customer/best-seller', [BestSellerController::class, 'index'])->name('customer.best_seller');
Route::get('/customer/shop', [ShopController::class, 'index'])->name('customer.shop');


Route::prefix('admin/product')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/create', [ProductController::class, 'store'])->name('admin.product.create');
    Route::get('/show', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
});

Route::prefix('admin/category')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.create');
    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::post('/store', [CategoryController::class, 'create'])->name('admin.subcategory.store');
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.subcategory.destroy');
});


Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order');
Route::get('/admin/order/show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
Route::put('/admin/order/update/{id}', [OrderController::class, 'update'])->name('admin.order.update');
Route::delete('/admin/order/delete/{id}', [OrderController::class, 'delete'])->name('admin.order.delete');
