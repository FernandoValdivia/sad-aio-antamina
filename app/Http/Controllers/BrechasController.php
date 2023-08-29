<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

ini_set('max_execution_time', 500);

class BrechasController extends Controller
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

        //filtros   
        function getVariable($v, $location, $years, $impacto) {
            $query = [
                'variable' => $v,
                'distrito' => ($location !== 'AIO' && isset($location)) ? explode(',', $location)[2] : 'AIO',
                'anio' => ($years !== 'Todos' && isset($years)) ? $years : '22022',
                'impacto' => ($impacto !== 'Todos' && isset($impacto)) ? $impacto : 'Con impacto'
            ];
        
            $total = \DB::table('brechasbd')->where($query)->avg('porcentaje');
            $res = ($total !== null) ? number_format($total, 1) : '';
            return $res;
        }

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

        // indicadores
            $indicador0 = getVariable($variable[0], $location, $years, $impacto);
            $indicador1 = getVariable($variable[1], $location, $years, $impacto);
            $indicador2 = getVariable($variable[2], $location, $years, $impacto);
            $indicador3 = getVariable($variable[3], $location, $years, $impacto);
            $indicador4 = getVariable($variable[4], $location, $years, $impacto);
            $indicador5 = getVariable($variable[5], $location, $years, $impacto);
            $indicador6 = getVariable($variable[6], $location, $years, $impacto);
            $indicador7 = getVariable($variable[7], $location, $years, $impacto);
            $indicador8 = getVariable($variable[8], $location, $years, $impacto);
            $indicador9 = getVariable($variable[9], $location, $years, $impacto);
            $indicador10 = getVariable($variable[10], $location, $years, $impacto);
            $indicador11 = getVariable($variable[11], $location, $years, $impacto);
            $indicador12 = getVariable($variable[12], $location, $years, $impacto);
            $indicador13 = getVariable($variable[13], $location, $years, $impacto);
            $indicador14 = getVariable($variable[14], $location, $years, $impacto);
            $indicador15 = getVariable($variable[15], $location, $years, $impacto);
            $indicador16 = getVariable($variable[16], $location, $years, $impacto);
            $indicador17 = getVariable($variable[17], $location, $years, $impacto);
            $indicador18 = getVariable($variable[18], $location, $years, $impacto);
            $indicador19 = getVariable($variable[19], $location, $years, $impacto);
            $indicador20 = getVariable($variable[20], $location, $years, $impacto);
            $indicador21 = getVariable($variable[21], $location, $years, $impacto);
            $indicador22 = getVariable($variable[22], $location, $years, $impacto);
            $indicador23 = getVariable($variable[23], $location, $years, $impacto);
            $indicador24 = getVariable($variable[24], $location, $years, $impacto);
            $indicador25 = getVariable($variable[25], $location, $years, $impacto);
            $indicador26 = getVariable($variable[26], $location, $years, $impacto);
            $indicador27 = getVariable($variable[27], $location, $years, $impacto);
            $indicador28 = getVariable($variable[28], $location, $years, $impacto);
            $indicador29 = getVariable($variable[29], $location, $years, $impacto);
            $indicador30 = getVariable($variable[30], $location, $years, $impacto);
            $indicador31 = getVariable($variable[31], $location, $years, $impacto);
            $indicador32 = getVariable($variable[32], $location, $years, $impacto);
            $indicador33 = getVariable($variable[33], $location, $years, $impacto);
            $indicador34 = getVariable($variable[34], $location, $years, $impacto);
            $indicador35 = getVariable($variable[35], $location, $years, $impacto);
            $indicador36 = getVariable($variable[36], $location, $years, $impacto);
            $indicador37 = getVariable($variable[37], $location, $years, $impacto);
            $indicador38 = getVariable($variable[38], $location, $years, $impacto);
            $indicador39 = getVariable($variable[39], $location, $years, $impacto);
            $indicador40 = getVariable($variable[40], $location, $years, $impacto);
            $indicador41 = getVariable($variable[41], $location, $years, $impacto);
            $indicador42 = getVariable($variable[42], $location, $years, $impacto);
            $indicador43 = getVariable($variable[43], $location, $years, $impacto);
            $indicador44 = getVariable($variable[44], $location, $years, $impacto);
            $indicador45 = getVariable($variable[45], $location, $years, $impacto);
            $indicador46 = getVariable($variable[46], $location, $years, $impacto);
            $indicador47 = getVariable($variable[47], $location, $years, $impacto);
            $indicador48 = getVariable($variable[48], $location, $years, $impacto);
            $indicador49 = getVariable($variable[49], $location, $years, $impacto);
            $indicador50 = getVariable($variable[50], $location, $years, $impacto);
            $indicador51 = getVariable($variable[51], $location, $years, $impacto);
            $indicador52 = getVariable($variable[52], $location, $years, $impacto);
            $indicador53 = getVariable($variable[53], $location, $years, $impacto);
            $indicador54 = getVariable($variable[54], $location, $years, $impacto);
            $indicador55 = getVariable($variable[55], $location, $years, $impacto);
            $indicador56 = getVariable($variable[56], $location, $years, $impacto);
            $indicador57 = getVariable($variable[57], $location, $years, $impacto);
            $indicador58 = getVariable($variable[58], $location, $years, $impacto);
            $indicador59 = getVariable($variable[59], $location, $years, $impacto);
            $indicador60 = getVariable($variable[60], $location, $years, $impacto);
            $indicador61 = getVariable($variable[61], $location, $years, $impacto);
            $indicador62 = getVariable($variable[62], $location, $years, $impacto);

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

            // Formatear periodo (2T 2023)
            if(isset($years) && $years != 'Todos') {
                $year = $years;
                if(strlen($year) == 6) {
                    $quarter = substr($year, 0, 1);
                    $formatted_year = substr($year, 1);
                    $period = $quarter.'T '.$formatted_year;
                } else {
                    $period = $year;
                }
            } else {
                $period = '2T 2022';
            }

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

                    $resultado = number_format($total, 1);

                    $resultados[$var][$distrito] = $resultado;
                }
            }

        // return
        return view('brechas',
        compact('indicador0',
                'indicador1',
                'indicador2',
                'indicador3',
                'indicador4',
                'indicador5',
                'indicador6',
                'indicador7',
                'indicador8',
                'indicador9',
                'indicador10',
                'indicador11',
                'indicador12',
                'indicador13',
                'indicador14',
                'indicador15',
                'indicador16',
                'indicador17',
                'indicador18',
                'indicador19',
                'indicador20',
                'indicador21',
                'indicador22',
                'indicador23',
                'indicador24',
                'indicador25',
                'indicador26',
                'indicador27',
                'indicador28',
                'indicador29',
                'indicador30',
                'indicador31',
                'indicador32',
                'indicador33',
                'indicador34',
                'indicador35',
                'indicador36',
                'indicador37',
                'indicador38',
                'indicador39',
                'indicador40',
                'indicador41',
                'indicador42',
                'indicador43',
                'indicador44',
                'indicador45',
                'indicador46',
                'indicador47',
                'indicador48',
                'indicador49',
                'indicador50',
                'indicador51',
                'indicador52',
                'indicador53',
                'indicador54',
                'indicador55',
                'indicador56',
                'indicador57',
                'indicador58',
                'indicador59',
                'indicador60',
                'indicador61',
                'indicador62',
                'ugt_valle',
                'ugt_huall',
                'ugt_mina',
                'ugt_huarmey',
                'resultados',
                'period'
            ));
    }
}
