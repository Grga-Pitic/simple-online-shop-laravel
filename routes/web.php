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
    return view('template');
});

Route::get('/product/{id?}', 'Product\ProductController@show')->where('name', '[0-9]+');

Route::post('/cart/send', 'Ajax\CartController@send');

Route::post('/cart/edit', 'Ajax\CartController@edit');
Route::get('/cart/clear', 'Ajax\CartController@clear');

Route::get('/catalog', 'Product\CatalogController@show');

Route::get('/catalog/page', 'Ajax\ProductListController@show');

Route::get('/cart', 'Cart\CartController@show');