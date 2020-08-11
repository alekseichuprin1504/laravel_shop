<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::namespace('Front')->group(function () {
    Route::get('/', 'SiteController@index')->name('home');
    Route::post('/cart/add/{product_id}', 'CartController@cartAdd')->name('cart-add');
    Route::post('/cart/delete/{product_id}', 'CartController@cartDelete')->name('cart-delete');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/cart/checkout', 'CartController@cartCheckout')->name('cart-checkout');
    Route::post('/cart/confirm', 'CartController@cartConfirm')->name('cart-confirm');
    Route::get('/category/{category_name}', 'SiteController@categoryProducts')->name('categoryProducts');
    Route::get('/product/{id}', 'ProductController@view')->name('product');
    Route::get('/cabinet', 'CabinetController@index')->name('cabinet');
    Route::get('/cabinet/orders/{order}', 'CabinetController@show')->name('user-orders');
    Route::post('/search', 'SearchController@search')->name('search');
    Route::get('/rec', 'SiteController@recomendProducts');
});

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin'
],function (){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/products', 'AdminProductController@index')->name('admin-products');
    Route::get('/orders', 'AdminOrderController@index')->name('admin-orders');
    Route::get('/orders/{order}', 'AdminOrderController@show')->name('admin-show-order');
    Route::resource('categories', 'AdminCategoryController');
    Route::resource('products', 'AdminProductController');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::get('/home', 'HomeController@index')->name('home1');
