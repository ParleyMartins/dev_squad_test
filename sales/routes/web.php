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

Route::get('/', 'ProductController@index')->middleware('auth');

Auth::routes();

Route::middleware(['auth'])->group(function (){
	Route::resource('products', 'ProductController',  ['except' => ['show']]);
	Route::post('products/import', 'ProductController@import')->name('products.import');
	Route::get('products/import', 'ProductController@viewImport')->name('products.viewImport');
	Route::get('/categories/', 'CategoryController@index')->name('categories.index');
	Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
});
