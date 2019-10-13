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
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('Home');
Route::get('post/{id}', 'PostController@show')->name('post');
Route::group(['middleware' => 'auth'], function() {
    Route::get('create-post', 'PostController@createByUser')->name('create-post');
    Route::post('store-post', 'PostController@storeByUser')->name('store-post');
    Route::resource('users', 'UserController');
    Route::resource('posts', 'PostController');
});
