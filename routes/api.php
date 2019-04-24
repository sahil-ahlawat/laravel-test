<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('/product/create', 'ProductController@create_product');
	Route::get('/product/edit', 'ProductController@update_product');
	Route::get('/product/delete', 'ProductController@delete_product');
	Route::get('/product/list', 'ProductController@get_product_list');
	Route::get('/product/get', 'ProductController@get_product');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});
	
	
