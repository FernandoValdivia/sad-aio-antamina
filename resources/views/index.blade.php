<!DOCTYPE html>
<html lang="es">
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
            @extends('layouts.navbar')
            <!-- Index -->
            <div class="home_container">
                <div class="_home_container">
                    <div class="col-6 home_left">
                        <h1>Sistema de <br>Administración del <br>Desarrollo</h1>
                        <p class="mb-0">Área de Influencia Operativa</p>
                        <p>Antamina</p>
                    </div>
                    <div class="col-6 home_right">
                        <img id="slideshow" alt="Imagen Mapa Slide" name="slide">
                    </div>
                </div>
                
            </div>
            <!-- Index End -->
        </div>
        @extends('layouts.footer')
    </div>

    <!-- JavaScript Libraries Menu -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Chat Bot --}}
    <script src="js/slider.js"></script>
</body>
</html>