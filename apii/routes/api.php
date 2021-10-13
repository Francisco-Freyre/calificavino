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

Route::get('/vinos', 'App\Http\Controllers\New_vinoController@index'); //Mostrar todos los vinos

Route::get('/clientes', 'App\Http\Controllers\ClienteController@index'); //Mostrar todos los Clientes

Route::post('/clientes/registro', 'App\Http\Controllers\ClienteController@store'); //Crear un cliente

Route::post('/clientes/update/{id}', 'App\Http\Controllers\ClienteController@update'); //Editar un cliente un cliente

Route::post('/clientes/login', 'App\Http\Controllers\ClienteController@login'); //Loguear al Usuario

Route::post('/clientes/delete/{id}', 'App\Http\Controllers\ClienteController@destroy'); //Eliminar un cliente