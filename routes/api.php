<?php

use Illuminate\Http\Request;

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

Route::get('movie/{idPelicula}', 'PeliculaController@findMovie');
Route::get('gender/{idGenero}', 'GeneroController@findGender');
Route::get('actors', 'ServiceController@getActors');
Route::get('pelicula/{idPelicula}', 'ServiceController@getMovies');

Route::get('actores', 'ActorController@indexVue');
Route::post('actores', 'ActorController@storeVue');