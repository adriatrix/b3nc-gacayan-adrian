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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/orders', 'OrderController@showOrders');

Route::post('/orders/create', 'OrderController@createOrders');

Route::post('/orders/edit', 'OrderController@editOrder');

Route::get('/orders/search', 'OrderController@searchOrders');

Route::get('/orders/{id}', 'OrderController@showOrder');

Route::get('/orders/tags/{tag}', 'OrderController@showTaggedOrders');

Route::post('/orders/{id}/task', 'TaskController@addTask');

Route::get('/customers', 'CustomerController@showCustomers');

Route::get('/customers/search', 'CustomerController@searchCustomers');

Route::get('/customers/{id}', 'CustomerController@showCustomer');

Route::post('/comments/create', 'CommentController@createComment');

Route::post('/tasks/change_status', 'TaskController@statusTask');
