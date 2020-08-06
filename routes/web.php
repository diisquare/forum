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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sections/{title}','SectionsController@index')->name('sections.index');

Route::resource('/users','UsersController',['only'=>['index','show']]);

Route::post('/articles/{id}','ArticlesController@update')->name('articles.update');
Route::resource('/articles', 'ArticlesController',['only'=>['create','store','show','edit','update','destroy']]);

Route::post('/posts/{id}','PostsController@update')->name('posts.update');
Route::resource('/posts','PostsController',['only'=>['create','store','show','edit','update','destroy']]);

Route::post('/replies/{id}','RepliesController@update')->name('replies.update');
Route::resource('/replies','RepliesController',['only'=>['store','destroy']]);
