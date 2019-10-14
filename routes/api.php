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
Route::get('test', 'admin\AuthController@test');
Route::post('login', 'admin\AuthController@login');
Route::get('posts', 'admin\PostController@getPosts');
Route::post('posts', 'admin\PostController@postPosts');
Route::get('posts/{id}', 'admin\PostController@getPost');
Route::put('posts/{id}', 'admin\PostController@putPost');
Route::delete('posts/{id}', 'admin\PostController@deletePost');
Route::middleware('auth:api')->group( function () {
    Route::post('logout', 'Api\AuthController@logout');
});
