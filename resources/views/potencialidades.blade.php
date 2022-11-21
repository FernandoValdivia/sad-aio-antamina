<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Potencialidades</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO Antamina - Potencialidades" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon" type="image/x-icon">

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
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
            {{-- Logo --}}
            <a class="navbar-brand" href="/">
                <img src="img/logo-sad.png" width="90%" class="d-inline-block align-top" alt="">
            </a>
            {{-- End Logo --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="/" class="nav-item nav-link">Home</a>
                    <a href="/resumen" class="nav-item nav-link">Resumen</a>
                    <a href="/brechas" class="nav-item nav-link">Brechas</a>
                    <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                    <a href="/recursos" class="nav-item nav-link">Recursos</a>
                    <a href="/potencialidades" class="nav-item nav-link active">Potencialidades</a>
                    <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                </div>
            </div> 
        </nav>
        <!-- Navbar End -->
    </div>
    <!-- Navbar End -->

    <!-- Potencialidades -->
    <div id="div-potenc" class="container-xxl py-5">
        <div class="container-hor">
            <div class="row g-5 align-items-center">
                <div class="row">
                    <div class="col-8">
                        <h3>Potencialidades</h3>
                        <p id="titulo" name="titulo">Cadenas productivas en Huallanca (Bolognesi / Áncash)</p>
                    </div>
                    <div class="col-4">
                        <div class="row" id="select-location">
                            <label for="location">Unidad territorial</label>
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
                    </div>
                </div>
                <div class="row mb-2" id="img-map">
                    {{-- Imagen --}}
                    <img src="/img/potencialidad/distrito/huallanca.png" alt="Potencialidades"  id="img-potencialidad">
                    {{-- Mapa --}}
                    <div id="map-pt"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Potencialidades End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contacto</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>San Isidro, Lima - Perú</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+51 922 753 771</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>melissa.sanchez@competitividadccd.com</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center text-center mb-3 mb-md-0">
                        <a href="/">SAD</a>, Sistema de Administración del Desarrollo
                        <p>&copy; 2022 | Todos los derechos reservados.</p>
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
    {{-- Zoom Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/medium-zoom/dist/medium-zoom.min.js" ></script>
    <script src="{{ asset('js/zoom.js')  }}"></script>

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
</body>
</html>

