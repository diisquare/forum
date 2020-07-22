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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/posts/{id}','PostsController@index')->name('posts.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{title}','SectionsController@index')->name('sections.index');
Route::get('/articles/{id}', 'ArticlesController@index')->name('articles.index');

Route::get('/users/{id}','UsersController@index')->name('user.index');
