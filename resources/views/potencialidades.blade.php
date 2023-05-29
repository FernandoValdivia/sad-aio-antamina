<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Potencialidades</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO - Potencialidades" name="description">
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

    {{-- BOXICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
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
    @extends('layouts.navbar')
    <!-- Potencialidades -->
    <div class="container-xxl">
        <div class="container-pot">
            <div class="gridpt-1">
                <h3>Potencialidades</h3>
                <p id="titulo" name="titulo">Cadenas productivas en Huallanca (Bolognesi / Áncash)</p>
            </div>
            <div class="gridpt-2" id="select-location">
                <label id="label" for="location">Unidad territorial</label>
                <select name="location" id="location" class="select">
                    <option value="AIO">AIO</option>
                    <optgroup label="UGT Huallanca">
                        @php
                        foreach ($ugt_huall as $ugt) {
                                echo '<option value="'.$ugt->coords.'" selected>'.$ugt->distrito.'</option>';
                        }
                        @endphp
                    </optgroup>
                    <optgroup label="UGT Huarmey">
                        @php
                        foreach ($ugt_huarmey as $ugt) {
                            echo '<option value="'.$ugt->coords.'">'.$ugt->distrito.'</option>';
                        }
                        @endphp
                    </optgroup>
                    <optgroup label="UGT Mina / San Marcos">
                        @php
                        foreach ($ugt_mina as $ugt) {
                            echo '<option value="'.$ugt->coords.'">'.$ugt->distrito.'</option>';
                        }
                        @endphp
                    </optgroup>
                    <optgroup label="UGT Valle Fortaleza">
                        @php
                        foreach ($ugt_valle as $ugt) {
                            echo '<option value="'.$ugt->coords.'">'.$ugt->distrito.'</option>';
                        }
                        @endphp
                    </optgroup>
                </select>
            </div>
            {{-- Imagen --}}
            <div class="gridpt-3">
                <img src="/img/potencialidad/distrito/huallanca.png" alt="Imagen de Potencialidad"  id="img-potencialidad">
            </div>
            {{-- Mapa --}}
            <div class="gridpt-4" id="map-pt"></div>
        </div>
    </div>
    <!-- Potencialidades End -->

    <!-- Agrega el modal -->
    <div id="modal">
        <span class="cerrar">&times;</span>
        <img src="/img/potencialidad/distrito/huallanca.png" id="potencialidad-modal" alt="Imagen Modal de Potencialidad de Distrito">
    </div>
    @extends('layouts.footer')
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Map -->
    <script src="{{ asset('js/map-pt.js')  }}"></script>

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
                '}).addTo(mappt).bindPopup("<strong>Periodo de Tiempo: </strong>',
                    $proy->time_frame,
                    '</br><strong>Distrito: </strong>',
                    $proy->distrito,
                    '</br><strong>Monto Actualizado (S/ millones): </strong>',
                    round($proy->monto_actualizado,2),
                    '</br><strong>Fecha de conclusión: </strong>',
                    $proy->conclusion,
                    '</br><strong>Proyecto: </strong>',
                    $proy->producto_proyecto,
                    '");',
                '</script>';
            $num = $num + $num;
        }
    ?>
    <script src="js/modal-pt.js"></script>
</body>
</html>

