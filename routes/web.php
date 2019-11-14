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
Route::get('cart','DashboardController@cart')->name('cart');
Route::get('product/details','DashboardController@product_details')->name('product.details');
Route::get('shop','DashboardController@shop')->name('shop');
Route::get('checkout','DashboardController@checkout')->name('checkout');


Route::get('/logout','Auth\LoginController@logout')->name('logout');
//::get('/home', 'HomeController@index')->name('home');
