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
Route::get('/', 'MainController@index');
Route::post('checklogin', 'MainController@checklogin');
Route::get('home', 'MainController@home');
Route::get('logout', 'MainController@logout');


Route::resource('companies','CompanyController');
Route::resource('companies.create','CompanyController@create');

Route::resource('employees','EmployeesController');
Route::resource('employees.create','EmployeesController@create');

