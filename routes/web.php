<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClimaSocialController;

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
Route::get('/climasocial', 'ClimaSocialController@index');
/* Route::get('/climasocial', [ClimaSocialController::class, 'index']); */
//proyectos
Route::get('/proyectos', 'ProyectosController@index');
Route::post('/proyectos', 'ProyectosController@index');
//recursos
Route::get('/recursos', 'RecursosController@index');
//potencialidades
Route::get('/potencialidades', 'PotencialidadesController@index');
//trimestral
Route::get('/trimestral', 'TrimestralController@index');