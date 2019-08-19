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
Route::post('/users/login', 'UserController@postLogin')->name('users.login.post');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/users/update_avatar', 'UserController@editAvatar')->name('users.edit.avatar');
	Route::post('/users/update_avatar', 'UserController@updateAvatar')->name('users.update.avatar');
	Route::get('/users/edit_password', 'UserController@userEditPassword')->name('users.employees.editpassword');
	Route::put('/users/edit_password', 'UserController@userUpdatePassword')->name('users.employees.updatepassword');
	Route::get('/users/edit', 'UserController@userEdit')->name('users.edit');
	Route::put('/users/edit', 'UserController@userUpdate')->name('users.update');
	Route::get('/users', 'UserController@index')->name('users.index');
	Route::get('/users/create', 'UserController@adminCreateUser')->name('admin.users.create');
	Route::post('/users/create', 'UserController@adminStoreUser')->name('admin.users.store');
	Route::get('/users/{user}', 'UserController@show')->name('users.show');
	Route::get('/users/{user}/edit', 'UserController@adminEdit')->name('admin.users.edit');
	Route::put('/users/{user}/edit', 'UserController@adminUpdate')->name('admin.users.update');
	Route::put('/users/{user}/reset_password', 'UserController@adminResestPassword')->name('admin.user.resetpassword');
	Route::get('logout', 'UserController@logout')->name('users.logout');
	Route::delete('/user/{user}', 'UserController@destroy')->name('users.destroy');
	Route::get('/user/view/{user}', 'TimesheetController@adminViewTimesheet')->name('admin.timesheet.user');
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
});
