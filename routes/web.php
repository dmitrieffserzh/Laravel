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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
	Route::get('/', 'Admin\AdminController@index')->name('admin.index');



	// Category
	Route::get('/category', 'Admin\CategoryController@index')->name('category.index');
	Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
	Route::post('/category/create', 'Admin\CategoryController@store')->name('category.store');

	//Pages
	Route::resource('pages', 'Admin\PageController');



//	Route::get('/pages', 'Admin\PageController@index')->name('pages.index');
//	Route::get('/pages/create', 'Admin\PageController@create')->name('pages.create');
//	Route::get('/pages/{id}/edit', 'Admin\PageController@edit')->name('pages.edit');
});