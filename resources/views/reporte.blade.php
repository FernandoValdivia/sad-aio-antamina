<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Reporte Trimestral</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO - Reporte Trimestral" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="/img/logo-sad.svg" rel="icon" type="image/x-icon">
    
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
    
</head>
<body>
    <div class="container-xxl p-0">
        @extends('layouts.navbar')
        <!-- Trimestral Start -->      
        <div class="container-xxl">
            <div class="container-trim trim">

                <div class="container-descarga">
                    <div class="grid-r-1">
                        <h3 id="titulo">Progreso de Cierre de Brechas</h3>
                        <p>AIO Antamina 1T 2023</p>
                    </div>
                </div>
                {{-- Introducción --}}
                <section id="introduccion">
                    <iframe id="pdfPreview" src="https://drive.google.com/file/d/1CpV-dzWEtcUBAO28Akw8DC3WGvpt24Gp/preview" name="reporte"></iframe>
                    <div class="descargar__container">
                        <h3>Progreso Cierre Brechas AIO</h3>
                        <select id="selectReporte" onchange="cambiarReporte()">
                            <option value="reporte1">Reporte 2T 2022</option>
                            <option value="reporte2">Reporte 3T 2022</option>
                            <option value="reporte3">Reporte 4T 2022</option>
                            <option value="reporte4">Reporte 1T 2023</option>
                        </select>
                        <h3>Descargar</h3>
                        <div id="contenedorEtiquetas">
                            <a id="reporte__pdf" href="/descargar-pdf22022" download>
                                <i class="far fa-file-pdf"></i>
                                <p id="name__reporte__1">Reporte 2T 2022</p>
                            </a>
                            <br>
                            <a id="reporte__xlsx" href="/descargar-excel22022" download>
                                <i class="far fa-file-excel"></i>
                                <p id="name__reporte__2">Reporte 2T 2022</p>
                            </a>
                        </div>                        
                    </div>
                </section>
                <br>
            </div>
        </div>
        <!-- Trimestral End -->
        @extends('layouts.footer')
    </div>
    <!-- JavaScript Libraries -->
    <script src="{{ asset('js/descargas.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>