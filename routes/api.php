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
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');
Route::get('/appConfig', 'Api\AppController@getAppConfig');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('/prepareOrder', 'Api\OrderController@prepareOrder');
	Route::get('/products', 'Api\ProductController@getProducts');
	Route::post('/orders', 'Api\OrderController@createOrder');
	Route::get('/orders/{id}', 'Api\OrderController@getOrder');
	Route::get('/transactions', 'Api\TransactionController@getTransactions');
	Route::post('/getChecksum', 'Api\OrderController@generateCheckSum');
	Route::post('/transactionStatus', 'Api\OrderController@checkTransactionStatus');
});
