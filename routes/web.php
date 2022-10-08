<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BotManController;

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
Route::get('/404', function () {
    return view('404');
});
//http 404
Route::get('/trimestral', function () {
    return view('trimestral');
});

//descargar
/* PDF 1 */
Route::get('/descargar-pdf1', function() {
    $file = public_path()."/file/reporte1.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 2T 2022.pdf", $headers);
});
/* PDF 1.2 */
Route::get('/descargar-pdf2', function() {
    $file = public_path()."/file/reporte1.2.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "EC Monitoreo de KPIs y Vacunación - Reporte 2T 2022.pdf", $headers);
});
/* Excel 1 */
Route::get('/descargar-excel1', function() {
    $file = public_path()."/file/excel1.xlsx";
    
    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 2T 2022.xlsx", $headers);
});
/* Excel Recursos */
Route::get('/descargar-recursos', function() {
    $file = public_path()."/file/excel-recursos.xlsx";
    
    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Evolución de recursos para el desarrollo.xlsx", $headers);
});
/* Excel Brechas */
Route::get('/descargar-brechas', function() {
    $file = public_path()."/file/excel-brechas.xlsx";

    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Brechas en el AIO: Por Pilares.xlsx", $headers);
});
/* Excel Proyectos */
Route::get('/descargar-proyectos', function() {
    $file = public_path()."/file/excel-proyectos.xlsx";

    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Proyectos y o intervenciones en el AIO.xlsx", $headers);
});

//Bot
Route::get('/botman',[BotManController::class,"handle"]);

Route::post('/botman',[BotManController::class,"handle"]);