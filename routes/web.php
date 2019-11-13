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

Route::get('/', 'Home\HomepageController@show');

Route::get('/product/{id?}', 'Product\ProductController@show')->where('name', '[0-9]+');

Route::get('/cart', 'Cart\CartController@show');

Route::get('/catalog', 'Product\CatalogController@show');

// ajax routes

Route::post('/product/{id}/comment', 'Ajax\CommentController@send');

Route::get('/catalog/page', 'Ajax\ProductListController@show');

Route::post('/cart/quickAdd', 'Ajax\CartController@quickAdd');

Route::post('/cart/edit', 'Ajax\CartController@edit');

Route::post('/cart/remove', 'Ajax\CartController@remove');