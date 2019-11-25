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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::get('/home','DashboardController@index')->name('home');
Route::get('/product/details/{id}','DashboardController@product_details')->name('product.details');


Route::get('shop','ShopController@index')->name('shop');
Route::get('/search/{id}','ShopController@index')->name('search_cat');
Route::get('/limit/{id}','ShopController@index')->name('limit');

Route::get('cart','CartController@index')->name('cart');
Route::post('/add/cart/','CartController@store')->name('addcart');
Route::get('/update/cart','Frontend\CartController@updateCart')->name('updateproduct');

Route::get('/logout','Auth\LoginController@logout')->name('logout');
//::get('/home', 'HomeController@index')->name('home');

Route::get('checkout','CheckoutController@index')->name('checkout');
Route::post('/create-order','CheckoutController@store')->name('create-order'); 
