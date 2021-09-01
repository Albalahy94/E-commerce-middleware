<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Auth::routes();
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
    Route::get('/showproducts{product_id}', [App\Http\Controllers\HomeController::class, 'showProducts'])->name('showproducts');
    Route::post('/add-to-cart{product_id}', [App\Http\Controllers\HomeController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/delete-from-cart{product_id}', [App\Http\Controllers\HomeController::class, 'deleteFromCart'])->name('delete-from-cart');
    Route::get('/cart{id?}', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');

    Route::post('/add-to-orders{product_id}', [App\Http\Controllers\HomeController::class, 'addToOrders'])->name('add-to-orders');
    Route::get('/add-orders', [App\Http\Controllers\HomeController::class, 'AddOrders'])->name('add-orders');


    Route::get('/orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
    Route::get('/finished-orders', [App\Http\Controllers\HomeController::class, 'finishedOrders'])->name('finished_orders');
    Route::get('/editorders', [App\Http\Controllers\HomeController::class, 'editorders'])->name('editorders');
    Route::post('/editorders', [App\Http\Controllers\HomeController::class, 'updateOrders'])->name('updateorders');
    Route::get('/deleteorders', [App\Http\Controllers\HomeController::class, 'deleteorders'])->name('deleteorders');
    Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
    Route::post('/checkout-order', [App\Http\Controllers\HomeController::class, 'cofirmCheckout'])->name('cofirmcheckout');

    Route::get('/login/{service}', [LoginController::class, 'face']);
    Route::get('/login/{service}/callback', [LoginController::class, 'callback']);
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');admin/member/pendingmembers

    Route::get('/category_lab', [App\Http\Controllers\HomeController::class, 'category_lab'])->name('category_lab');
    Route::get('/category_tab', [App\Http\Controllers\HomeController::class, 'category_tab'])->name('category_tab');
    Route::get('/category_acc', [App\Http\Controllers\HomeController::class, 'category_acc'])->name('category_acc');
    Route::get('/pending-members', function () {
        $orders = 0;
        return view('user.pendingmembers', ['orders' => $orders]);
    });


    // [App\Http\Controllers\HomeController::class, 'pendingMembers'])->name('pendingmembers');
});