<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Recursos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO Antamina - Recursos" name="description">
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Chat whatsapp --}}
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <!-- JChart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar -->
        <div class="container-xxl position-relative p-0">
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
                        <a href="/recursos" class="nav-item nav-link active">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                    </div>
                </div> 
            </nav>
            <!-- Navbar End -->
        </div>
        <!-- Navbar End -->

        <!-- Recursos Start -->
        <div class="container-xxl py-5">
            <div class="container-hor">
                <div class="row g-5 align-items-center">
                    <div class="row">
                        <div class="col-9">
                        </div>
                        {{-- Filtros --}}
                        <div class="col-3" id="filterec">
                            <label id="label" for="unit">Unidad territorial:</label>
                            <select name="location" id="location" class="select" onchange="ShowSelected();">
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
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row text-center">
                        <h3 id="titulo">Transferencias de canon y regalías mineras</h3>
                        <p>(S/ millones)</p>
                    </div>
                    <br>
                    <div class="row m-3 container-grph">
                        <div class="col-8 text-center">
                            <h5>Anual</h5>
                            <canvas id="myChart" height="170"></canvas>
                        </div>
                        <div class="col-4 text-center">
                            <h5>Acumulado histórico y proyectado</h5>
                            <img id="imgAcumuladoAnual" src="/img/recursos/r1.png" alt="Gráfico acumulado y promedio anual">
                            <p>Fuente: Antamina, MEF</p>
                        </div>
                        <p><b>Nota: </b>Montos proyectados desde el año 2022 al 2036</p>
                    </div>
                    <hr>
                    <div class="row dwnld-div">
                        <a href="/descargar-recursos">
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
        <!-- Resumen End -->

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
    <!-- myChart -->
    <script type="text/javascript">
    /* Grafico de lineas */
        var chartCanvas = document.getElementById("myChart");

        Chart.defaults.global.defaultFontFamily = "Calibri";
        Chart.defaults.global.defaultFontSize = 14;
       
        //Valor total inicial
        var total = '['+'@foreach ($recursos as $r){{ $r -> valor}},@endforeach'+']';

        // Select
        function ShowSelected()
        {
            /* Para obtener el texto */
            var combo = document.getElementById("location");
            var selected = combo.options[combo.selectedIndex].text;
            
            switch (selected) {
                case 'AIO':
                    var total = '['+'@foreach ($recursos as $r){{ $r -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r1.png';
                    break;
                case 'Antonio Raymondi (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($antonio as $r2){{ $r2 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r2.png';
                    break;
                case 'Aquia (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($aquia as $r3){{ $r3 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r3.png';
                    break;
                case 'Cajacay (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($cajacay as $r4){{ $r4 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r4.png';
                    break;
                case 'Cátac (Recuay / Áncash)':
                    var total = '['+'@foreach ($catac as $r5){{ $r5 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r5.png';
                    break;
                case 'Chavín de Huántar (Huari / Áncash)':
                    var total = '['+'@foreach ($chavin as $r6){{ $r6 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r6.png';
                    break;
                case 'Chiquián (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($chiquian as $r7){{ $r7 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r7.png';
                    break;
                case 'Colquioc (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($colquioc as $r8){{ $r8 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r8.png';
                    break;
                case 'Huachis (Huari / Áncash)':
                    var total = '['+'@foreach ($huachis as $r9){{ $r9 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r9.png';
                    break;
                case 'Huallanca (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($huallanca as $r10){{ $r10 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r10.png';
                    break;
                case 'Huarmey (Huarmey / Áncash)':
                    var total = '['+'@foreach ($huarmey as $r11){{ $r11 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r11.png';
                    break;
                case 'Huayllacayán (Bolognesi / Áncash)':
                    var total = '['+'@foreach ($huayllacayan as $r12){{ $r12 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r12.png';
                    break;
                case 'Llacllín (Recuay / Áncash)':
                    var total = '['+'@foreach ($llacllin as $r13){{ $r13 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r13.png';
                    break;
                case 'Llata (Huamalíes / Huánuco)':
                    var total = '['+'@foreach ($llata as $r21){{ $r21 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r21.png';
                    break;
                case 'Marca (Recuay / Áncash)':
                    var total = '['+'@foreach ($marca as $r14){{ $r14 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r14.png';
                    break;
                case 'Pampas Chico (Recuay / Áncash)':
                    var total = '['+'@foreach ($pampas_chico as $r15){{ $r15 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r15.png';
                    break;
                case 'Paramonga (Barranca / Lima)':
                    var total = '['+'@foreach ($paramonga as $r19){{ $r19 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r19.png';
                    break;
                case 'Pararín (Recuay / Áncash)':
                    var total = '['+'@foreach ($pararin as $r16){{ $r16 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r16.png';
                    break;
                case 'Puños (Huamalíes / Huánuco)':
                    var total = '['+'@foreach ($punos as $r20){{ $r20 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r20.png';
                    break;
                case 'San Marcos (Huari / Áncash)':
                    var total = '['+'@foreach ($san_marcos as $r17){{ $r17 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r17.png';
                    break;
                case 'San Pedro de Chaná (Huari / Áncash)':
                    var total = '['+'@foreach ($san_pedro as $r18){{ $r18 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r18.png';
                    break;
                //UGT's
                case 'UGT Huallanca':
                    var total = '['+'@foreach ($v_ugt_huallanca as $rugt1){{ $rugt1 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/rugt1.png';
                    break;
                case 'UGT Huarmey':
                    var total = '['+'@foreach ($v_ugt_huarmey as $rugt2){{ $rugt2 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r11.png';
                    break;
                case 'UGT Mina / San Marcos':
                    var total = '['+'@foreach ($v_ugt_san_marcos as $rugt3){{ $rugt3 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/rugt3.png';
                    break;
                case 'UGT Valle Fortaleza':
                    var total = '['+'@foreach ($v_valle_fortaleza as $rugt4){{ $rugt4 -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/rugt4.png';
                    break;
                default:
                    var total = '['+'@foreach ($recursos as $r){{ $r -> valor}},@endforeach'+']';
                    lineChart.data.datasets[0].data=total.split(',');
                    lineChart.update();
                    document.getElementById("imgAcumuladoAnual").src='/img/recursos/r1.png';
                    break;
            }
        }
        
        /**/

        var data = {
            labels: ['1996','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020','2021','2022','2023','2024','2025','2026','2027','2028','2029','2030','2031','2032','2033','2034','2035','2036'],
            datasets: [{
                label: "Canon y regalías mineras",
                data: total.split(','),
                lineTension: 0.4,
                fill: true,
                fillColor: '#de7f40',
                borderColor: '#db7632',
                borderWidth: 2,
                pointRadius: 2,
                pointHoverRadius: 6,
                backgroundColor: '#de7f40',
                pointHoverBackgroundColor: '#bad9fd85'
            }]
        };

        var chartOptions = {
            /* tooltips: {
                callbacks: {
                    label: (tooltipItem, data) => {
                        var label = data.datasets[tooltipItem.datasetIndex].label || '';
                        return label + ' ' + (Math.round(tooltipItem.yLabel * 100) / 100).toFixed(2);
                    }
                }
            }, */
            animation: {
                onComplete: function() {
                    var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                    
                    ctx.font = Chart.helpers.fontString(12, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function(dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function(bar, index) {
                            var data = dataset.data[index];
                            ctx.fillStyle = "#5a5a5a";
                            var dataString = parseFloat(Math.round(dataset.data[index].toString() * 100) / 100).toFixed(0)
                            ctx.fillText(dataString, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            },
            responsive: true,
            legend: {
                display: false,
                position: 'bottom',
                labels: {
                boxWidth: 5,
                usePointStyle: true,
                fontColor: 'black'
                }
        },
        scales: {
                xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: ''
                        },
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 90
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                }
        };
        
        var lineChart = new Chart(chartCanvas, {
            type: 'line',
            data: data,
            options: chartOptions
        });
    </script>

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
</body>
</html>