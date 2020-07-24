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

Route::get('/', 'PageController@welcome');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/admin', 'AdminController@index');

Route::get('/search', 'SearchController@search');
Route::get('/equipment', 'SearchController@equipment');
Route::get('/package', 'SearchController@package');
Route::get('/component', 'SearchController@component');
Route::get('/lease', 'SearchController@lease');

Route::get('/select', 'BrandsController@select');

Route::resource('brands', 'BrandsController');
Route::resource('models', 'ModelsController');
Route::resource('packages', 'PackagesController');
Route::resource('engines', 'EnginesController');
Route::resource('components', 'ComponentsController');


Auth::routes();
