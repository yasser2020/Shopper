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
//frontend-site.......................
Route::get('/','HomeController@index')->name('home');













//backend site..........................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');


//Category related route
Route::resource('/category','CategoryController');
Route::get('/active-category/{category_id}','CategoryController@active_category')->name('active-category');
Route::get('/unactive-category/{category_id}','CategoryController@unactive_category')->name('unactive-category');
Route::get('categories','CategoryController@getCategory')->name('get_categories');

//manufacture related route
Route::resource('/manufacture','ManufactureController');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture')->name('active-manufacture');
Route::get('/unactive-manufacture/{manufacture_id}','ManufactureController@unactive_manufacture')->name('unactive-manufacture');
Route::get('manufactures','ManufactureController@getManufacture')->name('get_manufactures');


//product relate route

route::resource('/product','ProductController');
Route::get('/active-product/{product_id}','ProductController@active_product')->name('active-product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product')->name('unactive-product');
Route::get('products','ProductController@getProduct')->name('get_products');