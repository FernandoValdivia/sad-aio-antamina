<?php   
//variables
    //1ra dosis = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Vacunación 1ra dosis")
    //filtro año y distrito
    if (isset($_POST['location']) or isset($_POST['years'])) {
        //solo distrito
        if (isset($_POST['location']) and $_POST['years']=='Todos') {
            if ($_POST['location']=="AIO") {
            //Promedio brechas
            $dosis1 = DB::table('brechas')
                ->where('variable','Vacunación 1ra dosis')
                ->avg('porcentaje');
            } else {
                //Promedio de brechas de X distrito
                $location = $_POST['location'];
                $distrito = explode(",",$location);
                $distrito_nom = $distrito[2];
                //
                $dosis1 = DB::table('brechas')
                        ->where('distrito',$distrito_nom)
                        ->avg('porcentaje');
            }
        //solo año
        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
            if ($_POST['years']=="Todos") {
            //Promedio brechas
            $dosis1 = DB::table('brechas')
                        ->where('variable','Vacunación 1ra dosis')
                        ->avg('porcentaje');
            } else {
                //brechas por año
                $anio = $_POST['years'];
                //
                $dosis1 = DB::table('brechas')
                        ->where('variable','Vacunación 1ra dosis', 'and')
                        ->where('anio',$anio)
                        ->avg('porcentaje');
            }
        //distrito y año
        } else {
            //brechas por año y distrito
            $location = $_POST['location'];
            $distrito = explode(",",$location);
            $distrito_nom = $distrito[2];
            $anio = $_POST['years'];
            //Query
            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'variable' => 'Vacunación 1ra dosis'];
            //
            $dosis1 = DB::table('brechas')
                    ->where($query)
                    ->avg('porcentaje');
        }
    } else {
        //Promedio brechas
        $dosis1 = DB::table('brechas')
                ->where('variable','Vacunación 1ra dosis')
                ->avg('porcentaje');
    }

    //2da dosis = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Vacunación 2da dosis")
    $dosis2 = DB::table('brechas')
        ->where('variable','Vacunación 2da dosis')
        ->avg('porcentaje');
    
    //3ra dosis = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Vacunación 3ra dosis")
    $dosis3 = DB::table('brechas')
        ->where('variable','Vacunación 3ra dosis')
        ->avg('porcentaje');

    //Acceso a servicio de salud = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Camas de Hospitalización e internamientos")
    $acceso_salud = DB::table('brechas')
        ->where('variable','Camas de Hospitalización e internamientos')
        ->avg('porcentaje');

    //afiliacion a seguro desalud = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Población afiliada a algún tipo de seguro")
    $seguro_salud = DB::table('brechas')
        ->where('variable','Población afiliada a algún tipo de seguro')
        ->avg('porcentaje');
    
    //Agropecuaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Producción agrícola - Superficie Agrícola Bajo Riego (ha)")
    $agropecuaria = DB::table('brechas')
        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
        ->avg('porcentaje');

    //Agropecuario = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Agropecurio")
    $agropecuario = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
        ->avg('porcentaje');

    //Agua = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Abastecimiento de agua en la vivienda por red pública dentro de la vivienda")
    $agua = DB::table('brechas')
        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
        ->avg('porcentaje');

    //Anemia = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Anemia")
    $anemia = DB::table('brechas')
        ->where('variable','Anemia')
        ->avg('porcentaje');

    //Bicicletas rutas = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Bicicletas Rutas Solidarias")
    $bicicletas = DB::table('brechas')
        ->where('variable','Bicicletas Rutas Solidarias')
        ->avg('porcentaje');

    //CL- 2do de secundaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria")
    $cl_2dosecundaria = DB::table('brechas')
        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
        ->avg('porcentaje');

    //CL- 4to de primaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "CL-Satisfactorio 4To primaria")
    $cl_4toprimaria = DB::table('brechas')
        ->where('variable','CL-Satisfactorio 4To primaria')
        ->avg('porcentaje');

    //Inicial = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial")
    $inicial = DB::table('brechas')
        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
        ->avg('porcentaje');

    //Clima social = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Clima social")
    $climasocial = DB::table('brechas')
        ->where('variable','Clima social')
        ->avg('porcentaje');

    //DCI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Desnutrición crónica infantil")
    $dci = DB::table('brechas')
        ->where('variable','Desnutrición crónica infantil')
        ->avg('porcentaje');

    //Desague = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Viviendas con red pública de desagüe dentro de la vivienda")
    $desague = DB::table('brechas')
        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
        ->avg('porcentaje');

    //Educacion = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Educación")
    $educacion = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
        ->avg('porcentaje');

    //Electricidad = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Viviendas con alumbrado eléctrico por red pública")
    $electricidad = DB::table('brechas')
        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
        ->avg('porcentaje');

    //Esperanza de vida = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Esperanza de vida")
    $esperanza = DB::table('brechas')
        ->where('variable','Esperanza de vida')
        ->avg('porcentaje');

    //Gestion: ejecucion del gasto = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Ejecución presupuestal en inversiones")
    $gestion = DB::table('brechas')
        ->where('variable','Ejecución presupuestal en inversiones')
        ->avg('porcentaje');

    //Juntos = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Juntos, hogares afiliados")
    $juntos = DB::table('brechas')
        ->where('variable','Juntos, hogares afiliados')
        ->avg('porcentaje');

    //Kit de higiene escolar = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Kit de higiene escolar")
    $kitescolar = DB::table('brechas')
        ->where('variable','Kit de higiene escolar')
        ->avg('porcentaje');

    //Locales publicos en buen estado = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Locales públicos en buen estado (% del total)")
    $localesbuenestado = DB::table('brechas')
        ->where('variable','Locales públicos en buen estado (% del total)')
        ->avg('porcentaje');

    //M/L Plazo = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Locales públicos en buen estado (% del total)")
    $mlplazo = DB::table('brechas')
        ->where('variable','Locales públicos en buen estado (% del total)')
        ->avg('porcentaje');

    //Mantenimiento de IIEE = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Mantenimiento de IIEE")
    $mant_iiee = DB::table('brechas')
        ->where('variable','Mantenimiento de IIEE')
        ->avg('porcentaje');

    //Mat- 2do de secundaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Alumnos con nivel satisfactorio en matemática - 2do secundaria")
    $mat_2dosecundaria = DB::table('brechas')
        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
        ->avg('porcentaje');

    //Mat- 4to de primaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Mat-Satisfactorio 4To primaria")
    $mat_4toprimaria = DB::table('brechas')
        ->where('variable','Mat-Satisfactorio 4To primaria')
        ->avg('porcentaje');

    //PDLC = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: PDLC Actualizados")
    $pdlc = DB::table('brechas')
        ->where('variable','Planeamiento: PDLC Actualizados')
        ->avg('porcentaje');

    //PEA = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Poblacion economicante activa - PEA")
    $pea = DB::table('brechas')
        ->where('variable','Poblacion economicante activa - PEA')
        ->avg('porcentaje');

    //PEA ocupada = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "PEA Ocupada")
    $pea_ocupada = DB::table('brechas')
        ->where('variable','PEA Ocupada')
        ->avg('porcentaje');
    
    //PEI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: PEI Actualizados")
    $pei = DB::table('brechas')
        ->where('variable','Planeamiento: PEI Actualizados')
        ->avg('porcentaje');

    //Pension 65 = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Pensión 65, usuarios")
    $pension_65 = DB::table('brechas')
        ->where('variable','Pensión 65, usuarios')
        ->avg('porcentaje');

    //PMI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: PMI Actualizados")
    $pmi = DB::table('brechas')
        ->where('variable','Planeamiento: PMI Actualizados')
        ->avg('porcentaje');

    //Poblacion con educacion tecnica = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Población con educación técnica superior")
    $poblacion_edu_tecnica = DB::table('brechas')
        ->where('variable','Población con educación técnica superior')
        ->avg('porcentaje');

    //Poblacion con educacion universitaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Población con educación universitaria superior")
    $poblacion_edu_universitaria = DB::table('brechas')
        ->where('variable','Población con educación universitaria superior')
        ->avg('porcentaje');

    //Poblacion rural con acceso a educacion 17 y 20 años = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable]="Población rural entre 17 y 20 años con educación secundaria completa")
    $poblacion_rural_edu_17_20 = DB::table('brechas')
        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
        ->avg('porcentaje');

    //Poblacion urbana con acceso a educacion 17 y 20 años = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable]="Población urbana entre 17 y 20 años con educación secundaria completa")
    $poblacion_urbana_edu_17_20 = DB::table('brechas')
        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
        ->avg('porcentaje');

    //POI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: POI Actualizados")
    $poi = DB::table('brechas')
        ->where('variable','Planeamiento: POI Actualizados')
        ->avg('porcentaje');

    //Presencia de centros - EPT = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT")
    $presencia_ept = DB::table('brechas')
        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
        ->avg('porcentaje');

    //Presencia de escuelas - CETPROS = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Escuelas de Educación Superior - CETPROS")
    $presencia_cetpros = DB::table('brechas')
        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
        ->avg('porcentaje');

    //Presencia de institutos = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Institutos de Educación Superior")
    $presencia_institutos = DB::table('brechas')
        ->where('variable','Presencia de Institutos de Educación Superior')
        ->avg('porcentaje');

    //Presencia de universidades = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Universidades Total")
    $presencia_universidades = DB::table('brechas')
        ->where('variable','Presencia de Universidades Total')
        ->avg('porcentaje');

    //Primaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria")
    $primaria = DB::table('brechas')
        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
        ->avg('porcentaje');

    //PTAR = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)")
    $ptar = DB::table('brechas')
        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
        ->avg('porcentaje');

    //Recursos para el desarrollo = CALCULATE( AVERAGE(Base[Brecha]); Base[Variable] = "Brecha recursos financieros (total brecha – Canon y Regalía Minera)")
    $recursos_desarrollo = DB::table('brechas')
        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
        ->avg('porcentaje');
    
    //Red vial departamental = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Red vial departamental - Pavimentado")
    $red_vial_departamental = DB::table('brechas')
        ->where('variable','Red vial departamental - Pavimentado')
        ->avg('porcentaje');

    //Red vial nacional = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Red vial nacional - Pavimentado")
    $red_vial_nacional = DB::table('brechas')
        ->where('variable','Red vial nacional - Pavimentado')
        ->avg('porcentaje');

    //Red vial vecinal = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Red vial vecinal - Pavimentado")
    $red_vial_vecinal = DB::table('brechas')
        ->where('variable','Red vial vecinal - Pavimentado')
        ->avg('porcentaje');

    //Salud = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Salud")
    $salud = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
        ->avg('porcentaje');

    //Saneamiento = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Saneamiento")
    $saneamiento = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
        ->avg('porcentaje');

    //Secundaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria")
    $secundaria = DB::table('brechas')
        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
        ->avg('porcentaje');

    //Servicio de internet = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Hogares con internet")
    $servicio_internet = DB::table('brechas')
        ->where('variable','Hogares con internet')
        ->avg('porcentaje');

    //Telefonia movil = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Hogares con telefonía celular")
    $telefonia_movil = DB::table('brechas')
        ->where('variable','Hogares con telefonía celular')
        ->avg('porcentaje');

    //Transporte = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Transporte")
    $transporte = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
        ->avg('porcentaje');

    //Turistica = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Número de establecimientos de hospedaje")
    $turistica = DB::table('brechas')
        ->where('variable','Número de establecimientos de hospedaje')
        ->avg('porcentaje');

