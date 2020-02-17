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
Route::get('/','HomeController@index');













//backend site..........................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');


//Category related route
Route::resource('/category','CategoryController');
Route::get('/active-category/{category_id}','CategoryController@active_category')->name('active-category');
Route::get('/unactive-category/{category_id}','CategoryController@unactive_category')->name('unactive-category');
