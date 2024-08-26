<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Route
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin');

// Category
Route::get('/admin/categories', [AdminController::class, 'admin_categories'])->middleware(['auth', 'admin']);

Route::post('/admin/create_category', [AdminController::class, 'create_category'])->middleware(['auth', 'admin']);

Route::get('/admin/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

Route::get('/admin/edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

Route::post('/admin/update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);


// Product
Route::get('/admin/products', [AdminController::class, 'all_products'])->middleware(['auth','admin']);

Route::get('/admin/products/create', [AdminController::class, 'create_product'])->middleware(['auth','admin']);

Route::post('/admin/upload_product', [AdminController::class, 'upload_product'])->middleware(['auth','admin']);

Route::get('/admin/delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth','admin']);

Route::get('/admin/edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth','admin']);

Route::post('/admin/update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth','admin']);

Route::get('/admin/duplicate_product/{id}', [AdminController::class, 'duplicate_product'])->middleware(['auth','admin']);


Route::get('/admin/products', [AdminController::class, 'product_search']);


Route::post('/admin/product/update-status', [ProductController::class, 'updateStatus']);




// For User Product
Route::get('/products/all', [ProductController::class, 'get_all_products']);

Route::get('/product/{id}', [ProductController::class, 'get_product']);





// User
Route::get('/orders', function () {
    return view('orders.orders');
})->name('orders');

Route::get('/shop', function () {
    return view('store.store');
})->name('shop');

Route::get('/flash', function () {
    return view('store.store');
})->name('flash');


Route::get('/wishlist', function () {
    return view('wishlists.wishlist');
})->name('wishlist');

Route::get('/settings', function () {
    return view('settings.settings');
})->name('settings');