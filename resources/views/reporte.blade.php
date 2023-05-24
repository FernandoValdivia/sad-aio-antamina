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

                    <div class="grid-r-2">
                        <a class="descargar-btn" href="#descarga"><i class="fas fa-cloud-download-alt"></i>Reportes</a>
                    </div>
                </div>
                {{-- Introducción --}}
                <section id="introduccion">
                    <iframe src="https://drive.google.com/file/d/1CpV-dzWEtcUBAO28Akw8DC3WGvpt24Gp/preview" name="reporte" style="width:100%; height: 800px;"></iframe>
                </section>
                <hr>
                {{-- Descargar --}}
                <section id="descarga">
                    <div class="row text-center">
                        <h2>Reportes</h2>
                    </div>
                    <br>
                    <div class="tableDescargas">
                        <table>
                            {{-- Encabezado --}}
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
                            {{-- Descarga 1T 2023 --}}
                            <tr>
                                <td class="text-center"><b>1T 2023</b></td>
                                <td>Progreso Cierre Brechas AIO - Reporte 1T 2023</td>
                                <td class="text-center">
                                    <a id="" href="/descargar-pdf12023" title="Descargar PDF">
                                        <i class="far fa-file-pdf"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="/descargar-excel12023" title="Descargar Excel">
                                        <i class="far fa-file-excel"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="https://drive.google.com/file/d/1CpV-dzWEtcUBAO28Akw8DC3WGvpt24Gp/preview" target="reporte" title="Ver Reporte">
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
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>