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

//Home
Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

//Genres
Route::get('/kids', ['as' => 'kids', 'uses' => 'HomeController@kids']);
Route::get('/beletrie', ['as' => 'beletry', 'uses' => 'HomeController@beletrie']);
Route::get('/detective', ['as' => 'detective', 'uses' => 'HomeController@detective']);
Route::get('/fantasy', ['as' => 'fantasy', 'uses' => 'HomeController@fantasy']);
Route::get('/edu', ['as' => 'edu', 'uses' => 'HomeController@edu']);
Route::get('/other', ['as' => 'other', 'uses' => 'HomeController@other']);

//Book
Route::get('/book/{book}', ['as' => 'singlebook', 'uses' => 'BooksController@show']);
Route::get('/book/cart/{book}', ['as' => 'bookadd', 'uses' => 'ShoppingcartController@store']);

//Shopping cart
Route::get('/shoppingcart/show', ['as' => 'shoppingcartshow', 'uses' => 'ShoppingcartController@show']);
Route::delete('/shoppingcart/delete/{book}', ['as' => 'shoppingcartdelete', 'uses' => 'ShoppingcartController@destroy']);

//Order
Route::get('/order/create', ['as' => 'ordercreate', 'uses' => 'OrderController@create']);
Route::post('/order/store', ['as' => 'orderstore', 'uses' => 'OrderController@store']);
Route::get('/order/show/{order}', ['as' => 'ordershow', 'uses' => 'OrderController@show']);
Route::post('/order/confirm', ['as' => 'orderconfirm', 'uses' => 'OrderController@confirm']);
Route::get('/orders', ['as' => 'orders', 'uses' => 'OrderController@index']);
Route::post('/order/updatecount', ['as' => 'updatecount', 'uses' => 'OrderController@updateCount']);

//Admin books
Route::get('/admin/books', ['as' => 'adminbooks', 'uses' => 'AdminController@books']);
Route::get('/admin/book/detail/{book}', ['as' => 'adminbook', 'uses' => 'AdminController@bookDetail']);
Route::delete('/admin/book/delete/{book}', ['as' => 'adminbookdelete', 'uses' => 'AdminController@bookDelete']);
Route::patch('/admin/book/edit/{book}', ['as' => 'adminbookedit', 'uses' => 'AdminController@bookEdit']);
Route::get('/admin/book/create', ['as' => 'adminbookcreate', 'uses' => 'AdminController@bookCreate']);
Route::post('/admin/book/store', ['as' => 'adminbookstore', 'uses' => 'AdminController@bookStore']);

//Admin orders
Route::get('/admin/orders', ['as' => 'adminorders', 'uses' => 'AdminController@orders']);
Route::delete('admin/order/delete/{order}', ['as' => 'adminorderdelete', 'uses' => 'AdminController@orderDelete']);
Route::post('admin/order/status/{order}', ['as' => 'adminorderstatus', 'uses' => 'AdminController@orderStatus']);

//Facebook login
Route::get('/login/facebook', ['as' => 'facebooklogin', 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('/login/facebook/callback', ['as' => 'facebookcallback', 'uses' => 'Auth\LoginController@handleProviderCallback']);

//Privacy
Route::get('/privacy', ['as' => 'privacy', 'uses' => 'HomeController@privacy']);

//Wishlist
Route::get('/wishlist/show', ['as' => 'wishlistshow', 'uses' => 'WishlistController@show']);
Route::delete('/wishlist/delete/{book}', ['as' => 'wishlistdelete', 'uses' => 'WishlistController@destroy']);
Route::get('/book/wishlist/{book}', ['as' => 'bookaddwishlist', 'uses' => 'WishlistController@store']);


//Authentification
Auth::routes();

