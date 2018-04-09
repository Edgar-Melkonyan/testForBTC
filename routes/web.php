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

Route::get('/', 'FrontController@index');

Route::get('/filter_products/{module}', 'FrontController@index');

Route::post('/product_view/{id}', 'ProductController@updateViewCount');

Auth::routes();

Route::resource('products', 'ProductController');

Route::get('/module', 'ModuleController@index');

Route::post('/update/modules', 'ModuleController@update');

Route::get('/home', 'HomeController@index')->name('home');

