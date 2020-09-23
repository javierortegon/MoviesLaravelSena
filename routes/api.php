<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/newapi', 'MoviesController@index');

Route::post('user/login', 'AuthController@login');

Route::get('user/all', 'AuthController@allUsers')->middleware('auth:api');

Route::post('movies/create', 'MoviesController@store')->middleware('auth:api');

Route::get('movies/show', 'MoviesController@index')->middleware('auth:api');

Route::get('movies/show/{id}', 'MoviesController@show')->middleware('auth:api');

Route::put('movies/update/{id}', 'MoviesController@update');

Route::delete('movies/delete/{id}', 'MoviesController@destroy');



