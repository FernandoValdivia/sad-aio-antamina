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

        <!-- Trimestral Start -->
        <div class="container-xxl py-5">
            <div class="container-hor">
                {{-- Grafico 1 --}}
                <div class="row">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Indicador Global de Cierre de Brechas: AIO Antamina</h3>
                            <p>(Porcentaje)</p>
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col-6">
                            <canvas id="myChart1" height="270px"></canvas>
                        </div>
                        <div class="col-6">
                            <h4 style="text-align: justify">
                                El KPI Antamina presenta una tendencia decreciente desde el año 2017, acelerado a partir del 1T 2021 por el Pilar 5 (Emergencias) vinculado al proceso de vacunación. Asimismo, mejoras en el nivel educativo de la población, anemia, desnutrición crónica, e infraestructura de servicios básicos y productiva han contribuido en la reducción del KPI Antamina.
                                <br><br>
                                En el 2T 2022 el KPI Antamina disminuyó 0.2 puntos porcentuales respecto al 1T 2022, explicado por la reducción de los kpis vinculados al  Pilar 3 (Infraestructura social y productiva), principalmente con los proyectos: Mejora en la conectividad de internet en los distritos de San Marcos y Chavín de Huántar, así como en la continuación en la  vacunación contra el Covid-19 en todos los distritos del AIO.
                                <br><br>
                                En los próximos años, «período de cosecha» de proyectos, se prevé una importante reducción de brechas que se traducirá en una disminución del KPI Antamina en 6 puntos porcentuales, principalmente en los pilares 3 y 4 (Infraestructura social y productiva, y Emprendimiento y desarrollo económico): Saneamiento, Hospital y Desembarcadero en Huarmey; Saneamiento, Centro de Salud y Carretera Carash Pujún - Juprog en San Marcos; Saneamiento en Huallanca; Saneamiento Verdecocha y Canal Tacta en San Pedro de Chaná, Centro de Salud Chiquián, entre otros.
                            </h4>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Grafico 2 --}}
                <div class="row mt-5">
                    <div class="row text-center">
                        <h3>KPI Antamina y Contribución en Reducción de Brecha: AIO</h3>
                        <p>(Porcentaje)</p>
                        <div class="col-6">
                            <br>
                            <h4 style="text-align: justify">
                                Entre los años 2022-2026 se prevé una importante reducción de brechas que se traducirá en una disminución del KPI Antamina. Durante este «período de cosecha» de proyectos, se proyecta una reducción de brechas en 6 puntos porcentuales, como resultado de la entrada en operación de importantes proyectos, principalmente en los pilares 3 y 4 (Infraestructura social y productiva, y Emprendimiento y desarrollo económico): Saneamiento, Hospital y Desembarcadero en Huarmey; Saneamiento, Centro de Salud y Carretera Carash Pujún-  Juprog en San Marcos; Saneamiento en Huallanca; Saneamiento Verdecocha y Canal Tacta en San Pedro de Chaná, Centro de Salud Chiquián, entre otros.
                            </h4>
                        </div>
                        <div class="col-6 text-center">
                            <div id="container"></div>
                        </div>
                        
                    </div>
                </div>
                <hr>
                {{-- Grafico 3 --}}
                <div class="row mt-5">
                    <div class="row text-center">
                        <h3>Indicadores de clima social en comunidades del AIO</h3>
                        <p>(Descripción)</p>
                    </div>
                    <img src="https://res.cloudinary.com/lvaldivia/image/upload/v1659463322/ccd/clima%20social/clima-social_gkxhgl.png" alt="Clima Social" style="padding: 0px 5% 0px 5%">
                </div>
                <hr>
                {{-- Grafico 4 --}}
                <div class="row mt-5">
                    <div class="row text-center">
                        <h3>Progreso Cierre de Brechas AIO Antamina</h3>
                    </div>
                    <div class="col-6 text-center">
                        <h4><b>KPI Antamina Pilar 2: Oportunidades para las futuras generaciones</b></h4>
                        <p>(Porcentajes)</p>
                        <div class="row m-3">
                            <canvas id="myChartKPIOpo" ></canvas>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <h4><b>KPI Antamina Pilar 3: Infraestructura social y productiva</b></h4>
                        <p>(Porcentajes)</p>
                        <div class="row m-3">
                            <canvas id="myChartKPIInf"></canvas>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <h4><b>KPI Antamina Pilar 4: Emprendimiento y desarrollo económico</b></h4>
                        <p>(Porcentajes)</p>
                        <div class="row m-3">
                            <canvas id="myChartKPIEmp"></canvas>
                        </div>
                    </div>
                    <div class="col-6 text-center">
                        <h4><b>KPI Antamina Pilar 5: Emergencias</b></h4>
                        <p>(Porcentajes)</p>
                        <div class="row m-3">
                            <canvas id="myChartKPIEmerg"></canvas>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
        <!-- Trimestral End -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        /** Chart Trimestral 1 **/
            var chartCanvas1 = document.getElementById("myChart1");

            var kpis = '['+"@foreach ($kpisin as $ks){{$ks->porcentaje}}, @endforeach"+']';
            var kpic = '['+"@foreach ($kpicon as $kc){{$kc->porcentaje}}, @endforeach"+']';

            var dataGlobal1 = {
                label: "KPI Antanima sin proyectos",
                data: kpis.split(','),
                lineTension: 0.2,
                fill: 1,
                backgroundColor: "#f4282854",
                borderColor: '#0C859A'
            };

            var dataGlobal2 = {
                label: "KPI Antanima con proyectos",
                data: kpic.split(','),
                lineTension: 0.2,
                fill: false,
                borderColor: '#A1011F'
            };

            var lineX1 = {
                labels: ['1T-2017','2T-2017','3T-2017','4T-2017','1T-2018','2T-2018','3T-2018','4T-2018','1T-2019','2T-2019','3T-2019','4T-2019','1T-2020','2T-2020','3T-2020','4T-2020','1T-2021','2T-2021','3T-2021','4T-2021','1T-2022','2T-2022','1T-2023','2T-2023','3T-2023','4T-2023','1T-2024','2T-2024','3T-2024','4T-2024','1T-2025','2T-2025','3T-2025','4T-2025','1T-2026','2T-2026','3T-2026','4T-2026'],
                datasets: [dataGlobal1, dataGlobal2]
            };

            var chartOptions1 = {
            legend: {
                display: false,
                position: 'chartArea',
                labels: {
                    usePointStyle: true,
                    boxWidth: 10,
                    fontSize: 18,
                    fontFamily: 'Calibri',
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
                            autoSkip: false
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                yAxes: [{
                        display: false,
                        ticks: {
                            beginAtZero: true,
                            steps: 10,
                            stepValue: 5,
                            max: 61,
                            min: 40
                        },
                        gridLines: {
                            display: false
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
            var imp1 = '['+"@foreach ($impacto1 as $i1) {{$i1->porcentaje}}, @endforeach"+']';
                imp1 = imp1.match(/\d+(?:\.\d+)?/g).map(Number);
            var imp2 = '['+ "@foreach ($impacto2 as $i2) {{$i2->porcentaje}}, @endforeach"+']';
                imp2 = imp2.match(/\d+(?:\.\d+)?/g).map(Number);

                $('#container').highcharts({
                    chart: {
                        type: 'column',
                        lineWidth: 2
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['T4 - 2021', 'T1 - 2022', 'T2 - 2022', 'T3 - 2022', 'T4 - 2022','2023','2024','2025','2026']
                    },
                    yAxis: {
                        visible: false,
                        min: 40,
                        max: 55,
                        title: {
                            text: 'Total'
                        },
                        stackLabels: {
                            enabled: true,
                            style: {
                                fontWeight: 'bold',
                                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                            }
                        }
                    },
                    legend: {
                        align: 'right',
                        x: -30,
                        verticalAlign: 'top',
                        y: 25,
                        floating: true,
                        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                        borderColor: '#fff',
                        borderWidth: 0,
                        shadow: false
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.x + '</b><br/>' +
                                this.series.name + ': ' + this.y + '<br/>' +
                                'Total: ' + this.point.stackTotal;
                        }
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal',
                            dataLabels: {
                                enabled: true,
                                color: 'black'
                            }
                        },
                    series: {
                        animation: false,
                        pointPadding: -0.32
                    }
                    },
                    series: [{
                        name: 'Contribución Trimestral (punto porcentual)',
                        data: imp2,
                        color: '#C4E4EC'
                    }, {
                        name: 'KPI Antamina (porcentaje)',
                        data: imp1,
                        color: '#93CDDD'
                    }],
                    credits: {
                        enabled: false
                    }
                });
        /** Chart Trimestral 3 **/
            var kpio = '['+"@foreach ($kpioportunidad as $ko){{$ko->porcentaje}}, @endforeach"+']';

            var chartCanvasKpiOpo = document.getElementById("myChartKPIOpo");

            var dataKpiOpo = {
                label: "Porcentajes",
                data: kpio.split(','),
                lineTension: 0.5,
                fill: false,
                borderColor: '#BD001A'
            };

            var lineXI = {
                labels: ['1T-2020','2T-2020','3T-2020','4T-2020','1T-2021','2T-2021','3T-2021','4T-2021','1T-2022','2T-2022','3T-2022','4T-2022','1T-2023','2T-2023','3T-2023','4T-2023','1T-2024','2T-2024','3T-2024','4T-2024','1T-2025','2T-2025','3T-2025','4T-2025','1T-2026','2T-2026','3T-2026','4T-2026'],
                datasets: [dataKpiOpo]
            };

            var chartOptionsO = {
                legend: {
                    display: false,
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
                                display: true
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            scaleLabel: {
                                display: true
                            },
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 45,
                                min: 25
                            }
                        }]
                    }
                };

            var lineChartKPI1 = new Chart(chartCanvasKpiOpo, {
                type: 'line',
                data: lineXI,
                options: chartOptionsO
            });

        /** Chart Trimestral 4 **/
            var kpii = '['+"@foreach ($kpiinfra as $ki){{$ki->porcentaje}}, @endforeach"+']';

            var chartCanvasKpiInf = document.getElementById("myChartKPIInf");

            var dataKpiIS = {
                label: "Porcentajes",
                data: kpii.split(','),
                lineTension: 0.5,
                fill: false,
                borderColor: '#BD001A'
            };

            var lineXIS = {
                labels: ['1T-2020','2T-2020','3T-2020','4T-2020','1T-2021','2T-2021','3T-2021','4T-2021','1T-2022','2T-2022','3T-2022','4T-2022','1T-2023','2T-2023','3T-2023','4T-2023','1T-2024','2T-2024','3T-2024','4T-2024','1T-2025','2T-2025','3T-2025','4T-2025','1T-2026','2T-2026','3T-2026','4T-2026'],
                datasets: [dataKpiIS]
            };

            var chartOptionsIS = {
                legend: {
                    display: false,
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
                                display: true
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            scaleLabel: {
                                display: true
                            },
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 90,
                                min: 20
                            }
                        }]
                    }
                };

            var lineChartKPI2 = new Chart(chartCanvasKpiInf, {
                type: 'line',
                data: lineXIS,
                options: chartOptionsIS
            });

        /** Chart Trimestral 5 **/
            var kpie = '['+"@foreach ($kpiemp as $ke){{$ke->porcentaje}}, @endforeach"+']';

            var chartCanvasKpiEmp = document.getElementById("myChartKPIEmp");

            var dataKpiE = {
                label: "Porcentajes",
                data: kpie.split(','),
                lineTension: 0.4,
                fill: false,
                borderColor: '#BD001A'
            };

            var lineXEmp = {
                labels: ['1T-2020','2T-2020','3T-2020','4T-2020','1T-2021','2T-2021','3T-2021','4T-2021','1T-2022','2T-2022','3T-2022','4T-2022','1T-2023','2T-2023','3T-2023','4T-2023','1T-2024','2T-2024','3T-2024','4T-2024','1T-2025','2T-2025','3T-2025','4T-2025','1T-2026','2T-2026','3T-2026','4T-2026'],
                datasets: [dataKpiE]
            };

            var chartOptionsE = {
                legend: {
                    display: false,
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
                                display: true
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            scaleLabel: {
                                display: true
                            },
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 46,
                                min: 44
                            }
                        }]
                    }
                };

            var lineChartKPI3 = new Chart(chartCanvasKpiEmp, {
                type: 'line',
                data: lineXEmp,
                options: chartOptionsE
            });

        /** Chart Trimestral 6 **/
            var kpiem = '['+"@foreach ($kpieme as $kem){{$kem->porcentaje}}, @endforeach"+']';

            var chartCanvasKpiEme = document.getElementById("myChartKPIEmerg");

            var dataKpiEme = {
                label: "Porcentajes",
                data: kpiem.split(','),
                lineTension: 0.5,
                fill: false,
                borderColor: '#BD001A'
            };

            var lineXEme = {
                labels: ['1T-2020','2T-2020','3T-2020','4T-2020','1T-2021','2T-2021','3T-2021','4T-2021','1T-2022','2T-2022','3T-2022','4T-2022','1T-2023','2T-2023','3T-2023','4T-2023','1T-2024','2T-2024','3T-2024','4T-2024','1T-2025','2T-2025','3T-2025','4T-2025','1T-2026','2T-2026','3T-2026','4T-2026'],
                datasets: [dataKpiEme]
            };

            var chartOptionsEm = {
                legend: {
                    display: false,
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
                                display: true
                            },
                            ticks: {
                                autoSkip: false
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                    yAxes: [{
                            display: false,
                            scaleLabel: {
                                display: true
                            },
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 105
                            }
                        }]
                    }
                };

            var lineChartKPI3 = new Chart(chartCanvasKpiEme, {
                type: 'line',
                data: lineXEme,
                options: chartOptionsEm
            });

    </script>
</body>
</html>