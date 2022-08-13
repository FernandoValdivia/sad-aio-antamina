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

        /** recursos start **/
        $recursos = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Total')
        ->get();

        $aquia = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Aquia (Bolognesi / Áncash)')
        ->get();

        $san_marcos = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'San Marcos (Huari / Áncash)')
        ->get();

        $san_pedro = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'San Pedro de Chaná (Huari / Áncash)')
        ->get();

        $huachis = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Huachis (Huari / Áncash)')
        ->get();

        $chavin = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Chavín de Huántar (Huari / Áncash)')
        ->get();

        $huallanca = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Huallanca (Bolognesi / Áncash)')
        ->get();

        $chiquian = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Chiquián (Bolognesi / Áncash)')
        ->get();

        $catac = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Cátac (Recuay / Áncash)')
        ->get();

        $pampas_chico = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Pampas Chico (Recuay / Áncash)')
        ->get();

        $marca = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Marca (Recuay / Áncash)')
        ->get();

        $cajacay = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Cajacay (Bolognesi / Áncash)')
        ->get();

        $huayllacayan = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Huayllacayán (Bolognesi / Áncash)')
        ->get();

        $antonio = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Antonio Raymondi (Bolognesi / Áncash)')
        ->get();

        $llacllin = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Llacllín (Recuay / Áncash)')
        ->get();

        $colquioc = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Colquioc (Bolognesi / Áncash)')
        ->get();

        $pararin = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Pararín (Recuay / Áncash)')
        ->get();

        $huarmey = \DB::table('recursos')->select(
            'valor'
        )
        ->where('distrito', 'Huarmey (Huarmey / Áncash)')
        ->get();
        
        /** recursos end **/
        
        return view('recursos', 
            compact('ugt_valle',
                    'ugt_huall',
                    'ugt_mina',
                    'ugt_huarmey',
                    'recursos',
                    'aquia',
                    'san_marcos',
                    'san_pedro',
                    'huachis',
                    'chavin',
                    'huallanca',
                    'chiquian',
                    'catac',
                    'pampas_chico',
                    'marca',
                    'cajacay',
                    'huayllacayan',
                    'antonio',
                    'llacllin',
                    'colquioc',
                    'pararin',
                    'huarmey'
                ));
    }
}
