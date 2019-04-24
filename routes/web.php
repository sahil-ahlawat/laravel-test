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

// Route::get('/', function () {
    // return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth:web'], function(){
	Route::get('/product/create', 'ProductController@create_product');
	Route::get('/product/edit', 'ProductController@update_product');
	Route::get('/product/delete', 'ProductController@delete_product');
	Route::get('/product/list', 'ProductController@get_product_list');
	Route::get('/product/get', 'ProductController@get_product');
});

