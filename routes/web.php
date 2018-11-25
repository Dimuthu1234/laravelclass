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


Route::model('blog', 'App\Blog');
Route::model('blog-category', 'App\BlogCategory');



Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/blog', 'BlogsController', resourceNames('blog'))->middleware('auth');
Route::resource('/blog-category', 'BlogCategoryController', resourceNames('blog-category'))->middleware('auth');
  
Route::get('/summer','SummernoteController@index');