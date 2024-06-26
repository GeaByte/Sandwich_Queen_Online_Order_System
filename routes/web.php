<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{cart}', [CartController::class, 'delete'])->name('cart.delete');
Route::put('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');

Route::get('/order', 'App\Http\Controllers\OrderController@index')->name("order.index");
Route::get('/order/{id}', 'App\Http\Controllers\OrderController@detail')->name("order.detail");
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/profile', 'App\Http\Controllers\UserController@index')->name("user.index");
Route::put('/profile', 'App\Http\Controllers\UserController@update')->name("user.update");


Route::middleware('admin')->group(function(){
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");

    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')
        ->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')
        ->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')
        ->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')
        ->name("admin.product.update");
});
Auth::routes();