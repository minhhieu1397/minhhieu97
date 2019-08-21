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
Route::get('/', 'LoginController@login')->name('users.login');
Route::post('/users/login', 'LoginController@postLogin')->name('users.login.post');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::group(['prefix' => 'admins'], function () {
	Route::get('', 'admin\AdminController@index')->name('admins.index');
	Route::get('create', 'admin\AdminController@create')->name('admins.create');
	Route::post('create', 'admin\AdminController@store')->name('admins.store');
	Route::get('edit', 'HoursController@edit')->name('hours.edit');
	Route::put('edit', 'HoursController@update')->name('hours.update');
	Route::get('view/{user}', 'TimesheetController@adminViewTimesheet')->name('admin.timesheet');
	Route::get('{user}', 'admin\AdminController@show')->name('admins.show');
	Route::get('view/{user}', 'TimesheetController@adminViewTimesheet')->name('admins.timesheet');
	Route::get('{user}/edit', 'admin\AdminController@edit')->name('admins.edit');
	Route::put('{user}/edit', 'admin\AdminController@update')->name('admins.update');
	Route::put('{user}/reset_password', 'admin\AdminController@resetPassword')->name('admins.resetpassword');
});

Route::group(['prefix' => 'users'], function () {
	Route::get('{user}/edit', 'user\UserController@edit')->name('users.edit');
	Route::put('{user}/edit', 'user\UserController@update')->name('users.update');
	Route::get('update_avatar', 'user\UserController@editAvatar')->name('users.edit.avatar');
	Route::post('update_avatar', 'user\UserController@updateAvatar')->name('users.update.avatar');
	Route::get('{user}/edit_password', 'user\UserController@editPassword')->name('users.editpassword');
	Route::put('{user}/edit_password', 'user\UserController@updatePassword')->name('users.updatepassword');
	Route::get('create', 'UserController@adminCreateUser')->name('admin.users.create');
	Route::post('create', 'UserController@adminStoreUser')->name('admin.users.store');
	Route::delete('{user}', 'UserController@destroy')->name('users.destroy');
});

Route::group(['prefix' => 'timesheets'], function () {
	Route::get('/hours/edit', 'HoursController@edit')->name('hours.edit');
	Route::put('/hours/edit', 'HoursController@update')->name('hours.update');
	Route::get('approve', 'TimesheetController@viewApprove')->name('timesheet.approve');
	Route::put('approve/{timesheet}', 'TimesheetController@updateApprove')->name('timesheet.approveUpdate');
	Route::get('view', 'TimesheetController@view')->name('timesheet.view');
	Route::get('view_by_date', 'TimesheetController@viewByDay')->name('timesheet.viewDay');
	Route::get('view_by_month', 'TimesheetController@viewByMonth')->name('timesheet.viewMonth');
	Route::get('', 'TimesheetController@index')->name('timesheets.index');
	Route::get('create', 'TimesheetController@create')->name('timesheets.create');
	Route::post('create', 'TimesheetController@store')->name('timesheets.store');
	Route::get('{timesheet}', 'TimesheetController@show')->name('timesheets.show');
	Route::get('{timesheet}/edit', 'TimesheetController@edit')->name('timesheets.edit');
	Route::put('{timesheet}/edit', 'TimesheetController@update')->name('timesheets.update');
	Route::delete('{timesheet}', 'TimesheetController@destroy')->name('timesheets.destroy');
});

