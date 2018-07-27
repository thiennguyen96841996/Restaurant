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

Auth::routes();

Route::group(array('prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'manager')
, function () {
    Route::get('/', 'PagesController@index')->name('manager.home');
    Route::get('users', "UsersController@index");
    Route::get('users/{id?}/edit', 'UsersController@edit');
    Route::post('users/{id?}/edit', 'UsersController@update');
});

Route::group(array('prefix' => 'employee', 'namespace' => 'Employee', 'middleware' => 'employee')
, function () {
    Route::get('/', 'PagesController@index')->name('employee.home');
});

Route::get('/', 'HomeController@index')->name('home');
