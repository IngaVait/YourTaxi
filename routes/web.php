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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/index', 'HomeController@index')->name('index.index');

Route::get('/article', 'ArticleController@index')->name('article.index');
Route::post('/article', 'ArticleController@store');
Route::get('/article/create', 'ArticleController@create')->name('article.create');
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
Route::get('/article/{article}/edit', 'ArticleController@edit')->name('article.edit');
Route::put('/article/{article}', 'ArticleController@update');
Route::delete('/article/{article}', 'ArticleController@destroy')->name('article.delete');

Route::get('/user/{user}/article', 'UserController@index')->name('article.author');

Route::get('/admin', 'HomeController@admin')
    ->middleware('is_admin')
    ->name('admin');
