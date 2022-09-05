<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PotencialidadesController extends Controller
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
            'conclusion'
        )
        ->get();

        return view('potencialidades', compact('proyectos','ugt_valle','ugt_huall','ugt_mina','ugt_huarmey'));
    }
}
