<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Recursos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO - Recursos" name="description">
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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    {{-- BOXICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- Chat whatsapp --}}
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <!-- JChart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
</head>

<body>
    <div class="container-xxl p-0">
        @extends('layouts.navbar')
        <!-- Recursos Start -->
        <div class="container-hor">
            <div class="align-items-center">
                    {{-- Filtros --}}
                    <div id="filterec">
                        <label id="label" for="location">Unidad territorial:</label>
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
                <div class="text-center">
                    <h3 id="titulo">Transferencias de canon y regalías mineras</h3>
                    <p>(S/ millones)</p>
                </div>
                <br>
                <div class="container-grph">
                    <div class="text-center graph1">
                        <h5>Anual</h5>
                        <canvas id="myChart" height="170"></canvas>
                    </div>
                    <div class="text-center graph2">
                        <h5>Acumulado histórico y proyectado</h5>
                        <img id="imgAcumuladoAnual" src="/img/recursos/r1.png" alt="Gráfico acumulado y promedio anual" title="Gráfico acumulado y promedio anual">
                        <p>Fuente: Antamina, MEF</p>
                    </div>
                    <p><b>Nota: </b>Montos proyectados desde el año 2022 al 2036</p>
                </div>
                <hr>
                <div class="row dwnld-div" id="descarga">
                    <a href="/descargar-recursos">
                        <i class="far fa-file-excel"></i>
                        DATA
                    </a>
                </div>
            </div>
        </div>
        <!-- Recursos End -->
        @extends('layouts.footer')
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- myChart -->
    <script>
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
</body>
</html>