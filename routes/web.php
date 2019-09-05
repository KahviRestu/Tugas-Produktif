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

Route::resource('products','ProductController');

Route::get('stuffs','StuffController@index');
Route::get('stuffs/show/{id}','StuffController@show');
Route::get('stuffs/create','StuffController@create');
Route::post('stuffs/store','StuffController@store');
Route::get('stuffs/delete/{id}','StuffController@delete');
Route::get('stuffs/edit/{id}','StuffController@edit');
Route::post('stuffs/update/{id}','StuffController@update');