<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Proyectos</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta content="SAD AIO - Proyectos" name="description">

    <meta content="" name="keywords">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="/img/logo-sad.svg" rel="icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    {{-- BOXICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

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
    <div class="container-xxl p-0">
        @extends('layouts.navbar')
        <!-- Proyectos Start -->
        <div class="container-xxl">
            <div class="container-fluid-py" id="container-proy">
                <div class="g-4 align-items-center justify-content">
                    <div class="text-center">
                        <h3 id="titulo">Cartera de proyectos para el cierre de brechas y puesta en valor las potencialidades</h3>
                        <p>(Descripción)</p>
                    </div>
                    <div class="contenedor-esquema" id="proy-card">
                        <!-- Filtros -->
                        <form action="/proyectos" method="post" id="card-filters">
                            @csrf
                            {{-- Unidad territorial --}}
                            <div class="width-filter">
                                <div id="select-location">
                                <label for="location">Unidad territorial</label>
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
                            {{-- Periodo de Tiempo --}}
                            <div class="width-filter">
                                <label for="time_frame">Periodo de Tiempo</label>
                                <select id="time_frame" name="time_frame">
                                    <option value="Todos">Todos</option>
                                    <option value="Corto Plazo" <?php if (isset($_POST['time_frame'])){ if($_POST['time_frame']=="Corto Plazo") echo 'selected';}?>>Corto Plazo</option>
                                    <option value="Mediano Plazo" <?php if (isset($_POST['time_frame'])){ if($_POST['time_frame']=="Mediano Plazo") echo 'selected';}?>>Mediano Plazo</option>
                                    <option value="Largo Plazo" <?php if (isset($_POST['time_frame'])){ if($_POST['time_frame']=="Largo Plazo") echo 'selected';}?>>Largo Plazo</option>
                                </select>
                            </div> 
                            {{-- Pilar --}}
                            <div class="width-filter">
                                <label for="factores">Pilar</label>
                                <select id="factores" name="factores">
                                    <option value="Todos">Todos</option>
                                    <option value="Emprendimiento  y desarrollo económico" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Emprendimiento  y desarrollo económico") echo 'selected';}?>>Emprendimiento  y desarrollo económico</option>
                                    <option value="Infraestructura social productivo" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Infraestructura social productivo") echo 'selected';}?>>Infraestructura social productivo</option>
                                    <option value="Institucionalidad Madura" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Institucionalidad Madura") echo 'selected';}?>>Institucionalidad Madura</option>
                                    <option value="Oportunidades para las futuras generaciones" <?php if (isset($_POST['factores'])){ if($_POST['factores']=="Oportunidades para las futuras generaciones") echo 'selected';}?>>Oportunidades para las futuras generaciones</option>
                                </select>
                            </div> 
                            {{-- Modalidad de intervención --}}
                            <div class="width-filter">
                                <label for="modalidad">Modalidad de inversión</label>
                                <select id="modalidad" name="modalidad">
                                    <option value="Todas">Todas</option>
                                    <option value="Inversión Pública (GL/GR/GN)" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Pública (GL/GR/GN)") echo 'selected';}?>>Inversión Pública (GL/GR/GN)</option>
                                    <option value="Inversión Social Directa Antamina: CAPEX" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Directa Antamina: CAPEX") echo 'selected';}?>>Inversión Social Directa Antamina: CAPEX</option>
                                    <option value="Inversión Social Directa Antamina: OPEX" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Directa Antamina: OPEX") echo 'selected';}?>>Inversión Social Directa Antamina: OPEX</option>
                                    <option value="Inversión Social Gestión Pública y Privada(Obras por impuesto)" <?php if (isset($_POST['modalidad'])){ if($_POST['modalidad']=="Inversión Social Gestión Pública y Privada(Obras por impuesto)") echo 'selected';}?>>Inversión Social Gestión Pública y Privada(Obras por impuesto)</option>
                                </select>
                            </div>
                            {{-- Periodo --}}
                            <div class="width-filter">
                                <label for="years">Periodo</label>
                                <select id="years" name="years">
                                    <option value="Todos">Todos</option>
                                    <option value="22022" <?php if (isset($_POST['years'])){ if($_POST['years']=="22022") echo 'selected';}?> >2T 2022</option>
                                    <option value="32022" <?php if (isset($_POST['years'])){ if($_POST['years']=="32022") echo 'selected';}?> >3T 2022</option>
                                    <option value="42022" <?php if (isset($_POST['years'])){ if($_POST['years']=="42022") echo 'selected';}?> >4T 2022</option>
                                    <option value="12023" <?php if (isset($_POST['years'])){ if($_POST['years']=="12023") echo 'selected';}?> >1T 2023</option>
                                    <option value="22023" <?php if (isset($_POST['years'])){ if($_POST['years']=="22023") echo 'selected';}?> >2T 2023</option>
                                    <option value="32023" <?php if (isset($_POST['years'])){ if($_POST['years']=="32023") echo 'selected';}?> >3T 2023</option>
                                    <option value="42023" <?php if (isset($_POST['years'])){ if($_POST['years']=="42023") echo 'selected';}?> >4T 2023</option>                                    
                                    <option value="12024" <?php if (isset($_POST['years'])){ if($_POST['years']=="12024") echo 'selected';}?> >1T 2024</option>
                                    <option value="22024" <?php if (isset($_POST['years'])){ if($_POST['years']=="22024") echo 'selected';}?> >2T 2024</option>
                                    <option value="32024" <?php if (isset($_POST['years'])){ if($_POST['years']=="32024") echo 'selected';}?> >3T 2024</option>
                                    <option value="42024" <?php if (isset($_POST['years'])){ if($_POST['years']=="42024") echo 'selected';}?> >4T 2024</option>
                                    <option value="12025" <?php if (isset($_POST['years'])){ if($_POST['years']=="12025") echo 'selected';}?> >1T 2025</option>
                                    <option value="22025" <?php if (isset($_POST['years'])){ if($_POST['years']=="22025") echo 'selected';}?> >2T 2025</option>
                                    <option value="32025" <?php if (isset($_POST['years'])){ if($_POST['years']=="32025") echo 'selected';}?> >3T 2025</option>
                                    <option value="42025" <?php if (isset($_POST['years'])){ if($_POST['years']=="42025") echo 'selected';}?> >4T 2025</option>
                                    <option value="12026" <?php if (isset($_POST['years'])){ if($_POST['years']=="12026") echo 'selected';}?> >1T 2026</option>
                                    <option value="22026" <?php if (isset($_POST['years'])){ if($_POST['years']=="22026") echo 'selected';}?> >2T 2026</option>
                                    <option value="32026" <?php if (isset($_POST['years'])){ if($_POST['years']=="32026") echo 'selected';}?> >3T 2026</option>
                                    <option value="42026" <?php if (isset($_POST['years'])){ if($_POST['years']=="42026") echo 'selected';}?> >4T 2026</option>
                                    <option value="42021" <?php if (isset($_POST['years'])){ if($_POST['years']=="42021") echo 'selected';}?> >2021</option>
                                    <option value="42022" <?php if (isset($_POST['years'])){ if($_POST['years']=="42022") echo 'selected';}?> >2022</option>
                                    <option value="42023" <?php if (isset($_POST['years'])){ if($_POST['years']=="42023") echo 'selected';}?> >2023</option>
                                    <option value="42024" <?php if (isset($_POST['years'])){ if($_POST['years']=="42024") echo 'selected';}?> >2024</option>
                                    <option value="42025" <?php if (isset($_POST['years'])){ if($_POST['years']=="42025") echo 'selected';}?> >2025</option>
                                    <option value="42026" <?php if (isset($_POST['years'])){ if($_POST['years']=="42026") echo 'selected';}?> >2026</option>
                                </select>
                            </div>
                            {{-- Botón filtrar --}}
                            <div class="width-filter">
                                <input type="submit" value="Filtrar" id="filter">
                            </div>
                        </form>
                        {{-- End Filtros --}}
                        <div id="card-map-info">
                            <!-- Mapa -->
                            <div id="mapproy"></div>
                        </div>
                        <!-- Tarjetas de cantidad y monto -->
                        <div id="row-card">
                            {{-- Cantidad de proyectos --}}
                            <div id="card-info">
                                <h2>
                                    {{ $cant }}
                                </h2>
                                <h5>Cantidad de proyectos <sup>1/</sup></h5>
                            </div>
                            {{-- Monto actualizado --}}
                            <div id="card-info" class="mt-3">
                                <h2>
                                    {{ $sum }}
                                </h2>
                                <h5>Monto actualizado</h5>
                                <small>(S/ millones)</small>
                            </div>
                        </div>
                    </div>
                    <p><b>Nota:</b> Corto Plazo: 2022 / Mediano Plazo: 2023 / Largo Plazo: al 2026</p>
                    <p class="ptop"><sup>1/</sup> Proyectos y/o intervenciones</p>
                    <hr>
                    
                    <div class="dwnld-div" id="descarga">
                        <a href="/descargar-proyectos">
                            <i class="far fa-file-excel"></i>
                            DATA
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Proyectos End -->
        @extends('layouts.footer')
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

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
                case "Corto Plazo":
                    return 2;
                    break;
                case "Mediano Plazo":
                    return 3;
                    break;
                case "Largo Plazo":
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
                '}).addTo(mapp).bindPopup("<strong>Periodo de Tiempo: </strong>',
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
</body>
</html>