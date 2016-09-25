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

Route::get('/vehicles', 'VehiclesController@index');
Route::get('/vehicles/{id}', 'VehiclesController@show');
Route::post('/vehicles/{id}/departure/add', 'VehiclesController@addDeparture');
Route::post('/vehicles/{id}/departures/get', 'VehiclesController@getDepartures');
Route::get('/vehicles/{id}/departures/{from}/{to}', 'VehiclesController@showDepartures');
Route::post('/vehicles/{id}/refueling/add', 'VehiclesController@addRefueling');

Route::get('/announcments', 'AnnouncmentsController@index');
Route::get('/announcments/delete/{id}', 'AnnouncmentsController@delete');
Route::post('/announcments/create', 'AnnouncmentsController@create');

Route::get('/admin', 'Admin\DashboardController@index');
Route::get('/admin/users', 'Admin\UsersController@index');
Route::get('/admin/users/update/{id}', 'Admin\UsersController@updateForm');
Route::post('/admin/users/update', 'Admin\UsersController@update');
Route::get('/admin/users/delete/{id}', 'Admin\UsersController@delete');

Route::get('/admin/roles', 'Admin\RolesController@index');
Route::get('/admin/roles/create', 'Admin\RolesController@create');
Route::get('/admin/roles/update/{id}', 'Admin\RolesController@updateForm');
Route::post('/admin/roles/update', 'Admin\RolesController@update');
Route::get('/admin/roles/delete/{id}', 'Admin\RolesController@delete');

Route::get('/admin/vehicles', 'Admin\VehiclesController@index');
Route::get('/admin/vehicles/create', 'Admin\VehiclesController@create');
Route::get('/admin/vehicles/update/{id}', 'Admin\VehiclesController@updateForm');
Route::post('/admin/vehicles/update', 'Admin\VehiclesController@update');
Route::get('/admin/vehicles/delete/{id}', 'Admin\VehiclesController@delete');