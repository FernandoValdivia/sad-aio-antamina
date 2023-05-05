<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SAD AIO</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Sistema de Administración del Desarrollo" name="description">
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
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Chat whatsapp --}}
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    {{-- Slider --}}
    <link rel="stylesheet" href="css/homeslider.css">

    {{-- BOXICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="container-xxl p-0">
        <div class="container-xxl position-relative p-0">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
                {{-- Logo --}}
                <a id="sadlogo" class="navbar-brand" href="/"></a>
                {{-- End Logo --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link active">Inicio</a>
                        <a href="/resumen" class="nav-item nav-link">Resumen</a>
                        <a href="/brechas" class="nav-item nav-link" onclick="onLoad()">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <div class="dropwdown-container">
                            <a href="#reportes" class="nav-item nav-link">Reportes</a>
                            <div class="drop-menu">
                                <a href="/reporte" class="nav-item nav-link drop-item">Brechas</a>
                                <a href="#general" class="nav-item nav-link drop-item">Desarrollo</a>
                                <a href="#coyuntura" class="nav-item nav-link drop-item">Coyuntura</a>
                            </div>
                        </div>
                        <button class="nav-item nav-link nav-modal" onclick="abrirModal2()">Simulación</button>
                        {{-- Dark/Light Mode --}}
                        <div class="btn-switch">
                            <button class="switch" id="switch">
                                <span><i class="fas fa-sun"></i></span>
                                <span><i class="fas fa-moon"></i></span>
                            </button>
                        </div>
                    </div>
                </div> 
            </nav>
            <!-- Navbar End -->
            <!-- Index -->
            <div class="home_container">
                <div class="_home_container">
                    <div class="col-6 home_left">
                        <h1>Sistema de <br>Administración del <br>Desarrollo</h1>
                        <p>Área de Influencia Operativa</p>
                    </div>
                    <div class="col-6 home_right">
                        <img id="slideshow" alt="Imagen Mapa Slide" name="slide" src="img/1.png">
                    </div>
                </div>
                
            </div>
            <!-- Index End -->
        </div>

        @extends('layouts.footer')
    </div>

    {{-- Chat Whatsapp --}}
    <a href="https://api.whatsapp.com/send?phone=51922753771&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20SAD." class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>

    <!-- JavaScript Libraries Menu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
    <script src="js/slider.js"></script>
</body>
</html>