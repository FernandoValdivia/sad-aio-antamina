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
Route::post('/resumen','ResumenController@index');
//brechas
Route::get('/brechas', 'BrechasController@index');
Route::post('/brechas', 'BrechasController@index');
//climasocial
Route::get('/climasocial', 'BrechasController@clima');
//proyectos
Route::get('/proyectos', 'ProyectosController@index');
Route::post('/proyectos', 'ProyectosController@index');
//recursos
Route::get('/recursos', 'RecursosController@index');
//potencialidades
Route::get('/potencialidades', 'PotencialidadesController@index');