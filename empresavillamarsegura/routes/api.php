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


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'accion'
], function ($router) {
    Route::get('/tareas','App\Http\Controllers\TareasController@index');
    Route::post('/tareas','App\Http\Controllers\TareasController@store');
    Route::put('/tareas','App\Http\Controllers\TareasController@update');
    Route::delete('/tareas','App\Http\Controllers\TareasController@destroy');
    
    Route::get('/categoria','App\Http\Controllers\CategoriasController@index');
    Route::post('/categoria','App\Http\Controllers\CategoriasController@store');
    Route::put('/categoria','App\Http\Controllers\CategoriasController@update');
    Route::delete('/categoria','App\Http\Controllers\CategoriasController@destroy');
});