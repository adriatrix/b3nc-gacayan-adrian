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

Route::get('/orders/{id}', 'OrderController@showOrder');

Route::post('/orders/{id}/task', 'TaskController@addTask');


Route::get('/tasks', 'TaskController@showTasks');

Route::post('/tasks/change_status', 'TaskController@statusTask');
