<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/admin', 'Admin\DashboardController@index');
Route::get('/admin/users', 'Admin\UsersController@index');
Route::get('/admin/users/update/{id}', 'Admin\UsersController@updateForm');
Route::post('/admin/users/update', 'Admin\UsersController@update');

Route::get('/admin/roles', 'Admin\RolesController@index');