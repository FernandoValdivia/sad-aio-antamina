<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

ini_set('max_execution_time', 180);

class ResumenController extends Controller
{
    public function index()
    {
        $ugt_valle = \DB::table('distritos')->select(
            'indice',
            'ugt',
            'distrito',
            'coords'
        )
        ->where('ugt','UGT Valle Fortaleza')
        ->get();

        $ugt_huall = \DB::table('distritos')->select(
            'indice',
            'ugt',
            'distrito',
            'latitud',
            'longitud',
            'coords'
        )
        ->where('ugt','UGT Huallanca')
        ->get();

        $ugt_mina = \DB::table('distritos')->select(
            'indice',
            'ugt',
            'distrito',
            'coords'
        )
        ->where('ugt','UGT Mina / San Marcos')
        ->get();

        $ugt_huarmey = \DB::table('distritos')->select(
            'indice',
            'ugt',
            'distrito',
            'coords'
        )
        ->where('ugt','UGT Huarmey')
        ->get();

        $proyectos = \DB::table('proyectos')->select(
            'departamento',
            'provincia',
            'distrito',
            'ugt',
            'codigo_unico',
            'producto_proyecto',
            'time_frame',
            'entidad',
            'tipo_de_inversion',
            'monto_actualizado',
            'latitud',
            'longitud',
            'anio',
            'factores',
            '_42021',
            'c42021',
            '_22022',
            'c22022',
            '_32022',
            'c32022'
        )
        ->get();

        $idh = \DB::table('idh')->select(
            'distrito',
            'idh',
            'ingreso_per_capita',
            'anio'
        )
        ->get();

        $canon = \DB::table('canon')->select(
            'distrito',
            'monto',
            'anio'
        )
        ->get();

        $inversion = \DB::table('inversion_social')->select(
            'distrito',
            'monto',
            'anio'
        )
        ->get();

        $potencialidades = \DB::table('potencialidades')->select(
            'distrito',
            'potencialidad',
            'url'
        )
        ->get();

        return view('resumen', 
            compact('proyectos',
                    'ugt_valle',
                    'ugt_huall',
                    'ugt_mina',
                    'ugt_huarmey',
                    'idh',
                    'canon',
                    'inversion',
                    'potencialidades'
                ));
    }
}
