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

Route::get('/', function () {
    return view('index');
});

/* Route::get('/resumen', function () {
    return view('resumen');
}); */

Route::get('/resumen','ResumenController@index');

Route::get('/brechas', function () {
    return view('brechas');
});

Route::get('/proyectos', 'ProyectosController@index');
Route::post('/proyectos', 'ProyectosController@index');

Route::get('/recursos', function () {
    return view('recursos');
});

Route::get('/potencialidades', 'PotencialidadesController@index');