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


Route::get('/user_list', 'Auth\RegisterController@index');
Route::get('/user_form/{string}', 'Auth\RegisterController@form');
Route::put('/user_action/{id}', 'Auth\RegisterController@update');
Route::delete('/user_action/{id}', 'Auth\RegisterController@destroy');
