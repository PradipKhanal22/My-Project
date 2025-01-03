<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/contactinfo', [PageController::class, 'contactinfo'])->name('contactinfo');

Route::get('/categoryproduct/{id}', [PageController::class, 'categoryproduct'])->name('categoryproduct');
Route::get('/viewproduct/{id}', [PageController::class, 'viewproduct'])->name(('viewproduct'));
Route::get('/allproduct', [PageController::class, 'product'])->name(('products'));


// Serach
Route::get('/search', [PageController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('mycart', [CartController::class, 'mycart'])->name('mycart');
    Route::delete('cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('checkout/{id}/', [CartController::class, 'checkout'])->name('checkout');

    //orders
    Route::post('orders/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('orders/{id}/storeEsewa', [OrderController::class, 'storeEsewa'])->name('orders.storeEsewa');
});

Route::middleware(['auth', 'isadmin'])->group(function () {
    // Category
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{id}update', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');


    //orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}/{status}/status', [OrderController::class, 'status'])->name('orders.status');



    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
