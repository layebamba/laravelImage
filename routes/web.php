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

Route::get('/','PostsController@index');
Route::get('/create','PostsController@create');
Route::get('/destroy/{id}','PostsController@destroy');
Route::post('/store','PostsController@store');
Route::post('/update','PostsController@update');
Route::get('/edit/{id}','PostsController@edit');

