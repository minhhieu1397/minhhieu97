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
Route::get('/', 'LoginController@login')->name('timesheet.login');
Route::post('/users/login', 'LoginController@postLogin')->name('users.login.post');

Route::group(['namespace' => 'Admin', 'middleware' => 'admins'], function () {
	Route::post('admins/notification/{user}/create', 'NotificationEmailController@store')->name('notification.store');
	Route::delete('admins/notification/{userId}/{emailId}', 'NotificationEmailController@destroy')->name('notifications.destroy');
	Route::get('admins/email/email_notification', 'EmailController@index')->name('emails.index');
	Route::post('admins/email/create', 'EmailController@store')->name('emails.store');
	Route::get('admins/email/{user}', 'EmailController@show')->name('emails.show');
	Route::delete('admins/email/{email}', 'EmailController@destroy')->name('emails.destroy');
	Route::get('/admins/hours/edit', 'HoursController@edit')->name('admins.hours.edit');
	Route::put('/admins/hours/edit', 'HoursController@update')->name('admins.hours.update');
	Route::get('/admins/logout', 'AdminController@logout')->name('admins.logout');
	Route::get('/admins/timesheets/view/{user}', 'TimesheetController@adminViewTimesheet')->name('users.timesheet');
	Route::get('/admins/timesheets/view_by_month/{user}', 'TimesheetController@view_by_month')->name('admin.timesheet.bymonth');
	Route::get('/admins/approve', 'TimesheetController@viewApprove')->name('timesheet.approve');
	Route::put('/admins/approve/{timesheet}', 'TimesheetController@updateApprove')->name('timesheet.approveUpdate');
	Route::get('/admins/', 'AdminController@index')->name('admins.index');
	Route::get('/admins/update_avatar', 'AdminController@editAvatar')->name('admins.avatar');
	Route::post('/admins/update_avatar', 'AdminController@updateAvatar')->name('admins.update.avatar');
	Route::get('/admins/create', 'AdminController@create')->name('admins.create');
	Route::post('/admins/create', 'AdminController@store')->name('admins.store');
	Route::get('/admins/view', 'AdminController@view')->name('admins.view');
	Route::get('/admins/{admin}', 'AdminController@show')->name('admins.show');
	Route::get('/admins/{admin}/edit', 'AdminController@edit')->name('admins.edit');
	Route::put('/admins/{admin}/edit', 'AdminController@update')->name('admins.update');
	Route::delete('admins/{admin}', 'AdminController@destroy')->name('admins.destroy');
	Route::post('/admins/users/create' ,'UserController@store')->name('admins.user.store');
	Route::get('/admins/users/view', 'UserController@view')->name('admins.users.view');
	Route::get('/admins/users/seach', 'UserController@search')->name('admins.users.search');
	Route::get('/admins/users/{user}', 'UserController@show')->name('admins.user.show');
	Route::get('/admins/users/{user}/edit', 'UserController@edit')->name('admin.users.edit');
	Route::put('/admins/users/{user}/edit', 'UserController@update')->name('admin.users.update');
	Route::put('/admins/users/{user}/reset_password', 'UserController@resetPassword')->name('users.resetpassword');
	Route::delete('/admins/users/{user}', 'UserController@destroy')->name('admins.user.destroy');
});
Route::group(['namespace' => 'User', 'middleware' => 'user'], function () {
	Route::get('/users/update_avatar', 'UserController@editAvatar')->name('users.edit.avatar');
	Route::post('/users/pdate_avatar', 'UserController@updateAvatar')->name('users.update.avatar');
	Route::get('/users/edit', 'UserController@edit')->name('users.edit');
	Route::put('/users/edit', 'UserController@update')->name('users.update');
	Route::get('/users/edit_password', 'UserController@editPassword')->name('users.editpassword');
	Route::put('/users/edit_password', 'UserController@updatePassword')->name('users.updatepassword');
	Route::get('/logout', 'UserController@logout')->name('logout');
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

Auth::routes();
