<?php

use Illuminate\Support\Facades\Route;

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
//Landing page
Route::get('/', 'App\Http\Controllers\MovieController@index');

//Create a new movie
Route::get('/movies/create', 'App\Http\Controllers\MovieController@create')->middleware('auth');

//Store new movie
Route::post('/movies', 'App\Http\Controllers\MovieController@store')->middleware('auth');

//Edit movie
Route::get('/movies/{movie}/edit', 'App\Http\Controllers\MovieController@edit')->middleware('auth');

//Submit edit
Route::put('/movies/{movie}', 'App\Http\Controllers\MovieController@update')->middleware('auth');

//Delete movie
Route::delete('/movies/{movie}', 'App\Http\Controllers\MovieController@destroy')->middleware('auth'); 

//Single movie
Route::get('/movies/{movie}', 'App\Http\Controllers\MovieController@show'); 

//Show register form
Route::get('/register', 'App\Http\Controllers\UserController@register')->middleware('guest');

//Store new user
Route::post('/users', 'App\Http\Controllers\UserController@store');

//Log out user
Route::post('/logout', 'App\Http\Controllers\UserController@logout')->middleware('auth');

//Show login form
Route::get('/login', 'App\Http\Controllers\UserController@login')->name('login')->middleware('guest');

//Authenticate user
Route::post('/users/authenticate', 'App\Http\Controllers\UserController@authenticate');

//Show user's list of movies
Route::get('/list', 'App\Http\Controllers\ListController@show')->middleware('auth');

//Add movie to list
Route::post('/lists', 'App\Http\Controllers\ListController@add')->middleware('auth');

//Show review form
Route::get('/write/{movie}', 'App\Http\Controllers\ReviewController@write')->middleware('auth');

//Post review
Route::post('/reviews', 'App\Http\Controllers\ReviewController@store')->middleware('auth');