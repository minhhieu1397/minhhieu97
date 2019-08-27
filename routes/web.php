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

Route::namespace('Email')->group(function () {
	Route::get('email/email_notification', 'EmailController@index')->name('emails.index');
	Route::post('email/create', 'EmailController@store')->name('emails.store');
	Route::get('email/{user}', 'EmailController@show')->name('emails.show');
	Route::delete('email/{email}', 'EmailController@destroy')->name('emails.destroy');
});

Route::namespace('Admin')->group(function () {
	Route::get('/admins/seach', 'AdminController@search')->name('admins.search');
	Route::get('/admins/', 'AdminController@index')->name('admins.index');
	Route::get('/admins/create', 'AdminController@create')->name('admins.create');
	Route::post('/admins/create', 'AdminController@store')->name('admins.store');
	Route::get('/admins/{user}', 'AdminController@show')->name('admins.show');
	Route::get('/admins/{user}/edit', 'AdminController@edit')->name('admins.edit');
	Route::put('/admins/{user}/edit', 'AdminController@update')->name('admins.update');
	Route::put('/admins/{user}/reset_password', 'AdminController@resetPassword')->name('admins.resetpassword');
	Route::delete('admins/{user}', 'AdminController@destroy')->name('admins.destroy');
});

Route::namespace('Notification')->group(function () {
	Route::post('/notification/{user}/create', 'NotificationEmailController@store')->name('notification.store');
	Route::delete('/notification/{userId}/{emailId}', 'NotificationEmailController@destroy')->name('notifications.destroy');
});

Route::namespace('User')->group(function () {
	Route::get('users\edit', 'UserController@edit')->name('users.edit');
	Route::put('users\edit', 'UserController@update')->name('users.update');
	Route::get('users\update_avatar', 'UserController@editAvatar')->name('users.edit.avatar');
	Route::post('users\pdate_avatar', 'UserController@updateAvatar')->name('users.update.avatar');
	Route::get('users\edit_password', 'UserController@editPassword')->name('users.editpassword');
	Route::put('users\edit_password', 'UserController@updatePassword')->name('users.updatepassword');
	Route::get('users\create', 'UserController@adminCreateUser')->name('admin.users.create');
	Route::post('users\create', 'UserController@adminStoreUser')->name('admin.users.store');
});

Route::group(['prefix' => 'admins'], function () {
	Route::get('/hours/edit', 'HoursController@edit')->name('hours.edit');
	Route::put('/hours/edit', 'HoursController@update')->name('hours.update');
});

Route::group(['prefix' => 'timesheets'], function () {
	Route::get('/admins/view/{user}', 'TimesheetController@adminViewTimesheet')->name('admins.timesheet');
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