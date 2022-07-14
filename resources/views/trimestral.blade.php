<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporte Trimestral</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="https://res.cloudinary.com/lvaldivia/image/upload/v1652719812/ccd/logo-icon_pjbwon.png" rel="icon">

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

    <!-- JChart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    {{-- Logo --}}
                    <div class="row m-4 divlogo">
                        <div class="col-3 logo">
                            <img class="img-logo" src="https://res.cloudinary.com/lvaldivia/image/upload/v1652720473/ccd/logo-navbar2_iblh54.png" alt="logoccd">
                            <p>CENTRO PARA</p>
                            <p>LA COMPETITIVIDAD</p>
                            <p>Y EL DESARROLLO</p>
                        </div>
                        <div class="col-9">
                            <p> SAD AIO Antamina</p>
                        </div>
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
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link active">Reporte Trimestral</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-1 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Reporte Trimestral</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/resumen" class="aactiva">Resumen</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Trimestral</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Recursos Start -->
        <div class="container-xxl py-5">
            <div class="container-hor">
                <div class="row g-5 align-items-center">
                    <div class="row">
                        <div class="col-8 text-center">
                            <h3>Indicador Global de Cierre de Brechas: AIO Antamina</h3>
                            <p>(Porcentaje)</p>
                        </div>
                        
                        {{-- Filtros  --}}
                        <div class="col-3 filters">
                            <label id="label" for="unit">Unidad territorial:</label>
                            <select name="location" id="location" class="select">
                                <option value="AIO">AIO</option>
                                {{-- <optgroup label="UGT Huallanca">
                                    @php
                                    foreach ($ugt_huall as $ugt) {
                                            echo '<option value="'.$ugt->coords.'">'.$ugt->distrito.'</option>';
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
                                </optgroup> --}}
                            </select>
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col-8">
                            <canvas id="myChart1"></canvas>
                        </div>
                        <div class="col-4">
                            <h4>El Indicador muestra el progreso del cierre de brechas en los 20 distritos del AIO Antamina.
                                <br><br>
                                En relación al primer trimestre, en el segundo trimestre del 2022 se ha registrado una reducción de las brechas en AA punto porcentuales, pasando AA% a BB%.
                                <br><br>
                                Esta reducción esta explicado principalmente por la AAA, BBB y CCC correspondiente a los distritos AA, BB y CC, respectivamente.
                            </h4>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="row">
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart2" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart3" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart4" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart5" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart6" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart7" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart8" height="250"></canvas>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                            <h4><b>Ejecucion de gasto de inversión municipal</b></h4>
                            <p>(Porcentaje)</p>
                            <div class="row m-3">
                                <canvas id="myChart9" height="250"></canvas>
                            </div>
                        </div>
                        {{-- Filtros 
                        <div class="col-3 filters">
                            <label id="label" for="unit">Unidad territorial:</label>
                            <select name="location" id="location" class="select">
                                <option value="AIO">AIO</option>
                                <optgroup label="UGT Huallanca">
                                    @php
                                    foreach ($ugt_huall as $ugt) {
                                            echo '<option value="'.$ugt->coords.'">'.$ugt->distrito.'</option>';
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
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Resumen End -->

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
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>melissa.sanchez@ccdcompetitividad.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Centro-para-la-Competitividad-y-el-Desarrollo-CCD-151040740434523?_rdc=1&_rdr"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://api.whatsapp.com/send?phone=51922753771"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/centro-para-la-competitividad-y-el-desarrollo-434799214/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href="mailto:melissa.sanchez@ccdcompetitividad.com"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">CCD</a>, Todos los derechos reservados. 
							Desarrollado por <a class="border-bottom" href="https://lfvaldivia.ml" target="_blank">LValdivia</a> & <a class="border-bottom" href="https://ivanoscco.wixsite.com/my-site" target="_blank">IOscco</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

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

    <script type="text/javascript">
        /** Chart Trimestral 1 **/
            var chartCanvas1 = document.getElementById("myChart1");

            var dataGlobal = {
                label: "Porcentajes",
                data: [55,55,54,52,53,53,53,52,52,52,51,51,50,50,50,50,50,50,50,50,50,50],
                lineTension: 0.2,
                fill: false,
                borderColor: '#0C859A'
            };

            var lineX1 = {
                labels: ['1T-2017','2T-2017','3T-2017','4T-2017','1T-2018','2T-2018','3T-2018','4T-2018','1T-2019','2T-2019','3T-2019','4T-2019','1T-2020','2T-2020','3T-2020','4T-2020','1T-2021','2T-2021','3T-2021','4T-2021','1T-2022','2T-2022'],
                datasets: [dataGlobal]
            };

            var chartOptions1 = {
            legend: {
                display: true,
                position: 'top',
                labels: {
                boxWidth: 60,
                fontColor: 'black'
                }
            },
            scales: {
                xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Trimestres'
                        }
                    }],
                yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            steps: 10,
                            stepValue: 5,
                            max: 100
                        }
                    }]
                }
            };

            var lineChart1 = new Chart(chartCanvas1, {
            type: 'line',
            data: lineX1,
            options: chartOptions1
            });

        /** Chart Trimestral 2 **/
            var chartCanvas2 = document.getElementById("myChart2");
            var chartCanvas3 = document.getElementById("myChart3");
            var chartCanvas4 = document.getElementById("myChart4");
            var chartCanvas5 = document.getElementById("myChart5");
            var chartCanvas6 = document.getElementById("myChart6");
            var chartCanvas7 = document.getElementById("myChart7");
            var chartCanvas8 = document.getElementById("myChart8");
            var chartCanvas9 = document.getElementById("myChart9");

            const labels = ['2021','T1-22','T2-22']
            const data = {
            labels: labels,
            datasets: [{
                    label: 'Ejecución de gasto de inversión municipal',
                    data: [90, 60, 30],
                    backgroundColor: [
                    '#2f69b5',
                    '#2f69b5',
                    '#2f69b5'
                    ],
                    borderColor: [
                    '#042f66',
                    '#042f66',
                    '#042f66'
                    ],
                    borderWidth: 1
                }]
            };

            var chartOptions2 = {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                    boxWidth: 60,
                    fontColor: 'black'
                    }
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Trimestres'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 100
                            }
                        }]
                }
            };

            var barChart1 = new Chart(chartCanvas2, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart2 = new Chart(chartCanvas3, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart3 = new Chart(chartCanvas4, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart4 = new Chart(chartCanvas5, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart5 = new Chart(chartCanvas6, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart6 = new Chart(chartCanvas7, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart7 = new Chart(chartCanvas8, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart8 = new Chart(chartCanvas9, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

            var barChart9 = new Chart(chartCanvas2, {
                type: 'bar',
                data: data,
                options: chartOptions2
            });

    </script>
</body>
</html>