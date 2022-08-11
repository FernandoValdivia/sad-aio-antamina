<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecursosController extends Controller
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

        $recursos = \DB::table('recursos')->select(
            'distrito',
            'anio',
            'valor'
        )
        ->where('distrito', 'Total')
        ->get();

        $acumulado = \DB::table('recurso_acumulado')->select(
            'distrito',
            '1996_2021',
            '2022_2036'
        )
        ->where('distrito', 'Total')
        ->get();

        $promedio = \DB::table('recurso_promedio')->select(
            'distrito',
            '1996_2021',
            '2022_2036'
        )
        ->where('distrito', 'Total')
        ->get();
        
        return view('recursos', 
            compact('ugt_valle',
                    'ugt_huall',
                    'ugt_mina',
                    'ugt_huarmey',
                    'recursos',
                    'acumulado',
                    'promedio'
                ));
    }
}
