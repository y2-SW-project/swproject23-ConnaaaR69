<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\User\productController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/admin', adminController::class)->middleware(['auth'])->names('admin');

Route::get('/user/profile', [userController::class, 'profile'])->middleware(['auth'])->name('user.profile');

Route::get('/user/orders', [userController::class, 'orders'])->middleware(['auth'])->name('user.orders');
// Route::resource('/admin/user/remove', userController::class)->names('admin.user');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::resource('/cart', CartController::class)->middleware(['auth'])->names('cart');
Route::post('/checkout', [CartController::class, 'convertToOrder'])->name('order.finalise');


Route::resource('/order', orderController::class)->middleware(['auth'])->names('orders');

Route::resource('/store', productController::class)->names('user.products');
Route::get('/', [HomeController::class, 'index'])->name('static.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('static.contact');
Route::get('/search', [productController::class, 'search'])->name('user.products.search');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
