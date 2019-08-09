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
Route::get('/user/update_avatar', 'UserController@useredit')->name('users.avatar');
Route::post('/user/update_avatar', 'UserController@upload_avatar')->name('users.update.avatar');
Route::post('file','UserController@upload_avatar');

Route::get('/users/edit_password', 'UserController@employees_edit_password')->name('users.employees.editpassword');
Route::put('/users/edit_password', 'UserController@employees_update_password')->name('users.employees.updatepassword');


Route::get('/users/edit', 'UserController@edit_user')->name('users.edit_user');
Route::put('/users/edit', 'UserController@update_user')->name('users.update_user');
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/create', 'UserController@store')->name('users.store');
Route::get('/user/{user}', 'UserController@show')->name('users.show');
Route::get('/user/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('/user/{user}/edit', 'UserController@update')->name('users.update');
route::get('logout', 'UserController@logout')->name('users.logout');
Route::delete('/user/{user}', 'UserController@destroy')->name('users.destroy');

Route::get('/hours/edit', 'HoursController@edit')->name('hours.edit');
Route::put('/hours/edit', 'HoursController@update')->name('hours.update');

Route::get('/timesheet/approve', 'TimesheetController@view_approve')->name('timesheet.approve');
Route::put('/timesheet/approve/{timesheet}', 'TimesheetController@edit_approve')->name('timesheet.approve_edit');
Route::get('/timesheets/view', 'TimesheetController@view')->name('timesheet.view');
Route::get('/timesheets/view_by_week', 'TimesheetController@view_by_week')->name('timesheet.viewweek');
Route::get('/timesheets/view_by_month', 'TimesheetController@view_by_month')->name('timesheet.viewmonth');


Route::get('/timesheets', 'TimesheetController@index')->name('timesheets.index');
Route::get('/timesheets/create', 'TimesheetController@create')->name('timesheets.create');
Route::post('/timesheets/create', 'TimesheetController@store')->name('timesheets.store');
Route::get('/timesheets/{timesheet}', 'TimesheetController@show')->name('timesheets.show');
Route::get('/timesheets/{timesheet}/edit', 'TimesheetController@edit')->name('timesheets.edit');
Route::put('/timesheets/{timesheet}/edit', 'TimesheetController@update')->name('timesheets.update');

