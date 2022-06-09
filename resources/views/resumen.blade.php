<?php 
error_reporting(E_ALL);
session_start();
//variables de select para cambiar título
function getName() {
    $distrito = "";
    $anio = "";

    if (isset($_POST['location'],$_POST['years'])) {
        $_SESSION['distrito'] = $distrito = $_POST['location'];
        $_SESSION['anio'] = $anio = $_POST['years'];
    } elseif (isset($_SESSION['distrito'],$_SESSION['anio'])) {
        $distrito = $_SESSION['distrito'];
        $anio = $_SESSION['anio'];
    }

    if ($distrito=="AIO") {
        echo "IDH distritos del AIO";
    } elseif (isset($_POST['location'])) {
        $distrito = $_POST['location'];
        $nombre = explode(",",$distrito);
        $distrito_nom = $nombre[2];
        echo "IDH de ".$distrito_nom;
    } else {
        echo "IDH distritos del AIO";
    }
}
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
                            <h3 id="titulo"><?=getName();?></h3>
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
                                        //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                                ->where('variable','Vacunación 1ra dosis')
                                                                ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->avg('porcentaje');

                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $total_avg;
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->where('distrito',$distrito_nom)
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $total_avg;
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                    //Promedio total
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $total_avg;
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $total_avg;
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
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                        ->where('variable','Vacunación 1ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $total_avg;
                                            }
                                        } else {
                                            //Promedio total
                                            //variables
                                                $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->avg('porcentaje');
                                                $dosis2 = DB::table('brechas')
                                                    ->where('variable','Vacunación 2da dosis')
                                                    ->avg('porcentaje');
                                                $dosis3 = DB::table('brechas')
                                                    ->where('variable','Vacunación 3ra dosis')
                                                    ->avg('porcentaje');
                                                $acceso_salud = DB::table('brechas')
                                                    ->where('variable','Camas de Hospitalización e internamientos')
                                                    ->avg('porcentaje');
                                                $seguro_salud = DB::table('brechas')
                                                    ->where('variable','Población afiliada a algún tipo de seguro')
                                                    ->avg('porcentaje');
                                                $agropecuaria = DB::table('brechas')
                                                    ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                    ->avg('porcentaje');
                                                $agropecuario = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                    ->avg('porcentaje');
                                                $agua = DB::table('brechas')
                                                    ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $anemia = DB::table('brechas')
                                                    ->where('variable','Anemia')
                                                    ->avg('porcentaje');
                                                $bicicletas = DB::table('brechas')
                                                    ->where('variable','Bicicletas Rutas Solidarias')
                                                    ->avg('porcentaje');
                                                $cl_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $cl_4toprimaria = DB::table('brechas')
                                                    ->where('variable','CL-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $inicial = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                    ->avg('porcentaje');
                                                $climasocial = DB::table('brechas')
                                                    ->where('variable','Clima social')
                                                    ->avg('porcentaje');
                                                $dci = DB::table('brechas')
                                                    ->where('variable','Desnutrición crónica infantil')
                                                    ->avg('porcentaje');
                                                $desague = DB::table('brechas')
                                                    ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $educacion = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                    ->avg('porcentaje');
                                                $electricidad = DB::table('brechas')
                                                    ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                    ->avg('porcentaje');
                                                $esperanza = DB::table('brechas')
                                                    ->where('variable','Esperanza de vida')
                                                    ->avg('porcentaje');
                                                $gestion = DB::table('brechas')
                                                    ->where('variable','Ejecución presupuestal en inversiones')
                                                    ->avg('porcentaje');
                                                $juntos = DB::table('brechas')
                                                    ->where('variable','Juntos, hogares afiliados')
                                                    ->avg('porcentaje');
                                                $kitescolar = DB::table('brechas')
                                                    ->where('variable','Kit de higiene escolar')
                                                    ->avg('porcentaje');
                                                $localesbuenestado = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mlplazo = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mant_iiee = DB::table('brechas')
                                                    ->where('variable','Mantenimiento de IIEE')
                                                    ->avg('porcentaje');
                                                $mat_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $mat_4toprimaria = DB::table('brechas')
                                                    ->where('variable','Mat-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $pdlc = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PDLC Actualizados')
                                                    ->avg('porcentaje');
                                                $pea = DB::table('brechas')
                                                    ->where('variable','Poblacion economicante activa - PEA')
                                                    ->avg('porcentaje');
                                                $pea_ocupada = DB::table('brechas')
                                                    ->where('variable','PEA Ocupada')
                                                    ->avg('porcentaje');
                                                $pei = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PEI Actualizados')
                                                    ->avg('porcentaje');
                                                $pension_65 = DB::table('brechas')
                                                    ->where('variable','Pensión 65, usuarios')
                                                    ->avg('porcentaje');
                                                $pmi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PMI Actualizados')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_tecnica = DB::table('brechas')
                                                    ->where('variable','Población con educación técnica superior')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_universitaria = DB::table('brechas')
                                                    ->where('variable','Población con educación universitaria superior')
                                                    ->avg('porcentaje');
                                                $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: POI Actualizados')
                                                    ->avg('porcentaje');
                                                $presencia_ept = DB::table('brechas')
                                                    ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                    ->avg('porcentaje');
                                                $presencia_cetpros = DB::table('brechas')
                                                    ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                    ->avg('porcentaje');
                                                $presencia_institutos = DB::table('brechas')
                                                    ->where('variable','Presencia de Institutos de Educación Superior')
                                                    ->avg('porcentaje');
                                                $presencia_universidades = DB::table('brechas')
                                                    ->where('variable','Presencia de Universidades Total')
                                                    ->avg('porcentaje');
                                                $primaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                    ->avg('porcentaje');
                                                $ptar = DB::table('brechas')
                                                    ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                    ->avg('porcentaje');
                                                $recursos_desarrollo = DB::table('brechas')
                                                    ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                    ->avg('porcentaje');
                                                $red_vial_departamental = DB::table('brechas')
                                                    ->where('variable','Red vial departamental - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_nacional = DB::table('brechas')
                                                    ->where('variable','Red vial nacional - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_vecinal = DB::table('brechas')
                                                    ->where('variable','Red vial vecinal - Pavimentado')
                                                    ->avg('porcentaje');
                                                $salud = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                    ->avg('porcentaje');
                                                $saneamiento = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                    ->avg('porcentaje');
                                                $secundaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                    ->avg('porcentaje');
                                                $servicio_internet = DB::table('brechas')
                                                    ->where('variable','Hogares con internet')
                                                    ->avg('porcentaje');
                                                $telefonia_movil = DB::table('brechas')
                                                    ->where('variable','Hogares con telefonía celular')
                                                    ->avg('porcentaje');
                                                $transporte = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                    ->avg('porcentaje');
                                                $turistica = DB::table('brechas')
                                                    ->where('variable','Número de establecimientos de hospedaje')
                                                    ->avg('porcentaje');

                                            //calculos y operaciones
                                                $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                            echo $total_avg;
                                        }
                                    ?>
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Institucionalidad Madura</p></th>
                                <td>
                                    <p>
                                    <?php 
                                        //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                                ->where('variable','Vacunación 1ra dosis')
                                                                ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->avg('porcentaje');

                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $institucionalidad;
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->where('distrito',$distrito_nom)
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $institucionalidad;
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                    //Promedio total
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $institucionalidad;
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $institucionalidad;
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
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                        ->where('variable','Vacunación 1ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $institucionalidad;
                                            }
                                        } else {
                                            //Promedio total
                                            //variables
                                                $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->avg('porcentaje');
                                                $dosis2 = DB::table('brechas')
                                                    ->where('variable','Vacunación 2da dosis')
                                                    ->avg('porcentaje');
                                                $dosis3 = DB::table('brechas')
                                                    ->where('variable','Vacunación 3ra dosis')
                                                    ->avg('porcentaje');
                                                $acceso_salud = DB::table('brechas')
                                                    ->where('variable','Camas de Hospitalización e internamientos')
                                                    ->avg('porcentaje');
                                                $seguro_salud = DB::table('brechas')
                                                    ->where('variable','Población afiliada a algún tipo de seguro')
                                                    ->avg('porcentaje');
                                                $agropecuaria = DB::table('brechas')
                                                    ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                    ->avg('porcentaje');
                                                $agropecuario = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                    ->avg('porcentaje');
                                                $agua = DB::table('brechas')
                                                    ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $anemia = DB::table('brechas')
                                                    ->where('variable','Anemia')
                                                    ->avg('porcentaje');
                                                $bicicletas = DB::table('brechas')
                                                    ->where('variable','Bicicletas Rutas Solidarias')
                                                    ->avg('porcentaje');
                                                $cl_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $cl_4toprimaria = DB::table('brechas')
                                                    ->where('variable','CL-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $inicial = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                    ->avg('porcentaje');
                                                $climasocial = DB::table('brechas')
                                                    ->where('variable','Clima social')
                                                    ->avg('porcentaje');
                                                $dci = DB::table('brechas')
                                                    ->where('variable','Desnutrición crónica infantil')
                                                    ->avg('porcentaje');
                                                $desague = DB::table('brechas')
                                                    ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $educacion = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                    ->avg('porcentaje');
                                                $electricidad = DB::table('brechas')
                                                    ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                    ->avg('porcentaje');
                                                $esperanza = DB::table('brechas')
                                                    ->where('variable','Esperanza de vida')
                                                    ->avg('porcentaje');
                                                $gestion = DB::table('brechas')
                                                    ->where('variable','Ejecución presupuestal en inversiones')
                                                    ->avg('porcentaje');
                                                $juntos = DB::table('brechas')
                                                    ->where('variable','Juntos, hogares afiliados')
                                                    ->avg('porcentaje');
                                                $kitescolar = DB::table('brechas')
                                                    ->where('variable','Kit de higiene escolar')
                                                    ->avg('porcentaje');
                                                $localesbuenestado = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mlplazo = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mant_iiee = DB::table('brechas')
                                                    ->where('variable','Mantenimiento de IIEE')
                                                    ->avg('porcentaje');
                                                $mat_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $mat_4toprimaria = DB::table('brechas')
                                                    ->where('variable','Mat-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $pdlc = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PDLC Actualizados')
                                                    ->avg('porcentaje');
                                                $pea = DB::table('brechas')
                                                    ->where('variable','Poblacion economicante activa - PEA')
                                                    ->avg('porcentaje');
                                                $pea_ocupada = DB::table('brechas')
                                                    ->where('variable','PEA Ocupada')
                                                    ->avg('porcentaje');
                                                $pei = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PEI Actualizados')
                                                    ->avg('porcentaje');
                                                $pension_65 = DB::table('brechas')
                                                    ->where('variable','Pensión 65, usuarios')
                                                    ->avg('porcentaje');
                                                $pmi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PMI Actualizados')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_tecnica = DB::table('brechas')
                                                    ->where('variable','Población con educación técnica superior')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_universitaria = DB::table('brechas')
                                                    ->where('variable','Población con educación universitaria superior')
                                                    ->avg('porcentaje');
                                                $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: POI Actualizados')
                                                    ->avg('porcentaje');
                                                $presencia_ept = DB::table('brechas')
                                                    ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                    ->avg('porcentaje');
                                                $presencia_cetpros = DB::table('brechas')
                                                    ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                    ->avg('porcentaje');
                                                $presencia_institutos = DB::table('brechas')
                                                    ->where('variable','Presencia de Institutos de Educación Superior')
                                                    ->avg('porcentaje');
                                                $presencia_universidades = DB::table('brechas')
                                                    ->where('variable','Presencia de Universidades Total')
                                                    ->avg('porcentaje');
                                                $primaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                    ->avg('porcentaje');
                                                $ptar = DB::table('brechas')
                                                    ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                    ->avg('porcentaje');
                                                $recursos_desarrollo = DB::table('brechas')
                                                    ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                    ->avg('porcentaje');
                                                $red_vial_departamental = DB::table('brechas')
                                                    ->where('variable','Red vial departamental - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_nacional = DB::table('brechas')
                                                    ->where('variable','Red vial nacional - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_vecinal = DB::table('brechas')
                                                    ->where('variable','Red vial vecinal - Pavimentado')
                                                    ->avg('porcentaje');
                                                $salud = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                    ->avg('porcentaje');
                                                $saneamiento = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                    ->avg('porcentaje');
                                                $secundaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                    ->avg('porcentaje');
                                                $servicio_internet = DB::table('brechas')
                                                    ->where('variable','Hogares con internet')
                                                    ->avg('porcentaje');
                                                $telefonia_movil = DB::table('brechas')
                                                    ->where('variable','Hogares con telefonía celular')
                                                    ->avg('porcentaje');
                                                $transporte = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                    ->avg('porcentaje');
                                                $turistica = DB::table('brechas')
                                                    ->where('variable','Número de establecimientos de hospedaje')
                                                    ->avg('porcentaje');

                                            //calculos y operaciones
                                                $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                            echo $institucionalidad;
                                        }
                                    ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Oportunidades para las futuras generaciones</p></td>
                                <td>
                                    <p>
                                    <?php 
                                        //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                                ->where('variable','Vacunación 1ra dosis')
                                                                ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->avg('porcentaje');

                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    $educacion = ($educacion_ebr + $vida_larga_saludable)/2; 
                                                echo $educacion;
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->where('distrito',$distrito_nom)
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                        $educacion = ($educacion_ebr + $vida_larga_saludable)/2; 
                                                    echo $educacion;
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                    //Promedio total
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                        $educacion = ($educacion_ebr + $vida_larga_saludable)/2; 
                                                    echo $educacion;
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                        $educacion = ($educacion_ebr + $vida_larga_saludable)/2; 
                                                    echo $educacion;
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
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                        ->where('variable','Vacunación 1ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    $educacion = ($educacion_ebr + $vida_larga_saludable)/2; 
                                                echo $educacion;
                                            }
                                        } else {
                                            //Promedio total
                                            //variables
                                                $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->avg('porcentaje');
                                                $dosis2 = DB::table('brechas')
                                                    ->where('variable','Vacunación 2da dosis')
                                                    ->avg('porcentaje');
                                                $dosis3 = DB::table('brechas')
                                                    ->where('variable','Vacunación 3ra dosis')
                                                    ->avg('porcentaje');
                                                $acceso_salud = DB::table('brechas')
                                                    ->where('variable','Camas de Hospitalización e internamientos')
                                                    ->avg('porcentaje');
                                                $seguro_salud = DB::table('brechas')
                                                    ->where('variable','Población afiliada a algún tipo de seguro')
                                                    ->avg('porcentaje');
                                                $agropecuaria = DB::table('brechas')
                                                    ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                    ->avg('porcentaje');
                                                $agropecuario = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                    ->avg('porcentaje');
                                                $agua = DB::table('brechas')
                                                    ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $anemia = DB::table('brechas')
                                                    ->where('variable','Anemia')
                                                    ->avg('porcentaje');
                                                $bicicletas = DB::table('brechas')
                                                    ->where('variable','Bicicletas Rutas Solidarias')
                                                    ->avg('porcentaje');
                                                $cl_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $cl_4toprimaria = DB::table('brechas')
                                                    ->where('variable','CL-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $inicial = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                    ->avg('porcentaje');
                                                $climasocial = DB::table('brechas')
                                                    ->where('variable','Clima social')
                                                    ->avg('porcentaje');
                                                $dci = DB::table('brechas')
                                                    ->where('variable','Desnutrición crónica infantil')
                                                    ->avg('porcentaje');
                                                $desague = DB::table('brechas')
                                                    ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $educacion = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                    ->avg('porcentaje');
                                                $electricidad = DB::table('brechas')
                                                    ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                    ->avg('porcentaje');
                                                $esperanza = DB::table('brechas')
                                                    ->where('variable','Esperanza de vida')
                                                    ->avg('porcentaje');
                                                $gestion = DB::table('brechas')
                                                    ->where('variable','Ejecución presupuestal en inversiones')
                                                    ->avg('porcentaje');
                                                $juntos = DB::table('brechas')
                                                    ->where('variable','Juntos, hogares afiliados')
                                                    ->avg('porcentaje');
                                                $kitescolar = DB::table('brechas')
                                                    ->where('variable','Kit de higiene escolar')
                                                    ->avg('porcentaje');
                                                $localesbuenestado = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mlplazo = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mant_iiee = DB::table('brechas')
                                                    ->where('variable','Mantenimiento de IIEE')
                                                    ->avg('porcentaje');
                                                $mat_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $mat_4toprimaria = DB::table('brechas')
                                                    ->where('variable','Mat-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $pdlc = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PDLC Actualizados')
                                                    ->avg('porcentaje');
                                                $pea = DB::table('brechas')
                                                    ->where('variable','Poblacion economicante activa - PEA')
                                                    ->avg('porcentaje');
                                                $pea_ocupada = DB::table('brechas')
                                                    ->where('variable','PEA Ocupada')
                                                    ->avg('porcentaje');
                                                $pei = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PEI Actualizados')
                                                    ->avg('porcentaje');
                                                $pension_65 = DB::table('brechas')
                                                    ->where('variable','Pensión 65, usuarios')
                                                    ->avg('porcentaje');
                                                $pmi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PMI Actualizados')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_tecnica = DB::table('brechas')
                                                    ->where('variable','Población con educación técnica superior')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_universitaria = DB::table('brechas')
                                                    ->where('variable','Población con educación universitaria superior')
                                                    ->avg('porcentaje');
                                                $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: POI Actualizados')
                                                    ->avg('porcentaje');
                                                $presencia_ept = DB::table('brechas')
                                                    ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                    ->avg('porcentaje');
                                                $presencia_cetpros = DB::table('brechas')
                                                    ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                    ->avg('porcentaje');
                                                $presencia_institutos = DB::table('brechas')
                                                    ->where('variable','Presencia de Institutos de Educación Superior')
                                                    ->avg('porcentaje');
                                                $presencia_universidades = DB::table('brechas')
                                                    ->where('variable','Presencia de Universidades Total')
                                                    ->avg('porcentaje');
                                                $primaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                    ->avg('porcentaje');
                                                $ptar = DB::table('brechas')
                                                    ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                    ->avg('porcentaje');
                                                $recursos_desarrollo = DB::table('brechas')
                                                    ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                    ->avg('porcentaje');
                                                $red_vial_departamental = DB::table('brechas')
                                                    ->where('variable','Red vial departamental - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_nacional = DB::table('brechas')
                                                    ->where('variable','Red vial nacional - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_vecinal = DB::table('brechas')
                                                    ->where('variable','Red vial vecinal - Pavimentado')
                                                    ->avg('porcentaje');
                                                $salud = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                    ->avg('porcentaje');
                                                $saneamiento = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                    ->avg('porcentaje');
                                                $secundaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                    ->avg('porcentaje');
                                                $servicio_internet = DB::table('brechas')
                                                    ->where('variable','Hogares con internet')
                                                    ->avg('porcentaje');
                                                $telefonia_movil = DB::table('brechas')
                                                    ->where('variable','Hogares con telefonía celular')
                                                    ->avg('porcentaje');
                                                $transporte = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                    ->avg('porcentaje');
                                                $turistica = DB::table('brechas')
                                                    ->where('variable','Número de establecimientos de hospedaje')
                                                    ->avg('porcentaje');

                                            //calculos y operaciones
                                                $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                $educacion = ($educacion_ebr + $vida_larga_saludable)/2; 
                                            echo $educacion;
                                        }
                                    ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Infraestructura social y productiva</p></th>
                                <td>
                                    <p>
                                    <?php 
                                        //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                                ->where('variable','Vacunación 1ra dosis')
                                                                ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->avg('porcentaje');

                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    $social = ($adecuado_estado_iiee+$acceso_salud)/2;
                                                    $productiva = ($agropecuaria+$turistica+$academica)/3;
                                                    $infraestructura_social = ($social+$servicios_basicos+$productiva)/3;
                                                echo $infraestructura_social;
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->where('distrito',$distrito_nom)
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                        $social = ($adecuado_estado_iiee+$acceso_salud)/2;
                                                        $productiva = ($agropecuaria+$turistica+$academica)/3;
                                                        $infraestructura_social = ($social+$servicios_basicos+$productiva)/3;
                                                    echo $infraestructura_social;
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                    //Promedio total
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                        $social = ($adecuado_estado_iiee+$acceso_salud)/2;
                                                        $productiva = ($agropecuaria+$turistica+$academica)/3;
                                                        $infraestructura_social = ($social+$servicios_basicos+$productiva)/3;
                                                    echo $infraestructura_social;
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                        $social = ($adecuado_estado_iiee+$acceso_salud)/2;
                                                        $productiva = ($agropecuaria+$turistica+$academica)/3;
                                                        $infraestructura_social = ($social+$servicios_basicos+$productiva)/3;
                                                    echo $infraestructura_social;
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
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                        ->where('variable','Vacunación 1ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    $social = ($adecuado_estado_iiee+$acceso_salud)/2;
                                                    $productiva = ($agropecuaria+$turistica+$academica)/3;
                                                    $infraestructura_social = ($social+$servicios_basicos+$productiva)/3;
                                                echo $infraestructura_social;
                                            }
                                        } else {
                                            //Promedio total
                                            //variables
                                                $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->avg('porcentaje');
                                                $dosis2 = DB::table('brechas')
                                                    ->where('variable','Vacunación 2da dosis')
                                                    ->avg('porcentaje');
                                                $dosis3 = DB::table('brechas')
                                                    ->where('variable','Vacunación 3ra dosis')
                                                    ->avg('porcentaje');
                                                $acceso_salud = DB::table('brechas')
                                                    ->where('variable','Camas de Hospitalización e internamientos')
                                                    ->avg('porcentaje');
                                                $seguro_salud = DB::table('brechas')
                                                    ->where('variable','Población afiliada a algún tipo de seguro')
                                                    ->avg('porcentaje');
                                                $agropecuaria = DB::table('brechas')
                                                    ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                    ->avg('porcentaje');
                                                $agropecuario = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                    ->avg('porcentaje');
                                                $agua = DB::table('brechas')
                                                    ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $anemia = DB::table('brechas')
                                                    ->where('variable','Anemia')
                                                    ->avg('porcentaje');
                                                $bicicletas = DB::table('brechas')
                                                    ->where('variable','Bicicletas Rutas Solidarias')
                                                    ->avg('porcentaje');
                                                $cl_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $cl_4toprimaria = DB::table('brechas')
                                                    ->where('variable','CL-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $inicial = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                    ->avg('porcentaje');
                                                $climasocial = DB::table('brechas')
                                                    ->where('variable','Clima social')
                                                    ->avg('porcentaje');
                                                $dci = DB::table('brechas')
                                                    ->where('variable','Desnutrición crónica infantil')
                                                    ->avg('porcentaje');
                                                $desague = DB::table('brechas')
                                                    ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $educacion = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                    ->avg('porcentaje');
                                                $electricidad = DB::table('brechas')
                                                    ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                    ->avg('porcentaje');
                                                $esperanza = DB::table('brechas')
                                                    ->where('variable','Esperanza de vida')
                                                    ->avg('porcentaje');
                                                $gestion = DB::table('brechas')
                                                    ->where('variable','Ejecución presupuestal en inversiones')
                                                    ->avg('porcentaje');
                                                $juntos = DB::table('brechas')
                                                    ->where('variable','Juntos, hogares afiliados')
                                                    ->avg('porcentaje');
                                                $kitescolar = DB::table('brechas')
                                                    ->where('variable','Kit de higiene escolar')
                                                    ->avg('porcentaje');
                                                $localesbuenestado = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mlplazo = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mant_iiee = DB::table('brechas')
                                                    ->where('variable','Mantenimiento de IIEE')
                                                    ->avg('porcentaje');
                                                $mat_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $mat_4toprimaria = DB::table('brechas')
                                                    ->where('variable','Mat-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $pdlc = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PDLC Actualizados')
                                                    ->avg('porcentaje');
                                                $pea = DB::table('brechas')
                                                    ->where('variable','Poblacion economicante activa - PEA')
                                                    ->avg('porcentaje');
                                                $pea_ocupada = DB::table('brechas')
                                                    ->where('variable','PEA Ocupada')
                                                    ->avg('porcentaje');
                                                $pei = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PEI Actualizados')
                                                    ->avg('porcentaje');
                                                $pension_65 = DB::table('brechas')
                                                    ->where('variable','Pensión 65, usuarios')
                                                    ->avg('porcentaje');
                                                $pmi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PMI Actualizados')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_tecnica = DB::table('brechas')
                                                    ->where('variable','Población con educación técnica superior')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_universitaria = DB::table('brechas')
                                                    ->where('variable','Población con educación universitaria superior')
                                                    ->avg('porcentaje');
                                                $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: POI Actualizados')
                                                    ->avg('porcentaje');
                                                $presencia_ept = DB::table('brechas')
                                                    ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                    ->avg('porcentaje');
                                                $presencia_cetpros = DB::table('brechas')
                                                    ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                    ->avg('porcentaje');
                                                $presencia_institutos = DB::table('brechas')
                                                    ->where('variable','Presencia de Institutos de Educación Superior')
                                                    ->avg('porcentaje');
                                                $presencia_universidades = DB::table('brechas')
                                                    ->where('variable','Presencia de Universidades Total')
                                                    ->avg('porcentaje');
                                                $primaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                    ->avg('porcentaje');
                                                $ptar = DB::table('brechas')
                                                    ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                    ->avg('porcentaje');
                                                $recursos_desarrollo = DB::table('brechas')
                                                    ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                    ->avg('porcentaje');
                                                $red_vial_departamental = DB::table('brechas')
                                                    ->where('variable','Red vial departamental - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_nacional = DB::table('brechas')
                                                    ->where('variable','Red vial nacional - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_vecinal = DB::table('brechas')
                                                    ->where('variable','Red vial vecinal - Pavimentado')
                                                    ->avg('porcentaje');
                                                $salud = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                    ->avg('porcentaje');
                                                $saneamiento = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                    ->avg('porcentaje');
                                                $secundaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                    ->avg('porcentaje');
                                                $servicio_internet = DB::table('brechas')
                                                    ->where('variable','Hogares con internet')
                                                    ->avg('porcentaje');
                                                $telefonia_movil = DB::table('brechas')
                                                    ->where('variable','Hogares con telefonía celular')
                                                    ->avg('porcentaje');
                                                $transporte = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                    ->avg('porcentaje');
                                                $turistica = DB::table('brechas')
                                                    ->where('variable','Número de establecimientos de hospedaje')
                                                    ->avg('porcentaje');

                                            //calculos y operaciones
                                                $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                $social = ($adecuado_estado_iiee+$acceso_salud)/2;
                                                $productiva = ($agropecuaria+$turistica+$academica)/3;
                                                $infraestructura_social = ($social+$servicios_basicos+$productiva)/3;
                                            echo $infraestructura_social;
                                        }
                                    ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Emprendimiento y desarrollo econónico</p></th>
                                <td>
                                    <p>
                                    <?php 
                                        //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                                ->where('variable','Vacunación 1ra dosis')
                                                                ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->avg('porcentaje');

                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $capital_humano;
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->where('distrito',$distrito_nom)
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $capital_humano;
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                    //Promedio total
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $capital_humano;
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $capital_humano;
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
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                        ->where('variable','Vacunación 1ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $capital_humano;
                                            }
                                        } else {
                                            //Promedio total
                                            //variables
                                                $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->avg('porcentaje');
                                                $dosis2 = DB::table('brechas')
                                                    ->where('variable','Vacunación 2da dosis')
                                                    ->avg('porcentaje');
                                                $dosis3 = DB::table('brechas')
                                                    ->where('variable','Vacunación 3ra dosis')
                                                    ->avg('porcentaje');
                                                $acceso_salud = DB::table('brechas')
                                                    ->where('variable','Camas de Hospitalización e internamientos')
                                                    ->avg('porcentaje');
                                                $seguro_salud = DB::table('brechas')
                                                    ->where('variable','Población afiliada a algún tipo de seguro')
                                                    ->avg('porcentaje');
                                                $agropecuaria = DB::table('brechas')
                                                    ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                    ->avg('porcentaje');
                                                $agropecuario = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                    ->avg('porcentaje');
                                                $agua = DB::table('brechas')
                                                    ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $anemia = DB::table('brechas')
                                                    ->where('variable','Anemia')
                                                    ->avg('porcentaje');
                                                $bicicletas = DB::table('brechas')
                                                    ->where('variable','Bicicletas Rutas Solidarias')
                                                    ->avg('porcentaje');
                                                $cl_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $cl_4toprimaria = DB::table('brechas')
                                                    ->where('variable','CL-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $inicial = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                    ->avg('porcentaje');
                                                $climasocial = DB::table('brechas')
                                                    ->where('variable','Clima social')
                                                    ->avg('porcentaje');
                                                $dci = DB::table('brechas')
                                                    ->where('variable','Desnutrición crónica infantil')
                                                    ->avg('porcentaje');
                                                $desague = DB::table('brechas')
                                                    ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $educacion = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                    ->avg('porcentaje');
                                                $electricidad = DB::table('brechas')
                                                    ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                    ->avg('porcentaje');
                                                $esperanza = DB::table('brechas')
                                                    ->where('variable','Esperanza de vida')
                                                    ->avg('porcentaje');
                                                $gestion = DB::table('brechas')
                                                    ->where('variable','Ejecución presupuestal en inversiones')
                                                    ->avg('porcentaje');
                                                $juntos = DB::table('brechas')
                                                    ->where('variable','Juntos, hogares afiliados')
                                                    ->avg('porcentaje');
                                                $kitescolar = DB::table('brechas')
                                                    ->where('variable','Kit de higiene escolar')
                                                    ->avg('porcentaje');
                                                $localesbuenestado = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mlplazo = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mant_iiee = DB::table('brechas')
                                                    ->where('variable','Mantenimiento de IIEE')
                                                    ->avg('porcentaje');
                                                $mat_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $mat_4toprimaria = DB::table('brechas')
                                                    ->where('variable','Mat-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $pdlc = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PDLC Actualizados')
                                                    ->avg('porcentaje');
                                                $pea = DB::table('brechas')
                                                    ->where('variable','Poblacion economicante activa - PEA')
                                                    ->avg('porcentaje');
                                                $pea_ocupada = DB::table('brechas')
                                                    ->where('variable','PEA Ocupada')
                                                    ->avg('porcentaje');
                                                $pei = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PEI Actualizados')
                                                    ->avg('porcentaje');
                                                $pension_65 = DB::table('brechas')
                                                    ->where('variable','Pensión 65, usuarios')
                                                    ->avg('porcentaje');
                                                $pmi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PMI Actualizados')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_tecnica = DB::table('brechas')
                                                    ->where('variable','Población con educación técnica superior')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_universitaria = DB::table('brechas')
                                                    ->where('variable','Población con educación universitaria superior')
                                                    ->avg('porcentaje');
                                                $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: POI Actualizados')
                                                    ->avg('porcentaje');
                                                $presencia_ept = DB::table('brechas')
                                                    ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                    ->avg('porcentaje');
                                                $presencia_cetpros = DB::table('brechas')
                                                    ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                    ->avg('porcentaje');
                                                $presencia_institutos = DB::table('brechas')
                                                    ->where('variable','Presencia de Institutos de Educación Superior')
                                                    ->avg('porcentaje');
                                                $presencia_universidades = DB::table('brechas')
                                                    ->where('variable','Presencia de Universidades Total')
                                                    ->avg('porcentaje');
                                                $primaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                    ->avg('porcentaje');
                                                $ptar = DB::table('brechas')
                                                    ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                    ->avg('porcentaje');
                                                $recursos_desarrollo = DB::table('brechas')
                                                    ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                    ->avg('porcentaje');
                                                $red_vial_departamental = DB::table('brechas')
                                                    ->where('variable','Red vial departamental - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_nacional = DB::table('brechas')
                                                    ->where('variable','Red vial nacional - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_vecinal = DB::table('brechas')
                                                    ->where('variable','Red vial vecinal - Pavimentado')
                                                    ->avg('porcentaje');
                                                $salud = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                    ->avg('porcentaje');
                                                $saneamiento = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                    ->avg('porcentaje');
                                                $secundaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                    ->avg('porcentaje');
                                                $servicio_internet = DB::table('brechas')
                                                    ->where('variable','Hogares con internet')
                                                    ->avg('porcentaje');
                                                $telefonia_movil = DB::table('brechas')
                                                    ->where('variable','Hogares con telefonía celular')
                                                    ->avg('porcentaje');
                                                $transporte = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                    ->avg('porcentaje');
                                                $turistica = DB::table('brechas')
                                                    ->where('variable','Número de establecimientos de hospedaje')
                                                    ->avg('porcentaje');

                                            //calculos y operaciones
                                                $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                            echo $capital_humano;
                                        }
                                    ?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Emergencias</p></th>
                                <td>
                                    <p>
                                    <?php 
                                        //filtro año y distrito
                                        if (isset($_POST['location']) or isset($_POST['years'])) {
                                            //solo distrito
                                            if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                if ($_POST['location']=="AIO") {
                                                //Promedio brechas
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                                ->where('variable','Vacunación 1ra dosis')
                                                                ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->avg('porcentaje');

                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $vacunacion;
                                                } else {
                                                    //Promedio de brechas de X distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->where('distrito',$distrito_nom)
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('distrito',$distrito_nom)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $vacunacion;
                                                }
                                            //solo año
                                            } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                if ($_POST['years']=="Todos") {
                                                    //Promedio total
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                                    ->where('variable','Vacunación 1ra dosis')
                                                                    ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $vacunacion;
                                                } else {
                                                    //brechas por año
                                                    $anio = $_POST['years'];
                                                    //variables
                                                        $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis2 = DB::table('brechas')
                                                            ->where('variable','Vacunación 2da dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dosis3 = DB::table('brechas')
                                                            ->where('variable','Vacunación 3ra dosis')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $acceso_salud = DB::table('brechas')
                                                            ->where('variable','Camas de Hospitalización e internamientos')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $seguro_salud = DB::table('brechas')
                                                            ->where('variable','Población afiliada a algún tipo de seguro')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuaria = DB::table('brechas')
                                                            ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agropecuario = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $agua = DB::table('brechas')
                                                            ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $anemia = DB::table('brechas')
                                                            ->where('variable','Anemia')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $bicicletas = DB::table('brechas')
                                                            ->where('variable','Bicicletas Rutas Solidarias')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $cl_4toprimaria = DB::table('brechas')
                                                            ->where('variable','CL-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $inicial = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $climasocial = DB::table('brechas')
                                                            ->where('variable','Clima social')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $dci = DB::table('brechas')
                                                            ->where('variable','Desnutrición crónica infantil')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $desague = DB::table('brechas')
                                                            ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $educacion = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $electricidad = DB::table('brechas')
                                                            ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $esperanza = DB::table('brechas')
                                                            ->where('variable','Esperanza de vida')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $gestion = DB::table('brechas')
                                                            ->where('variable','Ejecución presupuestal en inversiones')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $juntos = DB::table('brechas')
                                                            ->where('variable','Juntos, hogares afiliados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $kitescolar = DB::table('brechas')
                                                            ->where('variable','Kit de higiene escolar')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $localesbuenestado = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mlplazo = DB::table('brechas')
                                                            ->where('variable','Locales públicos en buen estado (% del total)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mant_iiee = DB::table('brechas')
                                                            ->where('variable','Mantenimiento de IIEE')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_2dosecundaria = DB::table('brechas')
                                                            ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $mat_4toprimaria = DB::table('brechas')
                                                            ->where('variable','Mat-Satisfactorio 4To primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pdlc = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PDLC Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea = DB::table('brechas')
                                                            ->where('variable','Poblacion economicante activa - PEA')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pea_ocupada = DB::table('brechas')
                                                            ->where('variable','PEA Ocupada')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pei = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PEI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pension_65 = DB::table('brechas')
                                                            ->where('variable','Pensión 65, usuarios')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $pmi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: PMI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_tecnica = DB::table('brechas')
                                                            ->where('variable','Población con educación técnica superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_edu_universitaria = DB::table('brechas')
                                                            ->where('variable','Población con educación universitaria superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                            ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $poi = DB::table('brechas')
                                                            ->where('variable','Planeamiento: POI Actualizados')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_ept = DB::table('brechas')
                                                            ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_cetpros = DB::table('brechas')
                                                            ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_institutos = DB::table('brechas')
                                                            ->where('variable','Presencia de Institutos de Educación Superior')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $presencia_universidades = DB::table('brechas')
                                                            ->where('variable','Presencia de Universidades Total')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $primaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $ptar = DB::table('brechas')
                                                            ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $recursos_desarrollo = DB::table('brechas')
                                                            ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_departamental = DB::table('brechas')
                                                            ->where('variable','Red vial departamental - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_nacional = DB::table('brechas')
                                                            ->where('variable','Red vial nacional - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $red_vial_vecinal = DB::table('brechas')
                                                            ->where('variable','Red vial vecinal - Pavimentado')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $salud = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $saneamiento = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $secundaria = DB::table('brechas')
                                                            ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $servicio_internet = DB::table('brechas')
                                                            ->where('variable','Hogares con internet')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $telefonia_movil = DB::table('brechas')
                                                            ->where('variable','Hogares con telefonía celular')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $transporte = DB::table('brechas')
                                                            ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');
                                                        $turistica = DB::table('brechas')
                                                            ->where('variable','Número de establecimientos de hospedaje')
                                                            ->where('anio',$anio)
                                                            ->avg('porcentaje');

                                                    //calculos y operaciones
                                                        $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                        $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                        $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                        $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                        $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                        $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                        $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                        $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                        $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                        $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                        $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                        $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                        $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                        $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                        $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                        $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                        $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                        $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                        $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                        $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                        $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                        $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                        $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                        $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                    echo $vacunacion;
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
                                                //variables
                                                    $dosis1 = DB::table('brechas')
                                                        ->where('variable','Vacunación 1ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis2 = DB::table('brechas')
                                                        ->where('variable','Vacunación 2da dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dosis3 = DB::table('brechas')
                                                        ->where('variable','Vacunación 3ra dosis')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $acceso_salud = DB::table('brechas')
                                                        ->where('variable','Camas de Hospitalización e internamientos')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $seguro_salud = DB::table('brechas')
                                                        ->where('variable','Población afiliada a algún tipo de seguro')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuaria = DB::table('brechas')
                                                        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agropecuario = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $agua = DB::table('brechas')
                                                        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $anemia = DB::table('brechas')
                                                        ->where('variable','Anemia')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $bicicletas = DB::table('brechas')
                                                        ->where('variable','Bicicletas Rutas Solidarias')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $cl_4toprimaria = DB::table('brechas')
                                                        ->where('variable','CL-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $inicial = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $climasocial = DB::table('brechas')
                                                        ->where('variable','Clima social')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $dci = DB::table('brechas')
                                                        ->where('variable','Desnutrición crónica infantil')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $desague = DB::table('brechas')
                                                        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $educacion = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $electricidad = DB::table('brechas')
                                                        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $esperanza = DB::table('brechas')
                                                        ->where('variable','Esperanza de vida')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $gestion = DB::table('brechas')
                                                        ->where('variable','Ejecución presupuestal en inversiones')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $juntos = DB::table('brechas')
                                                        ->where('variable','Juntos, hogares afiliados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $kitescolar = DB::table('brechas')
                                                        ->where('variable','Kit de higiene escolar')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $localesbuenestado = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mlplazo = DB::table('brechas')
                                                        ->where('variable','Locales públicos en buen estado (% del total)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mant_iiee = DB::table('brechas')
                                                        ->where('variable','Mantenimiento de IIEE')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_2dosecundaria = DB::table('brechas')
                                                        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $mat_4toprimaria = DB::table('brechas')
                                                        ->where('variable','Mat-Satisfactorio 4To primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pdlc = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PDLC Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea = DB::table('brechas')
                                                        ->where('variable','Poblacion economicante activa - PEA')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pea_ocupada = DB::table('brechas')
                                                        ->where('variable','PEA Ocupada')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pei = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PEI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pension_65 = DB::table('brechas')
                                                        ->where('variable','Pensión 65, usuarios')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $pmi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: PMI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_tecnica = DB::table('brechas')
                                                        ->where('variable','Población con educación técnica superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_edu_universitaria = DB::table('brechas')
                                                        ->where('variable','Población con educación universitaria superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $poi = DB::table('brechas')
                                                        ->where('variable','Planeamiento: POI Actualizados')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_ept = DB::table('brechas')
                                                        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_cetpros = DB::table('brechas')
                                                        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_institutos = DB::table('brechas')
                                                        ->where('variable','Presencia de Institutos de Educación Superior')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $presencia_universidades = DB::table('brechas')
                                                        ->where('variable','Presencia de Universidades Total')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $primaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $ptar = DB::table('brechas')
                                                        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $recursos_desarrollo = DB::table('brechas')
                                                        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_departamental = DB::table('brechas')
                                                        ->where('variable','Red vial departamental - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_nacional = DB::table('brechas')
                                                        ->where('variable','Red vial nacional - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $red_vial_vecinal = DB::table('brechas')
                                                        ->where('variable','Red vial vecinal - Pavimentado')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $salud = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $saneamiento = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $secundaria = DB::table('brechas')
                                                        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $servicio_internet = DB::table('brechas')
                                                        ->where('variable','Hogares con internet')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $telefonia_movil = DB::table('brechas')
                                                        ->where('variable','Hogares con telefonía celular')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $transporte = DB::table('brechas')
                                                        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    $turistica = DB::table('brechas')
                                                        ->where('variable','Número de establecimientos de hospedaje')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                //calculos y operaciones
                                                    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                    $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                    $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                                echo $vacunacion;
                                            }
                                        } else {
                                            //Promedio total
                                            //variables
                                                $dosis1 = DB::table('brechas')
                                                            ->where('variable','Vacunación 1ra dosis')
                                                            ->avg('porcentaje');
                                                $dosis2 = DB::table('brechas')
                                                    ->where('variable','Vacunación 2da dosis')
                                                    ->avg('porcentaje');
                                                $dosis3 = DB::table('brechas')
                                                    ->where('variable','Vacunación 3ra dosis')
                                                    ->avg('porcentaje');
                                                $acceso_salud = DB::table('brechas')
                                                    ->where('variable','Camas de Hospitalización e internamientos')
                                                    ->avg('porcentaje');
                                                $seguro_salud = DB::table('brechas')
                                                    ->where('variable','Población afiliada a algún tipo de seguro')
                                                    ->avg('porcentaje');
                                                $agropecuaria = DB::table('brechas')
                                                    ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
                                                    ->avg('porcentaje');
                                                $agropecuario = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
                                                    ->avg('porcentaje');
                                                $agua = DB::table('brechas')
                                                    ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $anemia = DB::table('brechas')
                                                    ->where('variable','Anemia')
                                                    ->avg('porcentaje');
                                                $bicicletas = DB::table('brechas')
                                                    ->where('variable','Bicicletas Rutas Solidarias')
                                                    ->avg('porcentaje');
                                                $cl_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $cl_4toprimaria = DB::table('brechas')
                                                    ->where('variable','CL-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $inicial = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
                                                    ->avg('porcentaje');
                                                $climasocial = DB::table('brechas')
                                                    ->where('variable','Clima social')
                                                    ->avg('porcentaje');
                                                $dci = DB::table('brechas')
                                                    ->where('variable','Desnutrición crónica infantil')
                                                    ->avg('porcentaje');
                                                $desague = DB::table('brechas')
                                                    ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
                                                    ->avg('porcentaje');
                                                $educacion = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
                                                    ->avg('porcentaje');
                                                $electricidad = DB::table('brechas')
                                                    ->where('variable','Viviendas con alumbrado eléctrico por red pública')
                                                    ->avg('porcentaje');
                                                $esperanza = DB::table('brechas')
                                                    ->where('variable','Esperanza de vida')
                                                    ->avg('porcentaje');
                                                $gestion = DB::table('brechas')
                                                    ->where('variable','Ejecución presupuestal en inversiones')
                                                    ->avg('porcentaje');
                                                $juntos = DB::table('brechas')
                                                    ->where('variable','Juntos, hogares afiliados')
                                                    ->avg('porcentaje');
                                                $kitescolar = DB::table('brechas')
                                                    ->where('variable','Kit de higiene escolar')
                                                    ->avg('porcentaje');
                                                $localesbuenestado = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mlplazo = DB::table('brechas')
                                                    ->where('variable','Locales públicos en buen estado (% del total)')
                                                    ->avg('porcentaje');
                                                $mant_iiee = DB::table('brechas')
                                                    ->where('variable','Mantenimiento de IIEE')
                                                    ->avg('porcentaje');
                                                $mat_2dosecundaria = DB::table('brechas')
                                                    ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
                                                    ->avg('porcentaje');
                                                $mat_4toprimaria = DB::table('brechas')
                                                    ->where('variable','Mat-Satisfactorio 4To primaria')
                                                    ->avg('porcentaje');
                                                $pdlc = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PDLC Actualizados')
                                                    ->avg('porcentaje');
                                                $pea = DB::table('brechas')
                                                    ->where('variable','Poblacion economicante activa - PEA')
                                                    ->avg('porcentaje');
                                                $pea_ocupada = DB::table('brechas')
                                                    ->where('variable','PEA Ocupada')
                                                    ->avg('porcentaje');
                                                $pei = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PEI Actualizados')
                                                    ->avg('porcentaje');
                                                $pension_65 = DB::table('brechas')
                                                    ->where('variable','Pensión 65, usuarios')
                                                    ->avg('porcentaje');
                                                $pmi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: PMI Actualizados')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_tecnica = DB::table('brechas')
                                                    ->where('variable','Población con educación técnica superior')
                                                    ->avg('porcentaje');
                                                $poblacion_edu_universitaria = DB::table('brechas')
                                                    ->where('variable','Población con educación universitaria superior')
                                                    ->avg('porcentaje');
                                                $poblacion_rural_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poblacion_urbana_edu_17_20 = DB::table('brechas')
                                                    ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
                                                    ->avg('porcentaje');
                                                $poi = DB::table('brechas')
                                                    ->where('variable','Planeamiento: POI Actualizados')
                                                    ->avg('porcentaje');
                                                $presencia_ept = DB::table('brechas')
                                                    ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
                                                    ->avg('porcentaje');
                                                $presencia_cetpros = DB::table('brechas')
                                                    ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
                                                    ->avg('porcentaje');
                                                $presencia_institutos = DB::table('brechas')
                                                    ->where('variable','Presencia de Institutos de Educación Superior')
                                                    ->avg('porcentaje');
                                                $presencia_universidades = DB::table('brechas')
                                                    ->where('variable','Presencia de Universidades Total')
                                                    ->avg('porcentaje');
                                                $primaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
                                                    ->avg('porcentaje');
                                                $ptar = DB::table('brechas')
                                                    ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
                                                    ->avg('porcentaje');
                                                $recursos_desarrollo = DB::table('brechas')
                                                    ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
                                                    ->avg('porcentaje');
                                                $red_vial_departamental = DB::table('brechas')
                                                    ->where('variable','Red vial departamental - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_nacional = DB::table('brechas')
                                                    ->where('variable','Red vial nacional - Pavimentado')
                                                    ->avg('porcentaje');
                                                $red_vial_vecinal = DB::table('brechas')
                                                    ->where('variable','Red vial vecinal - Pavimentado')
                                                    ->avg('porcentaje');
                                                $salud = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
                                                    ->avg('porcentaje');
                                                $saneamiento = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
                                                    ->avg('porcentaje');
                                                $secundaria = DB::table('brechas')
                                                    ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
                                                    ->avg('porcentaje');
                                                $servicio_internet = DB::table('brechas')
                                                    ->where('variable','Hogares con internet')
                                                    ->avg('porcentaje');
                                                $telefonia_movil = DB::table('brechas')
                                                    ->where('variable','Hogares con telefonía celular')
                                                    ->avg('porcentaje');
                                                $transporte = DB::table('brechas')
                                                    ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
                                                    ->avg('porcentaje');
                                                $turistica = DB::table('brechas')
                                                    ->where('variable','Número de establecimientos de hospedaje')
                                                    ->avg('porcentaje');

                                            //calculos y operaciones
                                                $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
                                                $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;
                                                $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;
                                                $acceso_educacion = ($inicial+$primaria+$secundaria)/3;
                                                $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;
                                                $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);
                                                $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;
                                                $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;
                                                $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;
                                                $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;
                                                $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;
                                                $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;
                                                $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;
                                                $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;
                                                $infraestructura = ($infraestructura_potencialidades+$academica)/2;
                                                $tranferencias_monetarias = ($juntos+$pension_65)/2;
                                                $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;
                                                $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;
                                                $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;
                                                $vacunacion = ($dosis1+$dosis2+$dosis3)/3;
                                                $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;
                                                $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;
                                                $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;
                                                $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
                                            echo $vacunacion;
                                        }
                                    ?>
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
                            <h4>
                                @php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total de brecha financiera
                                            $financiera = DB::table('brecha_financiera')
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            } else {
                                                //Brecha financiera por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $financiera = DB::table('brecha_financiera')
                                                    ->where('distrito',$distrito_nom)
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $financiera = DB::table('brecha_financiera')
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $financiera = DB::table('brecha_financiera')
                                                    ->where('anio',$anio)
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
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
                                            $financiera = DB::table('brecha_financiera')
                                                    ->where($query)
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                        }
                                    } else {
                                        //Total de brecha financiera
                                        $financiera = DB::table('brecha_financiera')
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                    }
                                @endphp
                            </h4>
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
                                <select id="location" name="location" class="select">
                                    <option value="AIO">AIO</option>
                                    <optgroup label="UGT Huallanca">
                                        @foreach ($ugt_huall as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="UGT Huarmey">
                                        @foreach ($ugt_huarmey as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="UGT Mina / San Marcos">
                                        @foreach ($ugt_mina as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="UGT Valle Fortaleza">
                                        @foreach ($ugt_valle as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <label for="years" class="mt-3">Años</label>
                                <select name="years" id="yrs">
                                    <option value="Todos">Todos</option>
                                    <option value="2021" <?php if (isset($_POST['years'])){ if($_POST['years']=="2021") echo 'selected';}?> >2021</option>
                                    <option value="2022" <?php if (isset($_POST['years'])){ if($_POST['years']=="2022") echo 'selected';}?> >2022</option>
                                    <option value="2023" <?php if (isset($_POST['years'])){ if($_POST['years']=="2023") echo 'selected';}?> >2023</option>
                                    <option value="2024" <?php if (isset($_POST['years'])){ if($_POST['years']=="2024") echo 'selected';}?> >2024</option>
                                    <option value="2025" <?php if (isset($_POST['years'])){ if($_POST['years']=="2025") echo 'selected';}?> >2025</option>
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