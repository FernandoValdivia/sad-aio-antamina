<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BotManController;

//home
Route::get('/', function () {
    return view('index');
});
//resumen
Route::get('/resumen','ResumenController@index');
Route::post('/resumen','ResumenController@index');
//brechas
Route::get('/brechas', 'BrechasController@index');
Route::post('/brechas', 'BrechasController@index');
//indicadores
Route::get('/reduccion', 'ReduccionController@index');
Route::post('/reduccion', 'ReduccionController@index');
//proyectos
Route::get('/proyectos', 'ProyectosController@index');
Route::post('/proyectos', 'ProyectosController@index');
//recursos
Route::get('/recursos', 'RecursosController@index');
//potencialidades
Route::get('/potencialidades', 'PotencialidadesController@index');
//reporte
Route::get('/reporte', function () {
    return view('reporte');
});
//Errores
/* Route::get('/404', function () {
    return view('404');
}); */

//descargar
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
/* ---------------- REPORTES ---------------- */
/* PDF 2T 2022 */
Route::get('/descargar-pdf22022', function() {
    $file = public_path()."/file/reporte22022.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 2T 2022.pdf", $headers);
});
/* PDF 2T 2022 Antamina */
Route::get('/descargar-pdf22022A', function() {
    $file = public_path()."/file/reporte22022A.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "EC Monitoreo de KPIs y Vacunación - Reporte 2T 2022.pdf", $headers);
});
/* PDF 3T 2022 */
Route::get('/descargar-pdf32022', function() {
    $file = public_path()."/file/reporte32022.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 3T 2022.pdf", $headers);
});
/* PDF 4T 2022 */
Route::get('/descargar-pdf42022', function() {
    $file = public_path()."/file/reporte42022.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 4T 2022.pdf", $headers);
});
/* PDF 1T 2023 */
Route::get('/descargar-pdf12023', function() {
    $file = public_path()."/file/reporte12023.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 1T 2023.pdf", $headers);
});
/* Excel 2T 2022 */
Route::get('/descargar-excel22022', function() {
    $file = public_path()."/file/excel22022.xlsx";
    
    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 2T 2022.xlsx", $headers);
});
/* Excel 3T 2022 */
Route::get('/descargar-excel32022', function() {
    $file = public_path()."/file/excel32022.xlsx";
    
    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 3T 2022.xlsx", $headers);
});
/* Excel 4T 2022 */
Route::get('/descargar-excel42022', function() {
    $file = public_path()."/file/excel42022.xlsx";
    
    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 4T 2022.xlsx", $headers);
});
/* Excel 1T 2023 */
Route::get('/descargar-excel12022', function() {
    $file = public_path()."/file/excel12023.xlsx";
    
    $headers = array(
        'Content-Type: application/vnd.ms-excel',
    );
    return Response::download($file, "Progreso Cierre Brechas AIO - Reporte 1T 2023.xlsx", $headers);
});

//Bot
Route::get('/botman',[BotManController::class,"handle"]);

Route::post('/botman',[BotManController::class,"handle"]);

// Redirección ante rutas inexistentes
Route::any('{catchall}', function () {
    return redirect('/');
})->where('catchall', '(.*)');