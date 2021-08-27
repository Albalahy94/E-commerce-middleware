<?php

use App\Http\Controllers\AdminController;
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


    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'show'])->name('Admin.dashboard');
        Auth::routes();

        Route::get('/login', [AdminController::class, 'home'])->name('Admin.login');
        Route::post('/login', [AdminController::class, 'login'])->name('Admin.login');
        Route::get('/logout', [AdminController::class, 'logout'])->name('Admin.logout');
        // Route::get('/', [AdminController::class, 'show']);
        Route::get('/dashboard', [AdminController::class, 'show'])->name('Admin.dashboard');



        // Members roles

        Route::get('/add-member', [App\Http\Controllers\AdminController::class, 'addMember'])->name('admin.add-member');
        Route::post('/store-member', [App\Http\Controllers\AdminController::class, 'storeMember'])->name('admin.store-member');
        Route::get('/all-members', [App\Http\Controllers\AdminController::class, 'allMembers'])->name('admin.all-members');
        // Route::get('/show-member{product_id}', [App\Http\Controllers\AdminController::class, 'showMember'])->name('admin.show-member');
        Route::get('/edit-member{member_id}', [App\Http\Controllers\AdminController::class, 'editMember'])->name('admin.edit-member');
        Route::post('/update-member{member_id}', [App\Http\Controllers\AdminController::class, 'UpdateMember'])->name('admin.update-member');
        Route::get('/delete-member{member_id}', [App\Http\Controllers\AdminController::class, 'deleteMember'])->name('admin-delete-member');

        // Pending Members 

        Route::get('/edit-pending-member{member_id}', [App\Http\Controllers\AdminController::class, 'editPendingMember'])->name('admin.edit-pending-member');
        Route::post('/update-pending-member{member_id}', [App\Http\Controllers\AdminController::class, 'UpdatePendingMember'])->name('admin.update-pending-member');



        // products roles

        Route::get('/add-product', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('admin.add-product');
        Route::post('/store-product', [App\Http\Controllers\AdminController::class, 'storeProduct'])->name('admin.store-product');
        Route::get('/all-products', [App\Http\Controllers\AdminController::class, 'allProducts'])->name('admin.all-products');
        Route::get('/show-product{product_id}', [App\Http\Controllers\AdminController::class, 'showProduct'])->name('admin.show-product');
        Route::get('/edit-product{product_id}', [App\Http\Controllers\AdminController::class, 'editProduct'])->name('admin.edit-product');
        Route::post('/update-product{product_id}', [App\Http\Controllers\AdminController::class, 'UpdateProduct'])->name('admin.update-product');
        Route::get('/delete-product{product_id}', [App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('admin.delete-product');


        // Orders roles

        Route::get('/add-order', [App\Http\Controllers\AdminController::class, 'addOrder'])->name('admin.add-order');
        Route::post('/store-order', [App\Http\Controllers\AdminController::class, 'storeOrder'])->name('admin.store-order');
        Route::get('/all-orders', [App\Http\Controllers\AdminController::class, 'allOrders'])->name('admin.all-orders');
        Route::get('/show-order{order_id}', [App\Http\Controllers\AdminController::class, 'showOrder'])->name('admin.show-order');
        Route::get('/edit-order{order_id}', [App\Http\Controllers\AdminController::class, 'editOrder'])->name('admin.edit-order');
        Route::post('/update-order{order_id}', [App\Http\Controllers\AdminController::class, 'UpdateOrder'])->name('admin.update-order');
        Route::get('/delete-order{order_id}', [App\Http\Controllers\AdminController::class, 'deleteOrder'])->name('admin.delete-order');
    });
    // Route::get('/admin', function () {
    //     return 'hi admin'; 
    // })->middleware('auth:admin');
    // , 'middleware' => 'auth:admin'


    // Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

});