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
Route::get('/movies/create', 'App\Http\Controllers\MovieController@create');

//Store new movie
Route::post('/movies', 'App\Http\Controllers\MovieController@store');

//Edit movie
Route::get('/movies/{movie}/edit', 'App\Http\Controllers\MovieController@edit');

//Submit edit
Route::put('/movies/{movie}', 'App\Http\Controllers\MovieController@update');

//Single movie
Route::get('/movies/{movie}', 'App\Http\Controllers\MovieController@show'); 

