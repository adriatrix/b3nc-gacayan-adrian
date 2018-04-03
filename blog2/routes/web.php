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


Route::get('/articles', 'ArticleController@showArticles');

Route::get('/profile/{id}', 'ArticleController@showProfile');

Route::post('/articles/create', 'ArticleController@create');

Route::get('/articles/{id}', 'ArticleController@show');

Route::delete('/articles/{id}/delete', 'ArticleController@delete');

Route::post('/articles/{id}/edit', 'ArticleController@edit');

Route::post('/articles/{id}/comment', 'CommentController@addComment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
