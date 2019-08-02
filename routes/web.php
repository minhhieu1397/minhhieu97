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

Route::get('/', 'UserController@login')->name('users.login');
Route::post('/users/login', 'UserController@postlogin')->name('users.loginpost');
Route::get('/users', 'UserController@index')->name('users.index');

Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/create', 'UserController@store')->name('users.store');

Route::get('/user/{user}', 'UserController@show')->name('users.show');
Route::get('/user/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/user/{user}/edit', 'UserController@update')->name('users.update');
route::get('logout', 'UserController@logout')->name('users.logout');
Route::delete('/user/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('hours/edit', 'HoursController@edit')->name('hours.edit');
Route::put('hours/edit', 'HoursController@update')->name('hours.update');
