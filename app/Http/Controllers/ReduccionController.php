<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

ini_set('max_execution_time', 500);

class ReduccionController extends Controller
{
    public function index(Request $request) {
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

        $location = $request->input('location');
        $years = $request->input('years');
        $impacto = $request->input('impacto');
        $variable = ['Institucionalidad Madura',
            'Canon Minero. Regalía Minera y otros para el desarrollo',
            'Instrumentos de Planeamiento Municipal',
            'Ejecución presupuestal en inversiones',
            'Calidad del gasto de inversión municipal',
            'Clima social para el desarrollo',
            'Planeamiento: PDLC Actualizados',
            'Calidad de gasto presupuestal en inversiones - Saneamiento',
            'Planeamiento: POI Actualizados',
            'Calidad de gasto presupuestal en inversiones - Transporte',
            'Planeamiento: PEI Actualizados',
            'Calidad de gasto presupuestal en inversiones - Agropecurio',
            'Planeamiento: PMI Actualizados',
            'Calidad de gasto presupuestal en inversiones - Educación',
            'Calidad de gasto presupuestal en inversiones - Salud',
            'Total',
            'Oportunidades para las futuras generaciones',
            'Educación: EBR y años de educación',
            'Acceso educación (matriculados)',
            'Nivel de educación de la población',
            'Logros de Aprendizaje',
            'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial',
            '4to prim.',
            'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria',
            '2do sec.',
            'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria',
            'Vida larga y saludable',
            'Esperanza de vida',
            'Anemia',
            'Desnutrición crónica infantil',
            'Población afiliada a algún tipo de seguro',
            'Infraestructura social y productiva',
            'Servicios Básicos',
            'Hogares con internet',
            'Hogares con telefonía celular',
            'Viviendas por red pública de agua dentro de la vivienda',
            'Viviendas con red pública de desagüe dentro de la vivienda',
            'Viviendas con alumbrado eléctrico por red pública',
            'Plantas de Tratamiento de Aguas Residuales (PTAR)',
            'Vial pavimentada',
            'Social',
            'Camas de Hospitalización e internamientos',
            'Mejoras de IIEE',
            'Locales públicos en buen estado (% del total)',
            'Retorno seguro',
            'Productiva',
            'Mantenimiento',
            'Agropecuaria (riego tecnificado)',
            'Turística',
            'Académica',
            'Importancia del monto asignado',
            'Velocidad de ejecución',
            'Emprendimiento y desarrollo económico',
            'Capital Humano',
            'Ingreso por persona',
            'Poblacion economicante activa - PEA',
            'PEA Ocupada',
            'Formación Univ./Técnica',
            'Emergencias',
            'Vacuna Covid-19',
            'Vacunación 1ra dosis',
            'Vacunación 2da dosis',
            'Vacunación 3ra dosis'];

        // reduccion de brechas
        //array distritos
        $distritos = ['San Marcos (Huari / Áncash)',
            'San Pedro de Chaná (Huari / Áncash)',
            'Huachis (Huari / Áncash)',
            'Chavín de Huántar (Huari / Áncash)',
            'Huallanca (Bolognesi / Áncash)',
            'Aquia (Bolognesi / Áncash)',
            'Chiquián (Bolognesi / Áncash)',
            'Puños (Huamalíes / Huánuco)',
            'Llata (Huamalíes / Huánuco)',
            'Pampas Chico (Recuay / Áncash)',
            'Marca (Recuay / Áncash)',
            'Cajacay (Bolognesi / Áncash)',
            'Huayllacayán (Bolognesi / Áncash)',
            'Antonio Raymondi (Bolognesi / Áncash)',
            'Llacllín (Recuay / Áncash)',
            'Colquioc (Bolognesi / Áncash)',
            'Pararín (Recuay / Áncash)',
            'Paramonga (Barranca / Lima)',
            'Cátac (Recuay / Áncash)',
            'Huarmey (Huarmey / Áncash)',
            'AIO'];

        // valor de la tabla 
        $anio = ($years ?? '22022'); // Valor seleccionado desde un select
        $resultados = []; // Array para almacenar los resultados

        foreach ($variable as $var) {
            foreach ($distritos as $distrito) {
                $query = [
                    'variable' => $var,
                    'distrito' => $distrito,
                    'impacto' => 'Con impacto',
                    'anio' => $anio
                ];

                $total = \DB::table('brechasbd')
                    ->where($query)
                    ->avg('porcentaje');

                $resultado = number_format($total, 0);

                $resultados[$var][$distrito] = $resultado;
            }
        }

        // return
        return view('reduccion',
        compact('ugt_valle',
                'ugt_huall',
                'ugt_mina',
                'ugt_huarmey',
                'resultados'
            ));
    }
}
