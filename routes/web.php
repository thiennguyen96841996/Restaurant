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

Route::group(['prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => 'manager']
, function () {
    Route::get('/', 'PagesController@index')->name('manager.home');
    Route::resource('users', 'UsersController');
});

Route::group(['prefix' => 'employee', 'namespace' => 'Employee', 'middleware' => 'employee']
, function () {
    Route::get('/', 'PagesController@index')->name('employee.home');
    Route::resource('vacation', 'VacationController', ['except' => 'show']);
    Route::resource('overtime', 'OvertimeController', ['except' => 'show']);
    Route::resource('attend', 'AttendController', ['only' => ['index', 'store']]);
    Route::resource('profile', 'ProfileController');
});

Route::get('/', 'HomeController@index')->name('home');
