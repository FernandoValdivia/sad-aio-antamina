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

        $impacto1 = \DB::table('kpiimpacto')->select(
            'fecha',
            'impacto',
            'porcentaje'
        )
        ->where('impacto','impacto-1')
        ->get();

        $impacto2 = \DB::table('kpiimpacto')->select(
            'fecha',
            'impacto',
            'porcentaje'
        )
        ->where('impacto','impacto-2')
        ->get();

        $kpioportunidad = \DB::table('kpioportunidad')->select(
            'fecha',
            'porcentaje'
        )
        ->get();

        $kpiinfra = \DB::table('kpiinfraestructura')->select(
            'fecha',
            'porcentaje'
        )
        ->get();

        $kpiemp = \DB::table('kpiemprendimiento')->select(
            'fecha',
            'porcentaje'
        )
        ->get();

        $kpieme = \DB::table('kpiemergencias')->select(
            'fecha',
            'porcentaje'
        )
        ->get();

        return view('trimestral',
            compact(
                'kpisin',
                'kpicon',
                'impacto1',
                'impacto2',
                'kpioportunidad',
                'kpiinfra',
                'kpiemp',
                'kpieme'
            ));
    }
}
