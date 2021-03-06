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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/article/{article}/comments', 'CommentController@index');
Route::middleware('auth:api')->post('/comments/{article}', 'CommentController@store');
Route::middleware('auth:api')->put('/comments/{comment}', 'CommentController@update');
Route::middleware('auth:api')->delete('/comments/{comment}', 'CommentController@destroy');

