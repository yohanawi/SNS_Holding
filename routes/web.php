<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BestSellerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

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
Route::get('/customer/shop', [ShopController::class, 'show'])->name('customer.shop');


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

Route::prefix('admin.order')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('admin.order.update');
    Route::delete('/delete/{id}', [OrderController::class, 'delete'])->name('admin.order.delete');
});


Route::get('/admin/message', [MessageController::class, 'index'])->name('admin.message');
Route::get('/admin/messages/reply/{id}', [MessageController::class, 'reply'])->name('admin.messages.reply');
Route::post('/admin/messages/reply/{id}', [MessageController::class, 'sendReply'])->name('admin.messages.sendReply');


Route::get('/product/quick_view/{id}', [ProductController::class, 'quickView'])->name('admin.product.quick_view');
Route::get('/product/stock/{id}/{size}', [ProductController::class, 'checkStock']);


Route::post('/customer/cart/add', [CartController::class, 'addToCart'])->name('customer.cart.addToCart');
Route::post('/customer/cart/update', [CartController::class, 'update'])->name('customer.cart.update');
Route::post('/customer/cart/remove', [CartController::class, 'remove'])->name('customer.cart.remove');

Route::get('/customer/chekout', [CartController::class, 'chekout'])->name('customer.chekout');
// Route::post('/customer/placeOrder', [CartController::class, 'placeOrder'])->name('customer.placeOrder');
Route::post('/customer/checkout/shippingaddress', [ShippingAddressController::class, 'store'])->name('customer.checkout.shipping');
Route::get('/customer/checkout/placeorder', [PaymentController::class, 'placeorder'])->name('customer.checkout.placeorder');


Route::post('/customer/review', [ReviewController::class, 'store'])->name('customer.review.store');
Route::post('/customer/cart/store-total', [CartController::class, 'storeTotal'])->name('customer.cart.storeTotal');
