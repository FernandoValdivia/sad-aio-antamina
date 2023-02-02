<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporte Trimestral</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO Antamina - Reporte Trimestral" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon" type="image/x-icon">
    
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
    <div class="container-xxl bg-white p-0">
        <!-- Navbar general -->
        <div class="container-xxl position-relative p-0 bg-black">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
                {{-- Logo --}}
                <a class="navbar-brand" href="/">
                    <img loading="lazy" src="img/logo-sad.png"  class="d-inline-block align-top" alt="">
                </a>
                {{-- End Logo --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="/resumen" class="nav-item nav-link">Resumen</a>
                        <a href="/brechas" class="nav-item nav-link" onclick="onLoad()">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/reporte" class="nav-item nav-link active">Reportes</a>
                    </div>
                </div> 
            </nav>
            <!-- Navbar End -->
            <div class="container-xxl py-1 bg-dark hero-header">
                <div class="container text-center my-5">
                    <h1 class="display-3 text-white mb-3 animated titleTrim mt-1"><b>Progreso Cierre de Brechas</b></h1>
                    <h1 class="display-3 text-white mb-3 animated">AIO Antamina 4T 2022</h1>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Trimestral Start -->      
        <div class="container-xxl">
            <div class="container-trim pt-4 trim">
                <div class="container-descarga">
                    <a class="descargar-btn" href="#descarga"><i class="fas fa-cloud-download-alt"></i> Descargar Reportes</a>
                </div>
                {{-- Introducción --}}
                <section id="introduccion">
                    <iframe src="https://drive.google.com/file/d/1pxMrV-ChtzWXhw_EZJPQFpPIwEtkIILU/preview?embedded=true&view=FitH&toolbar=0" name="reporte" style="width:100%; height: 800px;"></iframe>
                </section>
                <hr>
                {{-- Descargar --}}
                <section id="descarga">
                    <div class="row text-center">
                        <h2>Descargar Reportes</h2>
                    </div>
                    <br>
                    <div class="tableDescargas">
                        <table>
                            <thead class="text-center">
                                <tr>
                                    <td>Periodo</td>
                                    <td>Documento</td>
                                    <td colspan="2">Descargar</td> 
                                    <td>Ver</td> 
                                </tr>
                            </thead>
                            {{-- Descarga 2T 2022 --}}
                            <tr>
                                <td class="text-center"><b>2T 2022</b></td>
                                <td>Progreso Cierre Brechas AIO - Reporte 2T 2022</td>
                                <td class="text-center">
                                    <a href="/descargar-pdf22022" title="Descargar PDF">
                                        <i class="far fa-file-pdf"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="/descargar-excel22022" title="Descargar Excel">
                                        <i class="far fa-file-excel"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="https://drive.google.com/file/d/1FEvILx8jPbG2bPFhLGeCcKTe7px0q_b5/preview" target="reporte" title="Ver Reporte">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            {{-- Descarga 3T 2022 --}}
                            <tr>
                                <td class="text-center"><b>3T 2022</b></td>
                                <td>Progreso Cierre Brechas AIO - Reporte 3T 2022</td>
                                <td class="text-center">
                                    <a href="/descargar-pdf32022" title="Descargar PDF">
                                        <i class="far fa-file-pdf"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="/descargar-excel32022" title="Descargar Excel">
                                        <i class="far fa-file-excel"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="https://drive.google.com/file/d/1oYa_DsXVJlu9dLU9BO_zvG3vl6Whl_oJ/preview" target="reporte" title="Ver Reporte">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            {{-- Descarga 4T 2022 --}}
                            <tr>
                                <td class="text-center"><b>4T 2022</b></td>
                                <td>Progreso Cierre Brechas AIO - Reporte 4T 2022</td>
                                <td class="text-center">
                                    <a id="" href="/descargar-pdf42022" title="Descargar PDF">
                                        <i class="far fa-file-pdf"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="/descargar-excel42022" title="Descargar Excel">
                                        <i class="far fa-file-excel"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="https://drive.google.com/file/d/1pxMrV-ChtzWXhw_EZJPQFpPIwEtkIILU/preview" target="reporte" title="Ver Reporte">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
                <br>
            </div>
        </div>
        <!-- Trimestral End -->

        @extends('layouts.footer')
        
    </div>
    {{-- Chat Whatsapp --}}
    <a href="https://api.whatsapp.com/send?phone=51922753771&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20SAD." class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
</body>
</html>