//calculos y operaciones
    //2do de secundaria = ([Mat- 2do de secundaria] + [CL- 2do de secundaria])/2
    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
    
    //4to de primaria = ( [Mat- 4to de primaria] + [CL- 4to de primaria] )/2
    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;

    //Academica = ([Presencia de centros - EPT] + [Presencia de escuelas - CETPROS] + [Presencia de institutos] + [Presencia de universidades]) /4
    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;

    //Acceso a educacion = ([Inicial] + [Primaria] + [Secundaria]) /3
    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;

    //Retorno seguro = ( [Kit de higiene escolar] + [Mantenimiento de IIEE] + Base[Bicicletas rutas] ) /3
    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;

    //Adecuado estado de IIEE = ([Locales publicos en buen estado] + [Retorno seguro] ) /2
    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);

    //Calidad del gasto = ([Saneamiento] + [Transporte] + [Agropecuario] + [Educacion] + [Salud])/5
    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;

    //Capital humano = ( [Poblacion con educacion tecnica] + [Poblacion con educacion universitaria] + [PEA ocupada] + [PEA])/4
    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;

    //Nivel de educacion = ([Poblacion rural con acceso a educacion 17 y 20 años] + [Poblacion urbana con acceso a educacion 17 y 20 años])/2
    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;

    //Logros de aprendizaje = ( [4to de primaria] + [2do de secundaria])/2
    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;

    //Educacion EBR = ( [Acceso a educacion] + [Nivel de educacion] + [Adecuado estado de IIEE] + [Logros de aprendizaje] )/4
    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;

    //Vial pavimentado = ([Red vial departamental] + [Red vial nacional] + [Red vial vecinal])/3
    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;

    //Servicion basicos = ([Servicio de internet] + [Telefonia movil] + [Agua] + [Desague] + [Electricidad] + [PTAR] + [Vial pavimentado] )/7
    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;

    //Infraestructura para el desarrollo de potencialidades = (Base[Agropecuaria] + [Turistica])/2
    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;

    //Infraestructura = ( [Infraestructura para el desarrollo de potencialidades] + [Academica])/2
    $infraestructura = ($infraestructura_potencialidades+$academica)/2;

    //Transferencias monetarias = ( [Juntos] + [Pension 65] ) /2
    $tranferencias_monetarias = ($juntos+$pension_65)/2;

    //Ingresos = ( [Infraestructura] + [Capital humano] + [Transferencias monetarias] )/3
    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;

    //Nivel de vida digno = ([Servicion basicos] + [Ingresos])/2
    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;

    //Planeamiento = ( [PDLC] + [POI] + [PEI] + [PMI] )/4
    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;

    //Vacunacion covid = ( [1ra dosis] + [2da dosis] + [3ra dosis] ) /3
    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;

    //Vida larga y saludable = ([Esperanza de vida] +[Acceso a servicio de salud] + [Anemia] + [DCI] + [afiliacion a seguro desalud] + [Vacunacion covid])/6
    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;

    //Institucionalidad = ( [Recursos para el desarrollo] + [Planeamiento] + [Gestion: ejecucion del gasto] + [Calidad del gasto] + [Clima social])/5
    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;

    //Univ/tecnica = ([Presencia de universidades] + [Presencia de institutos])/2
    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;

    //Total Prom = CALCULATE(([Nivel de vida digno] + [Educacion EBR] + [Vida larga y saludable] + [Institucionalidad]) / 4)
    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Resumen</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="https://res.cloudinary.com/lvaldivia/image/upload/v1652719812/ccd/logo-icon_pjbwon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    {{-- Logo --}}
                    <div class="row m-4 divlogo">
                        <div class="col-3 logo">
                            <img class="img-logo" src="https://res.cloudinary.com/lvaldivia/image/upload/v1652720473/ccd/logo-navbar2_iblh54.png" alt="logoccd">
                            <p>CENTRO PARA</p>
                            <p>LA COMPETITIVIDAD</p>
                            <p>Y EL DESARROLLO</p>
                        </div>
                        <div class="col-9">
                            <p> SAD AIO Antamina</p>
                        </div>
                    </div>
                    {{-- End Logo --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="/" class="nav-item nav-link">Home</a>
                        <a href="/resumen" class="nav-item nav-link active">Resumen</a>
                        <a href="/brechas" class="nav-item nav-link">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-1 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Resumen</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#" class="aactiva">Resumen</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Resumen</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <!-- Resumen Start -->
        <div class="container-xxl">
            <div class="container-fluid">
                <div class="grid-rsm-container">
                    <div class="grid-rsm-1"></div>
                    <!-- titulo -->
                    <div class="grid-rsm-2">
                        <div class="row text-center">
                            <h3 id="titulo">IDH distritos del AIO</h3>
                            <p>(Comparación relativa)</p>
                        </div>
                    </div>
                    <div class="grid-rsm-3"></div>
                    <!-- IDH -->
                    <div class="grid-rsm-4">
                        <div class="col-9">
                            <h4>IDH</h4>
                            <small>(Índice)</small>
                        </div>
                        <div class="col-3">
                            <h4>
                            <?php                           
                                //filtro año y distrito
                                if (isset($_POST['location']) or isset($_POST['years'])) {
                                    //solo distrito
                                    if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                        if ($_POST['location']=="AIO") {
                                        //Promedio idh
                                        $idh = DB::table('idh')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                        } else {
                                            //Potencialidades de X distrito
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            //
                                            $idh = DB::table('idh')
                                                    ->where('distrito',$distrito_nom)
                                                    ->avg('idh');
                                                echo number_format($idh,2);
                                        }
                                    //solo año
                                    } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                        if ($_POST['years']=="Todos") {
                                        //Promedio idh
                                        $idh = DB::table('idh')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                        } else {
                                            //Potencialidades de X distrito
                                            $anio = $_POST['years'];
                                            //
                                            $idh = DB::table('idh')
                                                    ->where('anio',$anio)
                                                    ->avg('idh');
                                                echo number_format($idh,2);
                                        }
                                    //distrito y año
                                    } else {
                                        //Potencialidades de X distrito y año
                                        $location = $_POST['location'];
                                        $distrito = explode(",",$location);
                                        $distrito_nom = $distrito[2];
                                        $anio = $_POST['years'];
                                        //Query
                                        $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                        //
                                        $idh = DB::table('idh')
                                                ->where($query)
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                    }
                                } else {
                                    $idh = DB::table('idh')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                }
                            ?>
                            </h4>
                        </div>
                    </div>
                    <!-- Ingresos per cápita -->
                    <div class="grid-rsm-5">
                        <div class="col-9">
                            <h4>Ingresos per cápita</h4>
                            <small>(Soles mensual)</small>
                        </div>
                        <div class="col-3">
                            <h4>
                            <?php
                                //filtro año y distrito
                                if (isset($_POST['location']) or isset($_POST['years'])) {
                                    //solo distrito
                                    if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                        if ($_POST['location']=="AIO") {
                                        //Promedio idh
                                        $ingr = DB::table('idh')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                        } else {
                                            //Potencialidades de X distrito
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            //
                                            $ingr = DB::table('idh')
                                                    ->where('distrito',$distrito_nom)
                                                    ->avg('ingreso_per_capita');
                                                echo number_format($ingr,0);
                                        }
                                    //solo año
                                    } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                        if ($_POST['years']=="Todos") {
                                        //Promedio idh
                                        $ingr = DB::table('idh')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                        } else {
                                            //Potencialidades de X distrito
                                            $anio = $_POST['years'];
                                            //
                                            $ingr = DB::table('idh')
                                                    ->where('anio',$anio)
                                                    ->avg('ingreso_per_capita');
                                                echo number_format($ingr,0);
                                        }
                                    //distrito y año
                                    } else {
                                        //Potencialidades de X distrito y año
                                        $location = $_POST['location'];
                                        $distrito = explode(",",$location);
                                        $distrito_nom = $distrito[2];
                                        $anio = $_POST['years'];
                                        //Query
                                        $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                        //
                                        $ingr = DB::table('idh')
                                                ->where($query)
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                    }
                                } else {
                                    $ingr = DB::table('idh')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                }
                            ?>
                            </h4>
                        </div>
                    </div>
                    <!-- Brecha física -->
                    <div class="grid-rsm-6">
                        <table>
                            <tr>
                                <th>
                                    <h4>Brecha física</h4>
                                    <small>(%)</small>
                                </th>
                                <td>
                                    <h5>
                                    <?php
                                        /* //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                $br = DB::table('brechas')
                                                        ->avg('porcentaje');
                                                    echo number_format($br,0);
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //
                                                    $br = DB::table('brechas')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        echo number_format($br,0);
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                //Promedio brechas
                                                $br = DB::table('brechas')
                                                        ->avg('porcentaje');
                                                    echo number_format($br,0);
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //
                                                    $br = DB::table('brechas')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        echo number_format($br,0);
                                                }
                                            //distrito y año
                                            } else {
                                                //brechas por año y distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $anio = $_POST['years'];
                                                //Query
                                                $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                                //
                                                $br = DB::table('brechas')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    echo number_format($br,0);
                                            }
                                        } else {
                                            //Promedio brechas
                                            $br = DB::table('brechas')
                                                        ->avg('porcentaje');
                                                    echo number_format($br,0);
                                        } */
                                        echo $total_avg;
                                    ?>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Nivel de vida digno</p></th>
                                <td>
                                    <p>
                                        <?=$nivel_vida_digno;?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Educación</p></td>
                                <td>
                                    <p>
                                        <?=$educacion;?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Vida larga y saludable</p></th>
                                <td>
                                    <p>
                                        <?=$vida_larga_saludable;?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Institucionalidad</p></th>
                                <td>
                                    <p>
                                        <?=$institucionalidad;?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Emergencias</p></th>
                                <td>
                                    <p>
                                        <?=$institucionalidad;?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Brecha financiera -->
                    <div class="grid-rsm-7">
                        <div class="col-8">
                            <h4>Brecha financiera</h4>
                            <small>(Millones de Soles)</small>
                        </div>
                        <div class="col-4">
                            <h4>125,103</h4>
                        </div>
                    </div>
                    <!-- Map -->
                    <div class="grid-rsm-8">
                        <div id="map-rsm"></div> 
                    </div>
                    <!-- Filtros -->
                    <div class="grid-rsm-9">
                        <form action="/resumen" method="POST">
                            @csrf
                            <div class="row" id="select-location">
                                <label for="location">Unidad territorial</label>
                                <select name="location" id="location" class="select">
                                    <option value="AIO">AIO</option>
                                    <optgroup label="UGT Huallanca">
                                        @php
                                        foreach ($ugt_huall as $ugt) {
                                                echo '<option value="'.$ugt->coords.','.$ugt->distrito.'">'.$ugt->distrito.'</option>';
                                                /* if(!empty($_POST[`location`])){
                                                    if ($_POST[`location`]==$ugt->coords.','.$ugt->distrito){
                                                        echo " selected";
                                                    }
                                                } */
                                        }
                                        @endphp
                                        
                                    </optgroup>
                                    <optgroup label="UGT Huarmey">
                                        @php
                                        foreach ($ugt_huarmey as $ugt) {
                                                echo '<option value="'.$ugt->coords.','.$ugt->distrito.'">'.$ugt->distrito.'</option>';
                                        }
                                        @endphp
                                    </optgroup>
                                    <optgroup label="UGT Mina / San Marcos">
                                        @php
                                        foreach ($ugt_mina as $ugt) {
                                                echo '<option value="'.$ugt->coords.','.$ugt->distrito.'">'.$ugt->distrito.'</option>';
                                        }
                                        @endphp
                                    </optgroup>
                                    <optgroup label="UGT Valle Fortaleza">
                                        @php
                                        foreach ($ugt_valle as $ugt) {
                                                echo '<option value="'.$ugt->coords.','.$ugt->distrito.'">'.$ugt->distrito.'</option>';
                                        }
                                        @endphp
                                    </optgroup>
                                </select>
                                <label for="years" class="mt-3">Años</label>
                                <select name="years" id="yrs">
                                    <option value="Todos">Todos</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                                <input type="submit" class="mt-3" value="Filtrar">
                            </div>
                        </form>
                    </div>
                    <!-- Potencialidades -->
                    <div class="grid-rsm-11">
                        <table>
                            <thead>
                                <th><h5 class="mt-2">Potencialidades</h5></th>
                            </thead>
                            <?php
                                if (isset($_POST['location'])) {
                                    if ($_POST['location']=="AIO") {
                                        //Todas las potencialidades
                                        $potencialidad = DB::table('aiopotenc')->select(
                                            'distrito',
                                            'potencialidad',
                                            'url',
                                            'hexcolor'
                                        )
                                        ->get();
                                    } else {
                                        //Potencialidades de X distrito
                                        $location = $_POST['location'];
                                        $distrito = explode(",",$location);
                                        $distrito_nom = $distrito[2];
                                        $potencialidad = DB::table('potencialidades')->select(
                                            'distrito',
                                            'potencialidad',
                                            'url',
                                            'hexcolor'
                                        )
                                        ->where('distrito',$distrito_nom)
                                        ->get();
                                    }
                                } else {
                                    //Todas las potencialidades
                                    $potencialidad = DB::table('aiopotenc')->select(
                                            'distrito',
                                            'potencialidad',
                                            'url',
                                            'hexcolor'
                                        )
                                        ->get();
                                }
                            ?>
                            @foreach ($potencialidad as $poten)
                                <tr>
                                    <td>
                                        <div class="row mb-2" id="pot1" style="background-color: {{$poten->hexcolor}};">
                                            <div class="col-3">
                                                <img src="{{ $poten->url }}" class="img-pt">
                                            </div>
                                            <div class="col-9">
                                                <p id="idpotencialidad">{{ $poten->potencialidad }}</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Proyectos -->
                    <div class="grid-rsm-12">
                        <table>
                            <tr>
                                <th><h5>Proyectos</h5></th>
                                <th class="text-center"><h6>Número</h6></th>
                                <td class="text-center">
                                    <h6>Monto</h6>
                                    <small>(S/ millones)</small>
                                </td>
                            </tr>
                            <tr>
                                <th><h4>Total</h4></th>
                                <th class="txt"><strong>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where('distrito',$distrito_nom)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where('anio',$anio)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </strong></th>
                                <th class="txt"><strong>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where('anio',$anio)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </strong></th>
                            </tr>
                            <tr>
                                <td>First Engagement</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','First Engagement')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'First Engagement'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','First Engagement')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'First Engagement'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'First Engagement'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','First Engagement')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','First Engagement')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'First Engagement'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','First Engagement')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'First Engagement'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'First Engagement'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','First Engagement')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Short Term</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Short Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Short Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Short Term'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','Short Term')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Short Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Short Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Short Term'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','Short Term')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Medium Term</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Medium Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Medium Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Medium Term'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','Medium Term')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Medium Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Medium Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Medium Term'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','Medium Term')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Long Term</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Long Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Long Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Long Term'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','Long Term')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Long Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Long Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Long Term'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','Long Term')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Modalidad de intervención -->
                    <div class="grid-rsm-13">
                        <table>
                            <tr>
                                <th><h5>Modalidad de <br>intervención</h5></th>
                                <th class="text-center"><h6>Número</h6></th>
                                <td class="text-center">
                                    <h6>Monto</h6>
                                    <small>(S/ millones)</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Proyectos sociales</td>
                                {{-- Cantidad --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: Proyectos sociales')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Social Directa Antamina: Proyectos sociales'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: Proyectos sociales')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Directa Antamina: Proyectos sociales'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Directa Antamina: Proyectos sociales'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Directa Antamina: Proyectos sociales')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                {{-- Monto --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: Proyectos sociales')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Social Directa Antamina: Proyectos sociales'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: Proyectos sociales')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Directa Antamina: Proyectos sociales'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Directa Antamina: Proyectos sociales'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Directa Antamina: Proyectos sociales')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Pública y privada</td>
                                {{-- Cantidad --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                {{-- Monto --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Inversión pública</td>
                                {{-- Cantidad --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                {{-- Monto --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Canon y regalía -->
                    <div class="grid-rsm-14">
                        <table>
                            <tr>
                                <th><h5>Canon y Regalía</h5></th>
                                <th class="text-center"><h6>2007-2021</h6></th>
                                <th class="text-center"><h6>2022</h6></th>
                                <th class="text-center"><h6>2023-2036</h6></th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Mineria y otros</h5>
                                    <small>(Millones de Soles)</small>
                                </th>
                                {{-- 2007-2021 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio','<=',2021,'and')
                                                    ->where('anio','>=',2007)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio','<=',2021,'and')
                                                        ->where('anio','>=',2007, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio','<=',2021,'and')
                                                    ->where('anio','>=',2007)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                                {{-- 2022 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio',2022)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio',2022,'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio',2022)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                                {{-- 2023-2036 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio','<=',2036,'and')
                                                    ->where('anio','>=',2023)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio','<=',2036,'and')
                                                        ->where('anio','>=',2023,'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio','<=',2036,'and')
                                                    ->where('anio','>=',2023)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Inversión Social -->
                    <div class="grid-rsm-15">
                        <table>
                            <tr>
                                <th><h5>Inversión social</h5></th>
                                <th class="text-center"><h6>2022</h6></th>
                                <th class="text-center"><h6>2023</h6></th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Directa Antamina</h5>
                                    <small>(Millones de Soles)</small>
                                </th>
                                {{-- 2022 --}}
                                <td class="text-center">
                                <?php
                                    //filtro distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $is_sum = DB::table('inversion_social')
                                                    ->where('anio',2022)
                                                    ->sum('monto');
                                                    echo number_format($is_sum,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $is_sum = DB::table('inversion_social')
                                                        ->where('anio',2022, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($is_sum,0);
                                            }
                                    } else {
                                        //Total canon
                                        $is_sum = DB::table('inversion_social')
                                                ->where('anio',2022)
                                                ->sum('monto');
                                                echo number_format($is_sum,0);
                                    }
                                ?>
                                </td>
                                {{-- 2023 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $is_sum = DB::table('inversion_social')
                                                    ->where('anio',2023)
                                                    ->sum('monto');
                                                    echo number_format($is_sum,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $is_sum = DB::table('inversion_social')
                                                        ->where('anio',2023, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($is_sum,0);
                                            }
                                    } else {
                                        //Total canon
                                        $is_sum = DB::table('inversion_social')
                                                ->where('anio',2023)
                                                ->sum('monto');
                                                echo number_format($is_sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Resumen End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Nosotros</h4>
                        <a class="btn btn-link" href="">Nosotros</a>
                        <a class="btn btn-link" href="">Contactanos</a>
                        <a class="btn btn-link" href="">Politica de privacidad</a>
                        <a class="btn btn-link" href="">Terminos & Condiciones</a>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contacto</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>San Isidro, Lima - Perú</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>01 612 - 1700</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>melissa.sanchez@ccdcompetitividad.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Centro-para-la-Competitividad-y-el-Desarrollo-CCD-151040740434523?_rdc=1&_rdr"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://api.whatsapp.com/send?phone=51922753771"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/centro-para-la-competitividad-y-el-desarrollo-434799214/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href="mailto:melissa.sanchez@ccdcompetitividad.com"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">CCD</a>, Todos los derechos reservados. 
							Desarrollado por <a class="border-bottom" href="https://lfvaldivia.ml" target="_blank">LValdivia</a> & <a class="border-bottom" href="https://ivanoscco.wixsite.com/my-site" target="_blank">IOscco</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
    <!-- Script Map -->
    <script>
        //Color por IDH
        function getColor(d) {
            switch (d) {
                case "PARARIN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Pararín (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else {  $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Pararín (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Pararín (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "LLACLLIN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Llacllín (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Llacllín (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Llacllín (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "MARCA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Marca (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Marca (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Marca (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "ANTONIO RAYMONDI":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Antonio Raymondi (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Antonio Raymondi (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Antonio Raymondi (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CAJACAY":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Cajacay (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Cajacay (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Cajacay (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUAYLLACAYAN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "PAMPAS CHICO":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CATAC":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Cátac (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Cátac (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Cátac (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "AQUIA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Aquia (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Aquia (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Aquia (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUALLANCA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huallanca (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huallanca (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huallanca (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "LLATA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Llata (Huamalíes / Huánuco)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Llata (Huamalíes / Huánuco)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Llata (Huamalíes / Huánuco)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CHAVIN DE HUANTAR":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Chavín de Huántar (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Chavín de Huántar (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Chavín de Huántar (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "PUÑOS":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Puños (Huamalíes / Huánuco)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Puños (Huamalíes / Huánuco)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Puños (Huamalíes / Huánuco)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "SAN PEDRO DE CHANA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','San Pedro de Chaná (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','San Pedro de Chaná (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','San Pedro de Chaná (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUACHIS":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huachis (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huachis (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huachis (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUARMEY":
                    idh = "<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $idharray = DB::table('idh') ->where('distrito','Huarmey (Huarmey / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huarmey (Huarmey / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huarmey (Huarmey / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "COLQUIOC":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Colquioc (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Colquioc (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Colquioc (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CHIQUIAN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Chiquián (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Chiquián (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Chiquián (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "SAN MARCOS":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','San Marcos (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','San Marcos (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','San Marcos (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "PARAMONGA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Paramonga (Barranca / Lima)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Paramonga (Barranca / Lima)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Paramonga (Barranca / Lima)')->avg('idh'); echo $idharray; }?>";
                    if (idh < 0.51) {
                        return '#FF7F7F';
                    } else if(idh < 0.59) {
                        return '#FAC090';
                    } else if(idh < 1) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                default:
                    return '#ffffff';
                    break;
            }
        }   
    </script>
    <script src="{{ asset('js/map-rsm.js')  }}"></script>
</body>
</html>