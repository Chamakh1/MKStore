<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController; 
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\CartsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();



//guest routes
Route::get('/', [App\Http\Controllers\GuestController::class, 'home'])->name('guest.home');
Route::get('/product/detail/{id}', [App\Http\Controllers\GuestController::class, 'detailProduct'])->name('guest.product.detail');
Route::get('/shop', [App\Http\Controllers\GuestController::class, 'shop'])->name('guest.shop');
Route::get('/product/{category}/list', [App\Http\Controllers\GuestController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\GuestController::class, 'contact'])->name('guest.contact');
Route::get('/about', [App\Http\Controllers\GuestController::class, 'about'])->name('guest.about');
Route::post('/product/search', [App\Http\Controllers\GuestController::class, 'search'])->name('guest.search');
Route::post('/panier/add', [App\Http\Controllers\CartsController::class, 'AddProduct'])->name('cart.add');
Route::get('/panier', [App\Http\Controllers\CartsController::class, 'AffichePanier'])->name('cart.show');
Route::post('/panier/{productId}', [CartsController::class, 'RemoveProduct'])->name('panier.remove');
Route::get('/checkout', [App\Http\Controllers\OrdersController::class, 'index'])->name('checkout.index');
Route::post('/checkout/store', [App\Http\Controllers\OrdersController::class, 'store'])->name('checkout.store');
Route::post('/contact/submit', [App\Http\Controllers\GuestController::class, 'SubmitContact'])->name('guest.contact.submit');


// Admin routes
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware('admin','auth');
Route::get('/admin/profil', [App\Http\Controllers\AdminController::class, 'profile'])->middleware('admin','auth');
Route::post('/admin/update-profile', [App\Http\Controllers\AdminController::class, 'updateProfile'])->middleware('admin','auth');

// Category routes
Route::get('/admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('admin','auth');
Route::post('/admin/categories/create', [App\Http\Controllers\CategoryController::class, 'createCategory'])->middleware('auth');
Route::post('/admin/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->middleware('admin','auth');
Route::post('/admin/categories/update', [App\Http\Controllers\CategoryController::class, 'updateCategory'])->middleware('admin','auth');

// Product routes
Route::get('/admin/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware('auth', 'admin');
Route::post('/admin/products/create', [App\Http\Controllers\ProductController::class, 'createProduct'])->middleware('auth', 'admin');
Route::post('/admin/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->middleware('admin','auth');
Route::post('/admin/product/update', [App\Http\Controllers\ProductController::class, 'updateProduct'])->middleware('admin','auth');

//Orders routes
Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth', 'admin');
Route::patch('/admin/orders/{order}/update-status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');
Route::get('/admin/orders/show/{id}', [AdminController::class, 'show'])->name('orders.show')->middleware('auth', 'admin');
Route::post('/admin/orders/delete/{id}', [AdminController::class, 'deleteOrder'])->name('orders.delete')->middleware('auth', 'admin');



// Client routes
Route::get('/client/dashboard', [App\Http\Controllers\ClientController::class, 'dashboard']);
Route::get('/client/profile', [App\Http\Controllers\ClientController::class, 'profile'])->middleware('auth');
Route::post('/client/updateProfile', [App\Http\Controllers\ClientController::class, 'updateProfile'])->middleware('auth')->name('client.update-profile'); ;
