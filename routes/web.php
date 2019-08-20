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

Route::get('/admins', 'admin\AdminController@index')->name('admins.index');
Route::get('/admins/create', 'admin\AdminController@create')->name('admins.create');
Route::post('/admins/create', 'admin\AdminController@store')->name('admins.store');
Route::get('/hours/edit', 'HoursController@edit')->name('hours.edit');
Route::put('/hours/edit', 'HoursController@update')->name('hours.update');
Route::get('/user/view/{user}', 'TimesheetController@adminViewTimesheet')->name('admin.timesheet');


Route::get('/admins/{user}', 'admin\AdminController@show')->name('admins.show');
Route::get('/admins/view/{user}', 'TimesheetController@adminViewTimesheet')->name('admins.timesheet');
Route::get('/admins/{user}/edit', 'admin\AdminController@edit')->name('admins.edit');
Route::put('/admins/{user}/edit', 'admin\AdminController@update')->name('admins.update');
Route::put('/admins/{user}/reset_password', 'admin\AdminController@resetPassword')->name('admins.resetpassword');

	Route::get('/users/{user}/edit', 'user\UserController@edit')->name('users.edit');
	Route::put('/users/{user}/edit', 'user\UserController@update')->name('users.update');
	Route::get('/users/update_avatar', 'user\UserController@editAvatar')->name('users.edit.avatar');
	Route::post('/users/update_avatar', 'user\UserController@updateAvatar')->name('users.update.avatar');

	Route::get('/users/edit_password', 'user\UserController@editPassword')->name('users.editpassword');
	Route::put('/users/edit_password', 'user\UserController@updatePassword')->name('users.updatepassword');
	
	/*Route::get('/users', 'UserController@index')->name('users.index');*/
	Route::get('/users/create', 'UserController@adminCreateUser')->name('admin.users.create');
	Route::post('/users/create', 'UserController@adminStoreUser')->name('admin.users.store');
	
	
	
	Route::get('logout', 'user\UserController@logout')->name('users.logout');
	Route::delete('/user/{user}', 'UserController@destroy')->name('users.destroy');
	
	Route::get('/hours/edit', 'HoursController@edit')->name('hours.edit');
	Route::put('/hours/edit', 'HoursController@update')->name('hours.update');
	Route::get('/timesheets/approve', 'TimesheetController@viewApprove')->name('timesheet.approve');
	Route::put('/timesheets/approve/{timesheet}', 'TimesheetController@updateApprove')->name('timesheet.approveUpdate');
	Route::get('/timesheets/view', 'TimesheetController@view')->name('timesheet.view');
	Route::get('/timesheets/view_by_date', 'TimesheetController@viewByDay')->name('timesheet.viewDay');
	Route::get('/timesheets/view_by_month', 'TimesheetController@viewByMonth')->name('timesheet.viewMonth');
	Route::get('/timesheets', 'TimesheetController@index')->name('timesheets.index');
	Route::get('/timesheets/create', 'TimesheetController@create')->name('timesheets.create');
	Route::post('/timesheets/create', 'TimesheetController@store')->name('timesheets.store');
	Route::get('/timesheets/{timesheet}', 'TimesheetController@show')->name('timesheets.show');
	Route::get('/timesheets/{timesheet}/edit', 'TimesheetController@edit')->name('timesheets.edit');
	Route::put('/timesheets/{timesheet}/edit', 'TimesheetController@update')->name('timesheets.update');
	Route::delete('/timesheets/{timesheet}', 'TimesheetController@destroy')->name('timesheets.destroy');

