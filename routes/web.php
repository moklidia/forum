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
Route::resource('/groups', 'GroupsController');
Route::resource('/students', 'StudentsController');
Route::resource('/subjects', 'SubjectsController');
Route::resource('/results', 'ResultsController');

Route::get('threads', 'ThreadsController@index');
Route::get('threads/create', 'ThreadsController@create');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::post('threads', 'ThreadsController@store');
Route::get('threads/{channel}', 'ThreadsController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');
Route::delete('/replies/{reply}/favorites', 'FavoritesController@destroy');
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::post('/profiles/{user}', 'ProfilesController@update');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@storeComments');
Route::post('/posts/{post}/{comment}/nestedcomments', 'CommentsController@storeNestedComments');

