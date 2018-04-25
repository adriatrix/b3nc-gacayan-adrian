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

Route::get('/orders/numbersearch', 'OrderController@searchOrders');

Route::get('/orders/search', 'OrderController@searchNumbers');

Route::post('/orders/create', 'OrderController@createOrders');

Route::post('/orders/edit', 'OrderController@editOrder');

Route::get('/orders/{id}', 'OrderController@showOrder');

Route::get('/orders/tags/{tag}', 'OrderController@showTaggedOrders');

Route::post('/orders/task/{id}', 'TaskController@addTaskById');

Route::get('/customers', 'CustomerController@showCustomers');

Route::get('/customers/ordersearch', 'CustomerController@searchOrders');

Route::get('/customers/search', 'CustomerController@searchCustomers');

Route::get('/customers/{id}', 'CustomerController@showCustomer');

Route::post('/comments/create', 'CommentController@createComment');

Route::post('/tasks/add', 'TaskController@addTask');

Route::delete('/tasks/delete', 'TaskController@deleteTask');

Route::post('/tasks/edit', 'TaskController@editTask');

Route::post('/tasks/change_status', 'TaskController@statusTask');

Route::get('/users/{id}', 'UserController@showUser');

Route::get('/profile', 'UserController@showProfile');

Route::post('/users/edit', 'UserController@editUser');

Route::get("/autocomplete",array('as'=>'autocomplete','uses'=> 'HomeController@autocomplete'));
