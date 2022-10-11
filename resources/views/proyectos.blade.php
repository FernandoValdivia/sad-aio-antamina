<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta content="Sistema de Administración del Desarrollo - Proyectos" name="description">

    <meta content="" name="keywords">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="/img/logo-icon.png" rel="icon">

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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Chat whatsapp --}}
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <!-- Mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/> 
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    {{-- Logo --}}
                    <div class="row m-4 divlogo">
                        {{-- <div class="col-3 logo">
                            <img class="img-logo" src="/img/logo-navbar2.png" alt="logoccd">
                            <p>CENTRO PARA</p>
                            <p>LA COMPETITIVIDAD</p>
                            <p>Y EL DESARROLLO</p>
                        </div>
                        <div class="col-9">
                            <p> SAD AIO Antamina</p>
                        </div> --}}
                        <img src="/img/logo-sad.png" alt="Logo SAD" class="img-fluid">
                    </div>
                    {{-- End Logo --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="/" class="nav-item nav-link">Home</a>
                        <a href="/resumen" class="nav-item nav-link">Resumen</a>
                        <a href="/brechas" class="nav-item nav-link">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link active">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-1 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Proyectos</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/resumen" class="aactiva">Resumen</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Proyectos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Proyectos Start -->
        <div class="container-xxl py-5">
            <div class="container-fluid" id="container-proy">
                <div class="row g-5 align-items-center">
                    <div class="row text-center">
                        <h3>Proyectos para el cierre de brechas y puesta en valor las potencialidades</h3>
                        <p>(Descripción)</p>
                    </div>
                    <div class="row ptop" id="proy-card">
                        <!-- Filtros -->
                        <div class="row pt-3">
                            <form action="/proyectos" method="post">
                                @csrf
                                {{-- Unidad territorial --}}
                                <div class="col-2">
                                    <div class="row"  id="select-location">
                                    <label id="label" for="location">Unidad territorial</label>
                                    <select id="location" name="location" class="select">
                                        <option value="AIO" class="optgroup-ut">AIO</option>
                                        <option value="-9.96885060854611,-77.09381103515626,UGT Huallanca" class="optgroup-ut" <?php if (isset($_POST['location'])){ if($_POST['location']=="-9.96885060854611,-77.09381103515626,UGT Huallanca") echo 'selected';}?>>UGT Huallanca</option>
                                            @foreach ($ugt_huall as $ugt)
                                            @php
                                                $value = $ugt->coords.",".$ugt->distrito;
                                            @endphp
                                            <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                            @endforeach
                                        <option value="-10.072642780669092,-78.14849853515626,UGT Huarmey" class="optgroup-ut" <?php if (isset($_POST['location'])){ if($_POST['location']=='-10.072642780669092,-78.14849853515626,UGT Huarmey') echo 'selected';}?>>UGT Huarmey</option>
                                            @foreach ($ugt_huarmey as $ugt)
                                            @php
                                                $value = $ugt->coords.",".$ugt->distrito;
                                            @endphp
                                            <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                            @endforeach
                                        <option value="-9.522205574667476,-77.16384887695314,UGT Mina / San Marcos" class="optgroup-ut" <?php if (isset($_POST['location'])){ if($_POST['location']=='-9.522205574667476,-77.16384887695314,UGT Mina / San Marcos') echo 'selected';}?>>UGT Mina / San Marcos</option>
                                            @foreach ($ugt_mina as $ugt)
                                            @php
                                                $value = $ugt->coords.",".$ugt->distrito;
                                            @endphp
                                            <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                            @endforeach
                                        <option value="-10.451350331922376,-77.72140502929688,UGT Valle Fortaleza" class="optgroup-ut" <?php if (isset($_POST['location'])){ if($_POST['location']=='-10.451350331922376,-77.72140502929688,UGT Valle Fortaleza') echo 'selected';}?>>UGT Valle Fortaleza</option>
                                            @foreach ($ugt_valle as $ugt)
                                            @php
                                                $value = $ugt->coords.",".$ugt->distrito;
                                            @endphp
                                            <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                            @endforeach
                                    </select>
                                    </div> 
                                </div>
                                {{-- Time frame --}}
                                <div class="col-2">
                                    <div class="row">
                                        <label id="label" for="time_frame">Time frame</label>
                                        <select id="time_frame" name="time_frame">
                                            <option value="Todos">Todos</option>
                                            <option value="Short Term" <?php if (isset($_POST['time_frame'])){ if($_POST['time_frame']=="Short Term") echo 'selected';}?>>Short Term</option>
                                            <option value="Medium Term" <?php if (isset($_POST['time_frame'])){ if($_POST['time_frame']=="Medium Term") echo 'selected';}?>>Medium Term</option>
                                            <option value="Long Term" <?php if (isset($_POST['time_frame'])){ if($_POST['time_frame']=="Long Term") echo 'selected';}?>>Long Term</option>
                                        </select>
                                    </div> 
                                </div>
                                {{-- Pilar --}}
                                <div class="col-2">
                                    <div class="row">
                                        <label id="label" for="factores">Pilar</label>
                                        <select id="factores" name="factores">
                                            <option value="Todos">Todos</option>
                                            <option value="Emprendimiento  y desarrollo económico" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Emprendimiento  y desarrollo económico") echo 'selected';}?>>Emprendimiento  y desarrollo económico</option>
                                            <option value="Infraestructura social productivo" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Infraestructura social productivo") echo 'selected';}?>>Infraestructura social productivo</option>
                                            <option value="Institucionalidad Madura" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Institucionalidad Madura") echo 'selected';}?>>Institucionalidad Madura</option>
                                            <option value="Oportunidades para las futuras generaciones" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Oportunidades para las futuras generaciones") echo 'selected';}?>>Oportunidades para las futuras generaciones</option>
                                        </select>
                                    </div> 
                                </div>
                                {{-- Modalidad de intervención --}}
                                <div class="col-2">
                                    <div class="row">
                                        <label id="label" for="modalidad">Modalidad de intervención</label>
                                        <select id="modalidad" name="modalidad">
                                            <option value="Todas">Todas</option>
                                            <option value="Inversión Pública (GL/GR/GN)" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Pública (GL/GR/GN)") echo 'selected';}?>>Inversión Pública (GL/GR/GN)</option>
                                            <option value="Inversión Social Directa Antamina: CAPEX" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Directa Antamina: CAPEX") echo 'selected';}?>>Inversión Social Directa Antamina: CAPEX</option>
                                            <option value="Inversión Social Directa Antamina: OPEX" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Directa Antamina: OPEX") echo 'selected';}?>>Inversión Social Directa Antamina: OPEX</option>
                                            <option value="Inversión Social Gestión Pública y Privada(Obras por impuesto)" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Gestión Pública y Privada(Obras por impuesto)") echo 'selected';}?>>Inversión Social Gestión Pública y Privada(Obras por impuesto)</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Año --}}
                                <div class="col-2">
                                    <div class="row">
                                        <label id="label" for="year">Año</label>
                                        <select id="year" name="year">
                                            <option value="Todos">Todos</option>
                                            <option value="2020" <?php if(isset($_POST['year'])){ if($_POST['year']=="2020") echo 'selected';}?>>2020</option>
                                            <option value="2021" <?php if(isset($_POST['year'])){ if($_POST['year']=="2021") echo 'selected';}?>>2021</option>
                                            <option value="2022" <?php if(isset($_POST['year'])){ if($_POST['year']=="2022") echo 'selected';}?>>2022</option>
                                            <option value="2023" <?php if(isset($_POST['year'])){ if($_POST['year']=="2023") echo 'selected';}?>>2023</option>
                                            <option value="2024" <?php if(isset($_POST['year'])){ if($_POST['year']=="2024") echo 'selected';}?>>2024</option>
                                            <option value="2026" <?php if(isset($_POST['year'])){ if($_POST['year']=="2026") echo 'selected';}?>>2026</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Botón filtrar --}}
                                <div class="col-2">
                                    <div class="row mt-2">
                                        <input type="submit" value="Filtrar">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row mt-4 mb-3" id="card-map-info">
                            <!-- Mapa -->
                            <div class="row" id="mapproy"></div>
                            <!-- Tarjetas de cantidad y monto -->
                            <div class="row" id="row-card">
                                {{-- Cantidad de proyectos --}}
                                <div class="row" id="card-info">
                                    <h2>
                                        <?php
                                            function queryUnidadTerritorial($unidadt)
                                            {
                                                if ($unidadt!='AIO' and $unidadt!='UGT Huallanca' and $unidadt!='UGT Mina / San Marcos' and $unidadt!='UGT Valle Fortaleza' and $unidadt!='UGT Huarmey') {
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
                                                if ($timef!='Todos') {
                                                    $query = ['time_frame' => $timef];
                                                    return $query;
                                                } else {
                                                    return null;
                                                }
                                            }

                                            function queryFactor($fact)
                                            {
                                                if ($fact!='Todos') {
                                                    $query = ['factores' => $fact];
                                                    return $query;
                                                } else {
                                                    return null;
                                                }
                                            }

                                            function queryModalidad($tipodei)
                                            {
                                                if ($tipodei!='Todas') {
                                                    $query = ['tipo_de_inversion' => $tipodei];
                                                    return $query;
                                                } else {
                                                    return null;
                                                }
                                            }

                                            function queryAnio($qanio)
                                            {
                                                if ($qanio!='Todos') {
                                                    $query = ['anio' => $qanio];
                                                    return $query;
                                                } else {
                                                    return null;
                                                }
                                            }

                                            if (isset($_POST['time_frame']) || isset($_POST['location']) || isset($_POST['factores']) || isset($_POST['modalidad'])|| isset($_POST['year'])) {

                                                $location = $_POST['location'];

                                                if ($location!='AIO' and $location!='UGT Huallanca' and $location!='UGT Mina / San Marcos' and $location!='UGT Valle Fortaleza' and $location!='UGT Huarmey') {
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
                                                $anio = $_POST['year']; // año

                                                $cant = DB::table('proyectos')
                                                                ->where(queryUnidadTerritorial($distrito_nom))
                                                                ->where(queryTimeFrame($timeframe))
                                                                ->where(queryFactor($factor))
                                                                ->where(queryModalidad($modalidad))
                                                                ->where(queryAnio($anio))
                                                                ->count('producto_proyecto');
                                                                echo $cant;
                                                
                                                //Filtrar pines
                                                $proyectos = DB::table('proyectos')->select(
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
                                                $cant = DB::table('proyectos')
                                                        ->count();
                                                        echo $cant;
                                            }
                                        ?>
                                    </h2>
                                    <h5>Cantidad de proyectos <sup>1/</sup></h5>
                                </div>
                                {{-- Monto actualizado --}}
                                <div class="row mt-1 pt-3" id="card-info">
                                    <h2>
                                        <?php
                                            if (isset($_POST['time_frame']) or isset($_POST['location']) or isset($_POST['factores']) or isset($_POST['modalidad'])or isset($_POST['year'])) {

                                                $location = $_POST['location'];

                                                if ($location == 'AIO') {
                                                    $distrito_nom = 'AIO';
                                                } else {
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                }

                                                //distrito
                                                $timeframe = $_POST['time_frame']; // time frame
                                                $factor = $_POST['factores']; // factor
                                                $modalidad = $_POST['modalidad']; // modalidad
                                                $anio = $_POST['year']; // año

                                                $cant = DB::table('proyectos')
                                                                ->where(queryUnidadTerritorial($distrito_nom))
                                                                ->where(queryTimeFrame($timeframe))
                                                                ->where(queryFactor($factor))
                                                                ->where(queryModalidad($modalidad))
                                                                ->where(queryAnio($anio))
                                                                ->sum('monto_actualizado');
                                                                echo number_format($cant);
                                            } else {
                                                //Obtener el monto total
                                                $cant = DB::table('proyectos')
                                                        ->sum('monto_actualizado');
                                                        echo number_format($cant);
                                            }
                                        ?>
                                    </h2>
                                    <h5>Monto actualizado</h5>
                                    <small>(S/ millones)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><b>Nota:</b> Short Term: 2022 / Medium Term: 2023 / Long Term: al 2026</p>
                    <p class="ptop"><sup>1/</sup> Proyectos y/o intervenciones</p>
                    <hr>
                    {{-- <a href="#" class="btn-flotante">PDF 1</a>
                    <a href="#" class="btn-flotante2">PDF 2</a> --}}
                    <!--
                    <div class="row text-center">
                        <h3>Cierre de brechas</h3>
                        <p>(S/ millones)</p>
                        <div class="row text-center">
                            <form action="#"  class="end-form">
                                @csrf
                                {{-- Unidad territorial --}}
                                <div class="col-3">
                                    <div class="row"  id="select-location">
                                    <label id="label" for="location">Unidad territorial</label>
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
                                    </div> 
                                </div>
                                {{-- Modalidad de intervención --}}
                                <div class="col-3">
                                    <div class="row">
                                        <label id="label" for="modalidad2">Modalidad de intervención</label>
                                        <select id="modalidad" name="modalidad2">
                                            <option value="Todas">Todas</option>
                                            <option value="Inversión Pública (GL/GR/GN)" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Pública (GL/GR/GN)") echo 'selected';}?>>Inversión Pública (GL/GR/GN)</option>
                                            <option value="Inversión Social Directa Antamina: CAPEX" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Directa Antamina: CAPEX") echo 'selected';}?>>Inversión Social Directa Antamina: CAPEX</option>
                                            <option value="Inversión Social Directa Antamina: OPEX" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Directa Antamina: OPEX") echo 'selected';}?>>Inversión Social Directa Antamina: OPEX</option>
                                            <option value="Inversión Social Gestión Pública y Privada(Obras por impuesto)" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Gestión Pública y Privada(Obras por impuesto)") echo 'selected';}?>>Inversión Social Gestión Pública y Privada(Obras por impuesto)</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- Proyecto --}}
                                <div class="col-3">
                                    <div class="row">
                                        <label id="label" for="proyectos">Proyectos</label>
                                        <select id="proyectos" name="proyectos">
                                            <option value="Todos">Todos</option>
                                            @foreach ($proyectos as $p)
                                            <option value="{{ $p->producto_proyecto }}" <?php if (isset($_POST['proyectos'])){ if($_POST['proyectos']==$value) echo 'selected';}?>>{{ $p->producto_proyecto }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Botón filtrar --}}
                                <div class="col-3">
                                    <div class="row mt-2">
                                        <input class="graph-btn" type="button" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row pt-5">
                            <div class="col-4">
                                <canvas id="chartIndicador" height="350"></canvas>
                            </div>
                            <div class="col-4">
                                <canvas id="chartDistrito" height="350"></canvas>
                            </div>
                            <div class="col-4">
                                <canvas id="chartAIO" height="350"></canvas>
                            </div>
                        </div>
                        
                    </div>
                    <hr> -->
                    <div class="row dwnld-div">
                        <a href="/descargar-proyectos">
                            <svg class="dwnld-re" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" fill="#FFF" stroke-miterlimit="10" stroke-width="2">
                                <path stroke="#979593" d="M67.1716,7H27c-1.1046,0-2,0.8954-2,2v78 c0,1.1046,0.8954,2,2,2h58c1.1046,0,2-0.8954,2-2V26.8284c0-0.5304-0.2107-1.0391-0.5858-1.4142L68.5858,7.5858 C68.2107,7.2107,67.702,7,67.1716,7z"/>
                                <path fill="none" stroke="#979593" d="M67,7v18c0,1.1046,0.8954,2,2,2h18"/>
                                <path fill="#C8C6C4" d="M51 61H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 60.5523 51.5523 61 51 61zM51 55H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 54.5523 51.5523 55 51 55zM51 49H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 48.5523 51.5523 49 51 49zM51 43H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 42.5523 51.5523 43 51 43zM51 67H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 66.5523 51.5523 67 51 67zM79 61H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 60.5523 79.5523 61 79 61zM79 67H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 66.5523 79.5523 67 79 67zM79 55H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 54.5523 79.5523 55 79 55zM79 49H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 48.5523 79.5523 49 79 49zM79 43H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 42.5523 79.5523 43 79 43zM65 61H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 60.5523 65.5523 61 65 61zM65 67H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 66.5523 65.5523 67 65 67zM65 55H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 54.5523 65.5523 55 65 55zM65 49H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 48.5523 65.5523 49 65 49zM65 43H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 42.5523 65.5523 43 65 43z"/>
                                <path fill="#107C41" d="M12,74h32c2.2091,0,4-1.7909,4-4V38c0-2.2091-1.7909-4-4-4H12c-2.2091,0-4,1.7909-4,4v32 C8,72.2091,9.7909,74,12,74z"/>
                                <path d="M16.9492,66l7.8848-12.0337L17.6123,42h5.8115l3.9424,7.6486c0.3623,0.7252,0.6113,1.2668,0.7471,1.6236 h0.0508c0.2617-0.58,0.5332-1.1436,0.8164-1.69L33.1943,42h5.335l-7.4082,11.9L38.7168,66H33.041l-4.5537-8.4017 c-0.1924-0.3116-0.374-0.6858-0.5439-1.1215H27.876c-0.0791,0.2684-0.2549,0.631-0.5264,1.0878L22.6592,66H16.9492z"/>
                            </svg>
                            Descargar data
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Proyectos End -->

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
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>melissa.sanchez@competitividadccd.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Centro-para-la-Competitividad-y-el-Desarrollo-CCD-151040740434523?_rdc=1&_rdr"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://api.whatsapp.com/send?phone=51922753771"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/centro-para-la-competitividad-y-el-desarrollo-434799214/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href="mailto:melissa.sanchez@competitividadccd.com"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">CCD</a>, Todos los derechos reservados. 
							Desarrollado por <a class="border-bottom" href="https://fernandovaldivia.github.io/about-me/" target="_blank">LValdivia</a> & <a class="border-bottom" href="https://ivanoscco.wixsite.com/my-site" target="_blank">IOscco</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    {{-- Chat Whatsapp --}}
    <a href="https://api.whatsapp.com/send?phone=51922753771&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20SAD." class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>
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
    <script src="{{ asset('js/map-proy.js')  }}"></script>

    {{-- Markers --}}
    <?php
        $num = 0;
        //Función para saber el tipo de time_frame para el marcador 
        function markerType($type)
        {
            switch ($type) {
                case "First Engagement":
                    return 1;
                    break;
                case "Short Term":
                    return 2;
                    break;
                case "Medium Term":
                    return 3;
                    break;
                case "Long Term":
                    return 4;
                    break;
                default:
                    return 0;
                    break;
            }
        }

        //Bucle para colocar marcadores en el mapa según el time_frame
        foreach ($proyectos as $proy) {
            $p = '['.$proy->latitud.','.$proy->longitud.']';
            echo '<script type="text/javascript">',
                'var marker',
                $num,
                ' = L.marker(',
                $p,
                ',{icon:marker',
                markerType($proy->time_frame),
                '}).addTo(mapp).bindPopup("<strong>Time frame: </strong>',
                    $proy->time_frame,
                    '</br><strong>Distrito: </strong>',
                    $proy->distrito,
                    '</br><strong>Monto Actualizado (S/ millones): </strong>',
                    number_format($proy->monto_actualizado,2),
                    '</br><strong>Fecha de conclusión: </strong>',
                    $proy->conclusion,
                    '</br><strong>Proyecto: </strong>',
                    $proy->producto_proyecto,
                    '");',
                '</script>';
            $num = $num + $num;
        }
    ?>

    <!--
    <script type="text/javascript">
    Chart.defaults.global.defaultFontFamily = "Calibri";
    Chart.defaults.global.defaultFontSize = 14;
    /* Chart Indicador */
        var indicadorCanvas = document.getElementById("chartIndicador");

        var indicadorData = {
            data: [43, 35],
            backgroundColor: '#fe0000',
        };

        var barOptions1 = {
            responsive: true,
            title: {
                display: true,
                text: 'Indicador',
                position: 'top',
                fontStyle: 'bold',
                fontColor: '#000',
                fontFamily: 'Calibri',
                fontSize: 18
            },
            legend: {
                display: false
            },
            animation: {
                onComplete: function() {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                    
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.fontWeight = 100;

                    this.data.datasets.forEach(function(dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            var data = dataset.data[index];
                            ctx.fillStyle = "#fe0000";
                            var dataString = parseFloat(Math.round(dataset.data[index].toString() * 100) / 100).toFixed(1)
                            ctx.fillText(dataString, bar._model.x, bar._model.y + 1);
                        });
                    });
                }
            },
            scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
            };

        var barChart1 = new Chart(indicadorCanvas, {
            type: 'bar',
            data: {
                labels: ["2T 2022", "3T 2023"],
                datasets: [indicadorData]
            },
            options: barOptions1
        });

    /* Chart Distrito */
        var distritoCanvas = document.getElementById("chartDistrito");

        var distritoData = {
            data: [35, 30],
            backgroundColor: '#fe0000',
        };

        var barOptions2 = {
            responsive: true,
            title: {
                display: true,
                text: 'Distrito',
                position: 'top',
                fontStyle: 'bold',
                fontColor: '#000',
                fontFamily: 'Calibri',
                fontSize: 18
            },
            legend: {
                display: false
            },
            animation: {
                onComplete: function() {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                    
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.fontWeight = 100;

                    this.data.datasets.forEach(function(dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            var data = dataset.data[index];
                            ctx.fillStyle = "#fe0000";
                            var dataString = parseFloat(Math.round(dataset.data[index].toString() * 100) / 100).toFixed(1)
                            ctx.fillText(dataString, bar._model.x, bar._model.y + 1);
                        });
                    });
                }
            },
            scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
            };

        var barChart2 = new Chart(distritoCanvas, {
            type: 'bar',
            data: {
                labels: ["2T 2022", "3T 2023"],
                datasets: [distritoData]
            },
            options: barOptions2
        });
    /* Chart AIO */
        var aioCanvas = document.getElementById("chartAIO");

        var aioData = {
            data: [48, 40],
            backgroundColor: '#fe0000',
        };

        var barOptions3 = {
            responsive: true,
            title: {
                display: true,
                text: 'AIO',
                position: 'top',
                fontStyle: 'bold',
                fontColor: '#000',
                fontFamily: 'Calibri',
                fontSize: 18
            },
            legend: {
                display: false
            },
            animation: {
                onComplete: function() {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                    
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
                    ctx.fontWeight = 100;

                    this.data.datasets.forEach(function(dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            var data = dataset.data[index];
                            ctx.fillStyle = "#fe0000";
                            var dataString = parseFloat(Math.round(dataset.data[index].toString() * 100) / 100).toFixed(1)
                            ctx.fillText(dataString, bar._model.x, bar._model.y + 1);
                        });
                    });
                }
            },
            scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            ticks: {
                                beginAtZero: true
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
            };

        var barChart3 = new Chart(aioCanvas, {
            type: 'bar',
            data: {
                labels: ["2T 2022", "3T 2023"],
                datasets: [aioData]
            },
            options: barOptions3
        });
    </script>
    -->

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script type="text/javascript">
        var botmanWidget = {
            frameEndpoint: 'chat.html',
            headerTextColor: '#fff',
            bubbleAvatarUrl: '/img/botlogo.png',
            title: 'Chatea con nosotros!',
            introMessage: "✋ Hola, ¿En que te podemos ayudar?",
            aboutText: 'Powered by LFValdivia',
            aboutLink: 'https://fernandovaldivia.github.io/about-me/',
            placeholderText: 'Escribe un mensaje...',
            mainColor: '#0F172B',
            bubbleBackground: '#0F172B',
            mobileHeight: '100%',
            mobileWidth: '100%'
        };
    </script>
</body>
</html>