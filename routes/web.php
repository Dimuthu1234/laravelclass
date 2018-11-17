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
Route::model('blog', 'App\BlogCategory');



Route::get('/', function () {
    $blogs = \App\Blog::orderBy('id', 'DESC')->paginate(4);
    return view('welcome')
        ->with('blogs', $blogs);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/blog', 'BlogsController', resourceNames('blog'))->middleware('auth');
Route::resource('/blog-category', 'BlogCategoryController', resourceNames('blog-category'))->middleware('auth');
