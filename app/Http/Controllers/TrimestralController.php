<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrimestralController extends Controller
{
    public function index()
    {
        $kpisin = \DB::table('kpitrimestral')->select(
            'kpi',
            'trimestre',
            'porcentaje'
        )
        ->where('kpi','kpi-sin')
        ->get();

        $kpicon = \DB::table('kpitrimestral')->select(
            'kpi',
            'trimestre',
            'porcentaje'
        )
        ->where('kpi','kpi-con')
        ->get();

        return view('trimestral',
            compact('kpisin','kpicon'));
    }
}
