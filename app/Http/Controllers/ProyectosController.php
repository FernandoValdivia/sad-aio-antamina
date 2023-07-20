<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    public function index(Request $request) 
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
            'tipo_de_inversion',
            'monto_actualizado',
            'latitud',
            'longitud',
            'anio',
            'factores',
            'conclusion'
        )
        ->get();

        function queryUnidadTerritorial($unidadt)
        {
            if ($unidadt!='AIO' and 
                $unidadt!='UGT Huallanca' and
                $unidadt!='UGT Mina / San Marcos' and
                $unidadt!='UGT Valle Fortaleza' and 
                $unidadt!='UGT Huarmey') {
                $query = ['distrito' => $unidadt];
                return $query;
            } elseif ($unidadt=='AIO') {
                return null;
            } else {
                $query = ['ugt' => $unidadt];
                return $query;
            }
        }

        function queryTimeFrame($timef)
        {
            if ($timef != 'Todos') {
                return ['time_frame' => $timef];
            } else {
                return null;
            }
        }

        function queryFactor($fact)
        {
            if ($fact != 'Todos') {
                return ['factores' => $fact];
            } else {
                return null;
            }
        }

        function queryModalidad($tipodei)
        {
            if ($tipodei != 'Todas') {
                return ['tipo_de_inversion' => $tipodei];
            } else {
                return null;
            }
        }

        function queryAnio($qanio)
        {
            if ($qanio != 'Todos') {
                return ['_' . $qanio => $qanio];
            } else {
                return null;
            }
        }

        $input_time = $request->input('time_frame');
        $input_location = $request->input('location');
        $input_factores = $request->input('factores');
        $input_modalidad = $request->input('modalidad');
        $input_years = $request->input('years');

        if (isset($input_time) || isset($input_location) || isset($input_factores) || isset($input_modalidad)|| isset($input_years)) {

            $location = $input_location;

            if ($location!='AIO' and 
                $location!='UGT Huallanca' and 
                $location!='UGT Mina / San Marcos' and 
                $location!='UGT Valle Fortaleza' and 
                $location!='UGT Huarmey') {
                $distrito = explode(",",$location);
                $distrito_nom = $distrito[2];
            } elseif($location == 'AIO') {
                $distrito_nom = 'AIO';
            } else {
                $distrito = explode(",",$location);
                $distrito_nom = $distrito[2];
            }

            //distrito
            $timeframe = $_POST['time_frame']; // time frame
            $factor = $_POST['factores']; // factor
            $modalidad = $_POST['modalidad']; // modalidad
            $anio = $_POST['years']; // año

            // Cantidad de Proyectos
            $cant = \DB::table('proyectos')
                    ->where(queryUnidadTerritorial($distrito_nom))
                    ->where(queryTimeFrame($input_time))
                    ->where(queryFactor($input_factores))
                    ->where(queryModalidad($input_modalidad))
                    ->where(queryAnio($input_years))
                    ->count('producto_proyecto');

            // Suma de monto actualizado
            $sum = \DB::table('proyectos')
                    ->where(queryUnidadTerritorial($distrito_nom))
                    ->where(queryTimeFrame($input_time))
                    ->where(queryFactor($input_factores))
                    ->where(queryModalidad($input_modalidad))
                    ->where(queryAnio($input_years))
                    ->sum('monto_actualizado');
            $sum = number_format($sum,0);
            
            //Filtrar pines
            $proyectos = \DB::table('proyectos')->select(
                'departamento',
                'provincia',
                'distrito',
                'ugt',
                'codigo_unico',
                'producto_proyecto',
                'time_frame',
                'tipo_de_inversion',
                'monto_actualizado',
                'latitud',
                'longitud',
                'anio',
                'factores',
                'conclusion'
            )
            ->where(queryUnidadTerritorial($distrito_nom))
            ->where(queryTimeFrame($timeframe))
            ->where(queryFactor($factor))
            ->where(queryModalidad($modalidad))
            ->where(queryAnio($anio))
            ->get();
        } else {
            //Obtener el monto total
            $cant = \DB::table('proyectos')
                    ->count();

            $sum = \DB::table('proyectos')
                    ->sum('monto_actualizado');
            $sum = number_format($sum,0);
        }

        return view('proyectos', 
            compact('proyectos',
                    'ugt_valle',
                    'ugt_huall',
                    'ugt_mina',
                    'ugt_huarmey',
                    'cant',
                    'sum')
                );
    }
}
