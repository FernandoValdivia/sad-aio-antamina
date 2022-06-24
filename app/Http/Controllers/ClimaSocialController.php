<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClimaSocialController extends Controller
{
    public function index()
    {
        $brechas = \DB::table('brechas')->select(
            'variable',
            'distrito',
            'modalidad_de_intervencion',
            'anio',
            'porcentaje'
        )
        ->get();
        
        return view('climasocial',
        compact('brechas'));
    }
}
