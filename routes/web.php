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

//
Route::get('/', function () {
    return view('index');
});
//resumen
Route::get('/resumen','ResumenController@index');
//brechas
Route::get('/brechas', 'BrechasController@index');
//proyectos
Route::get('/proyectos', 'ProyectosController@index');
Route::post('/proyectos', 'ProyectosController@index');
//recursos
Route::get('/recursos', function () {
    return view('recursos');
});
//potencialidades
Route::get('/potencialidades', 'PotencialidadesController@index');