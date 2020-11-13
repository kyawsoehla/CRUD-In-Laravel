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

// All Posts 
Route::get('/posts', 'PostController@index')->name('posts');

// Create Post
Route::get('/create', 'PostController@create')->name('create');
Route::post('/create', 'PostController@store')->name('store');

// Show Details
Route::get('/posts/show/details/{id}', 'PostController@show')->name('show');

// Edit Post
Route::get('/posts/edit/{id}', 'PostController@edit')->name('edit');
Route::post('/posts/edit/{id}', 'PostController@update')->name('update');

// Delete Post
Route::get('/posts/delete/{id}', 'PostController@destroy')->name('delete');

// Create Category
Route::get('/category', 'CategoryController@create')->name('category');
Route::post('/category', 'CategoryController@store')->name('category_store');

// Edit Category
Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category_edit');
Route::post('/category/edit/{id}', 'CategoryController@update')->name('category_update');

// Delete Category
Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('del');

// Profile
Route::get('/profile/{id}', 'UserController@profile')->name('profile');
