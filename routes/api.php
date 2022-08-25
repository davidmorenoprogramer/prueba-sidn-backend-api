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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//Route::post('/user','App\Http\Controllers\UserController@store');
Route::post('/user','App\Http\Controllers\UserController@store');
Route::post('/login','App\Http\Controllers\UserController@login');

Route::get('/peliculas','App\Http\Controllers\PeliculasController@index');//todas las peliculas
Route::post('/peliculas','App\Http\Controllers\PeliculasController@store');//crea peliculas, es decir las peliculas favoritas del usuario.
Route::put('/peliculas/{id}','App\Http\Controllers\PeliculasController@update');//actualiza registro
Route::delete('/peliculas/{id}','App\Http\Controllers\PeliculasController@destroy');//elimina una pelicula favorita del usuario


