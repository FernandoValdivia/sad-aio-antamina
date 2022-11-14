<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Brechas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Favicon -->
    <link href="/img/logo-icon.png" rel="icon">
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
    <div class="loader">
        <img src="/img/load-red.gif" alt="Loading..." />
    </div>
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
                        <a href="/brechas" class="nav-item nav-link active">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                    </div>
                </div> 
            </nav>
            <!-- Navbar End -->
        </div>
        <!-- Navbar End -->
        <!-- Brechas Start -->
        <div class="container-xxl py-3">
            <div class="grid-container">
                <div class="grid-br-1"></div>
                {{-- titulo --}}
                <div class="grid-br-2">
                    <h3 id="titulo">Brechas en el AIO: Por Pilares</h3>
                    <p>(Porcentajes)</p>
                </div>
                <div class="grid-br-3"></div>
                <div class="grid-br-4"></div>
                {{-- Pilar 1 --}}
                <div class="grid-br-5">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 1: Institucionalidad Madura</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Canon minero --}}
                <div class="grid-br-6">
                    <table>
                        <tr>
                            <th><h6>Canon Minero, Regalía Minera y otros para el desarrollo</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Canon Minero. Regalía Minera y otros para el desarrollo', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Instrumentos de Planeamiento Municipal</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Instrumentos de Planeamiento Municipal', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Ejecución del gasto de inversión municipal</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Ejecución presupuestal en inversiones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Calidad del gasto de inversión municipal</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Calidad del gasto de inversión municipal', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h6>Clima social para el desarrollo</h6>
                            </th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Clima social para el desarrollo', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- PDLC --}}
                <div class="grid-br-7">
                    <table>
                        <tr>
                            <th id="pdlc"><h6>PDLC</h6></th>
                            <td id="vpdlc">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Planeamiento: PDLC Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="sanea"><h6>Saneamiento</h6></th>
                            <td id="vsanea">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Saneamiento', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- POI --}}
                <div class="grid-br-8">
                    <table>
                        <tr>
                            <th id="poi"><h6>POI</h6></th>
                            <td id="vpoi">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Planeamiento: POI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="trans"><h6>Transporte</h6></th>
                            <td id="vtrans">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Transporte', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- PEI --}}
                <div class="grid-br-9">
                    <table>
                        <tr>
                            <th id="pei"><h6>PEI</h6></th>
                            <td id="vpei">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Planeamiento: PEI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="agro"><h6>Agropecuario</h6></th>
                            <td id="vagro">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Agropecurio', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- PMI --}}
                <div class="grid-br-10">
                    <table>
                        <tr>
                            <th id="pmi"><h6>PMI</h6></th>
                            <td id="vpmi">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Planeamiento: PMI Actualizados', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="edu"><h6>Educación</h6></th>
                            <td id="vedu">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Educación', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Salud --}}
                <div class="grid-br-11">
                    <table>
                        <tr>
                            <th id="salud"><h6>Salud</h6></th>
                            <td id="vsalud">
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Calidad de gasto presupuestal en inversiones - Salud', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Total --}}
                <div class="grid-br-12">
                    <div class="row">
                        <div>
                            <h2 class="clave">Total</h2>
                        </div>
                        <div>
                            <h2 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            //Promedio por año y impacto
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Total', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Total', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
                {{-- Pilar 2 --}}
                <div class="grid-br-13">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 2: Oportunidades para las futuras generaciones</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Educación: EBR y años de educación --}}
                <div class="grid-br-14">
                    <div class="row">
                        <div>
                            <h5 class="clave">Educación: EBR y años de educación</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Educación: EBR y años de educación', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Acceso educación --}}
                <div class="grid-br-15">
                    <table>
                        <tr>
                            <th><h6>Acceso educación (matriculados)</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Acceso educación (matriculados)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Nivel de educación completa</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Nivel de educación de la población', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Nivel de educación de la población', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Logros de aprendizaje</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Logros de Aprendizaje', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Inicial --}}
                <div class="grid-br-16">
                    <table>
                        <tr>
                            <th><h6>Inicial</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>4to primaria</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => '4to prim.', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => '4to prim.', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '4to prim.', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '4to prim.', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => '4to prim.', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '4to prim.', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => '4to prim.', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '4to prim.', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => '4to prim.', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => '4to prim.', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Primaria --}}
                <div class="grid-br-17">
                    <table>
                        <tr>
                            <th><h6>Primaria</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>2do sec.</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => '2do sec.', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => '2do sec.', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '2do sec.', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '2do sec.', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => '2do sec.', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '2do sec.', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => '2do sec.', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => '2do sec.', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => '2do sec.', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => '2do sec.', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Secundaria --}}
                <div class="grid-br-18">
                    <table>
                        <tr>
                            <th><h6>Secundaria</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel secundaria', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </div>
                {{-- Mat 2do sec --}}
                <div class="grid-br-19">
                </div>
                {{-- Filtros --}}
                <div class="grid-br-20">
                    <form action="/brechas" method="POST">
                        @csrf
                        <div>
                            {{-- Unidad Territorial --}}
                            <div class="row">
                                <label for="location">Unidad Territorial</label>
                                <select id="location" name="location" class="select">
                                    <option value="AIO">AIO</option>
                                    <optgroup label="UGT Huallanca">
                                        @foreach ($ugt_huall as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="UGT Huarmey">
                                        @foreach ($ugt_huarmey as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="UGT Mina / San Marcos">
                                        @foreach ($ugt_mina as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="UGT Valle Fortaleza">
                                        @foreach ($ugt_valle as $ugt)
                                        @php
                                            $value = $ugt->coords.",".$ugt->distrito;
                                        @endphp
                                        <option value="{{ $ugt->coords.','.$ugt->distrito }}" <?php if (isset($_POST['location'])){ if($_POST['location']==$value) echo 'selected';}?>>{{ $ugt->distrito }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            {{-- Año --}}
                            <div class="row mt-2">
                                <label id="label2" for="years">Periodo</label>
                                <select id="years" name="years">
                                    <option value="2021" <?php if (isset($_POST['years'])){ if($_POST['years']=="2021") echo 'selected';}?> >2021 (Línea de Base)</option>
                                    <option value="22022" <?php if (isset($_POST['years'])){ if($_POST['years']=="22022") echo 'selected';}?> >2T-2022</option>
                                    <option value="32022" <?php if (isset($_POST['years'])){ if($_POST['years']=="32022") echo 'selected';}?> >3T-2022</option>
                                    <option value="42022" <?php if (isset($_POST['years'])){ if($_POST['years']=="42022") echo 'selected';}?> >4T-2022</option>
                                    <option value="2022" <?php if (isset($_POST['years'])){ if($_POST['years']=="2022") echo 'selected';}?> >2022</option>
                                    <option value="12023" <?php if (isset($_POST['years'])){ if($_POST['years']=="12023") echo 'selected';}?> >1T-2023</option>
                                    <option value="22023" <?php if (isset($_POST['years'])){ if($_POST['years']=="22023") echo 'selected';}?> >2T-2023</option>
                                    <option value="32023" <?php if (isset($_POST['years'])){ if($_POST['years']=="32023") echo 'selected';}?> >3T-2023</option>
                                    <option value="42023" <?php if (isset($_POST['years'])){ if($_POST['years']=="42023") echo 'selected';}?> >4T-2023</option>                                    
                                    <option value="2023" <?php if (isset($_POST['years'])){ if($_POST['years']=="2023") echo 'selected';}?> >2023</option>
                                    <option value="12024" <?php if (isset($_POST['years'])){ if($_POST['years']=="12024") echo 'selected';}?> >1T-2024</option>
                                    <option value="22024" <?php if (isset($_POST['years'])){ if($_POST['years']=="22024") echo 'selected';}?> >2T-2024</option>
                                    <option value="32024" <?php if (isset($_POST['years'])){ if($_POST['years']=="32024") echo 'selected';}?> >3T-2024</option>
                                    <option value="42024" <?php if (isset($_POST['years'])){ if($_POST['years']=="42024") echo 'selected';}?> >4T-2024</option>
                                    <option value="2024" <?php if (isset($_POST['years'])){ if($_POST['years']=="2024") echo 'selected';}?> >2024</option>
                                    <option value="12025" <?php if (isset($_POST['years'])){ if($_POST['years']=="12025") echo 'selected';}?> >1T-2025</option>
                                    <option value="22025" <?php if (isset($_POST['years'])){ if($_POST['years']=="22025") echo 'selected';}?> >2T-2025</option>
                                    <option value="32025" <?php if (isset($_POST['years'])){ if($_POST['years']=="32025") echo 'selected';}?> >3T-2025</option>
                                    <option value="42025" <?php if (isset($_POST['years'])){ if($_POST['years']=="42025") echo 'selected';}?> >4T-2025</option>
                                    <option value="2025" <?php if (isset($_POST['years'])){ if($_POST['years']=="2025") echo 'selected';}?> >2025</option>
                                    <option value="12026" <?php if (isset($_POST['years'])){ if($_POST['years']=="12026") echo 'selected';}?> >1T-2026</option>
                                    <option value="22026" <?php if (isset($_POST['years'])){ if($_POST['years']=="22026") echo 'selected';}?> >2T-2026</option>
                                    <option value="32026" <?php if (isset($_POST['years'])){ if($_POST['years']=="32026") echo 'selected';}?> >3T-2026</option>
                                    <option value="42026" <?php if (isset($_POST['years'])){ if($_POST['years']=="42026") echo 'selected';}?> >4T-2026</option>
                                    <option value="2026" <?php if (isset($_POST['years'])){ if($_POST['years']=="2026") echo 'selected';}?> >2026</option>
                                </select>
                            </div>
                            {{-- Impactos --}}
                            <div class="row mt-2">
                                <label for="imp">Impactos</label>
                                <select id="impacto" name="impacto">
                                    <option value="Con impacto" <?php if (isset($_POST['impacto'])){ if($_POST['impacto']=="Con impacto") echo 'selected';}?>>Con Antamina</option>
                                    <option value="Sin impacto" <?php if (isset($_POST['impacto'])){ if($_POST['impacto']=="Sin impacto") echo 'selected';}?>>Sin Antamina</option>
                                </select>
                            </div>
                            {{-- Boton --}}
                            <div class="row mt-3">
                                <input type="submit" value="Filtrar">
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Vida larga y saludable --}}
                <div class="grid-br-21">
                    <div class="row">
                        <div>
                            <h5 class="clave">Vida larga y saludable</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Vida larga y saludable', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Vida larga y saludable', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Esperanza de vida --}}
                <div class="grid-br-22">
                    <table>
                        <tr>
                            <th><h6>Esperanza de vida</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Esperanza de vida', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Esperanza de vida', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Anemia</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Anemia', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Anemia', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Anemia', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Anemia', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Anemia', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Anemia', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Anemia', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Anemia', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Anemia', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Anemia', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Desnutrición Crónica</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Desnutrición crónica infantil', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Afiliación a seguro de salud</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Población afiliada a algún tipo de seguro', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="grid-br-23"></div>
                {{-- Pilar 3 --}}
                <div class="grid-br-24">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 3: Infraestructura social y productiva</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Servicios Básicos --}}
                <div class="grid-br-25">
                    <div class="row">
                        <div>
                            <h5 class="clave">Servicios Básicos</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Servicios Básicos', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Servicios Básicos', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Servicios de internet (antenas) --}}
                <div class="grid-br-26">
                    <table>
                        <tr>
                            <th><h6>Servicios de internet (antenas)</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Hogares con internet', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Hogares con internet', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Telefonía móvil</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Hogares con telefonía celular', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Agua</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Viviendas por red pública de agua dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Desagüe --}}
                <div class="grid-br-27">
                    <table>
                        <tr>
                            <th><h6>Desagüe</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Viviendas con red pública de desagüe dentro de la vivienda', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Electrificación</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Viviendas con alumbrado eléctrico por red pública', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>PTAR</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Plantas de Tratamiento de Aguas Residuales (PTAR)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Vial Pavimentada --}}
                <div class="grid-br-29">
                    <table>
                        <tr>
                            <th><h6>Vial pavimentada</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Vial pavimentada', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Vial pavimentada', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr></tr>
                    </table>
                    
                </div>
                {{-- Social --}}
                <div class="grid-br-30">
                    <div class="row">
                        <div>
                            <h5 class="clave">Social</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Social', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Social', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Social', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Social', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Social', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Social', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Social', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Social', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Social', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Social', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Hospitales: Camas por mil hab. --}}
                <div class="grid-br-31">
                    <table>
                        <tr>
                            <th><h6>Hospitales: Camas por mil hab.</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Camas de Hospitalización e internamientos', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Colegios: Adecuado Estado IIEE</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Mejoras de IIEE', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Mejoras de IIEE', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- M/L Plazo --}}
                <div class="grid-br-32">
                    <table>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>M/L Plazo</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Locales públicos en buen estado (% del total)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Retorno seguro --}}
                <div class="grid-br-33">
                    <table>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>Retorno seguro</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Retorno seguro', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Retorno seguro', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{--  --}}
                <div class="grid-br-34">
                </div>
                {{--  --}}
                <div class="grid-br-35">
                </div>
                {{--  --}}
                <div class="grid-br-36">
                </div>
                {{-- Productiva --}}
                <div class="grid-br-37">
                    <div class="row">
                        <div>
                            <h5 class="clave">Productiva</h4>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Productiva', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Productiva', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Productiva', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Productiva', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Productiva', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Productiva', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Productiva', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div>
                            <h6 class="clave">Mantenimiento</h6>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo '-';
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Mantenimiento', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            echo '-';
                                        }
                                    } else {
                                        //Promedio total
                                        echo '-';
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Infraestructura agropecuaria --}}
                <div class="grid-br-38">
                    <table>
                        <tr>
                            <th><h6>Infraestructura Agropecuaria</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Agropecuaria (riego tecnificado)', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Turística</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Turística', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Turística', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Turística', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Turística', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Turística', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Turística', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Turística', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Turística', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Turística', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Turística', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Académica</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Académica', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Académica', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Académica', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Académica', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Académica', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Académica', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Académica', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Académica', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Académica', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Académica', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Importancia del monto asignado</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            echo '-';
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Importancia del monto asignado', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            echo '-';
                                        }
                                    } else {
                                        //Promedio total
                                        echo '-';
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Velocidad de ejecución</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            echo '-';
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Velocidad de ejecución', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            echo '-';
                                        }
                                    } else {
                                        //Promedio total
                                        echo '-';
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Titulo potencialidades --}}
                <div class="grid-br-39">
                    <table>
                        <tr>
                            <th><h5>Potencialidades</h5></th>
                        </tr>
                    </table>
                </div>
                {{-- Potencialidades --}}
                <div class="grid-br-40">
                    <table>
                        <?php
                            if (isset($_POST['location'])) {
                                if ($_POST['location']=="AIO") {
                                    //Todos las potencialidades
                                    $potencialidad = DB::table('aiopotenc')->select(
                                        'distrito',
                                        'potencialidad',
                                        'url',
                                        'hexcolor'
                                    )
                                    ->get();
                                } else {
                                    //Potencialidades de X distrito
                                    $location = $_POST['location'];
                                    $distrito = explode(",",$location);
                                    $distrito_nom = $distrito[2];
                                    $potencialidad = DB::table('potencialidades')->select(
                                        'distrito',
                                        'potencialidad',
                                        'url',
                                        'hexcolor'
                                    )
                                    ->where('distrito',$distrito_nom)
                                    ->get();
                                }
                            } else {
                                //Todos las potencialidades
                                $potencialidad = DB::table('aiopotenc')->select(
                                        'distrito',
                                        'potencialidad',
                                        'url',
                                        'hexcolor'
                                    )
                                    ->get();
                            }
                        ?>
                        @foreach ($potencialidad as $poten)
                            <tr>
                                <td>
                                    <div class="row mb-2" id="potb" style="background-color: {{$poten->hexcolor}};">
                                        <div class="col-3">
                                            <img src="{{ $poten->url }}" class="img-pt">
                                        </div>
                                        <div class="col-9">
                                            <p id="idpotencialidad">{{ $poten->potencialidad }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="grid-br-41"></div>
                {{-- Pilar 4 --}}
                <div class="grid-br-42">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 4: Emprendimiento y desarrollo económico</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Capital Humano --}}
                <div class="grid-br-43">
                    <div class="row">
                        <div>
                            <h5 class="clave">Capital Humano</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Capital Humano', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Capital Humano', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Capital Humano', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Capital Humano', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <th><h6>Ingreso por persona</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            echo '-';
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Ingreso por persona', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            echo '-';
                                        }
                                    } else {
                                        //Promedio total
                                        echo '-';
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- PEA --}}
                <div class="grid-br-44">
                    <table>
                        <tr>
                            <th><h6>PEA</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Poblacion economicante activa - PEA', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>PEA ocupada</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'PEA Ocupada', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'PEA Ocupada', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Formación Univ./Técnica</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Formación Univ./Técnica', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Pilar 5 --}}
                <div class="grid-br-45">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 5: Emergencias</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Vacuna Covid-19 --}}
                <div class="grid-br-46">
                    <div class="row">
                        <div>
                            <h5 class="clave">Vacuna Covid-19</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Vacuna Covid-19', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Vacuna Covid-19', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Dosis --}}
                <div class="grid-br-47">
                    <table>
                        <tr>
                            <th><h6>1ra dosis</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Vacunación 1ra dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>2da dosis</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Vacunación 2da dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>3ra dosis</h6></th>
                            <td>
                                <h6>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years']) or isset($_POST['impacto'])) {
                                        // Todos
                                        if ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio total
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } elseif ($_POST['years']=="2021" and $_POST['impacto']=="Sin impacto") {echo '-';} // Impacto
                                        elseif ($_POST['location']=="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por impacto
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => 'AIO', 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año and impacto 
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por año y impacto
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => 'AIO', 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito and Año and Impacto 
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']!="Todos") {
                                            //Promedio por distrito, año y impacto
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => $distrito_nom, 'impacto' => $impacto, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => $distrito_nom];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año
                                        elseif ($_POST['location']=="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            //Promedio por año
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => 'AIO', 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Distrito e impacto
                                        elseif ($_POST['location']!="AIO" and $_POST['years']=="Todos" and $_POST['impacto']!="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $impacto = $_POST['impacto'];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => $distrito_nom, 'impacto' => $impacto];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } // Año y Distrito
                                        elseif ($_POST['location']!="AIO" and $_POST['years']!="Todos" and $_POST['impacto']=="Todos") {
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => $distrito_nom, 'anio' => $anio];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } //Total
                                        else {
                                            //Promedio total
                                            $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    } else {
                                        //Promedio total
                                        $query = ['variable' => 'Vacunación 3ra dosis', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- Tabla cierre brechas --}}
            <hr>
            <div class="cierre-brechas text-center">
                <h3>KPI Antamina: Reducción de Brechas en el AIO por Pilares y Distritos</h3>
                <p>(Porcentajes)</p>
                <table id="brecha" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
                    <tbody>
                        <tr class="row0">
                            <td class="column0 style1 null"></td>
                            <td class="column1 style2 null"></td>
                            <td class="column2 style3 s">Pilar 1: Institucionalidad madura</td>
                            <td class="column3 style3 s">Pilar 2: Oportunidades para las futuras generaciones</td>
                            <td class="column4 style3 s">Pilar 3: Infraestructura social y productiva</td>
                            <td class="column5 style3 s">Pilar 4: Emprendimiento y desarrollo económico</td>
                            <td class="column6 style3 s">Pilar 5: Emergencias </td>
                            <td class="column7 style3 s">Total</td>
                        </tr>
                        <tr class="row1">
                            <td class="column0 style13 s style13" rowspan="4">UGT Mina / San Marcos</td>
                            <td class="column1 style4 s">San Marcos</td>
                            <td class="column2 style5 s">51/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                / 38
                            </td>
                            <td class="column3 style5 s">31/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /26
                            </td>
                            <td class="column4 style5 s">60/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /42
                            </td>
                            <td class="column5 style5 s">44/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /46
                            </td>
                            <td class="column6 style5 s">43/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /30
                            </td>
                        </tr>
                        <tr class="row2">
                            <td class="column1 style7 s">San Pedro de Chaná</td>
                            <td class="column2 style8 s">47/
                                <?php
                                if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                    $anio = $_POST['years'];
                                    $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                    $total = DB::table('brechasbd')
                                        ->where($query)
                                        ->avg('porcentaje');
                                    echo number_format($total,0);
                                } else {
                                    $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                    $total = DB::table('brechasbd')
                                        ->where($query)
                                        ->avg('porcentaje');
                                    echo number_format($total,0);
                                }
                                ?> 
                                /30
                            </td>
                            <td class="column3 style8 s">34/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /25
                            </td>
                            <td class="column4 style8 s">68/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                            <td class="column5 style8 s">57/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /72
                            </td>
                            <td class="column6 style8 s">55/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>    
                                /0
                            </td>
                            <td class="column7 style9 s">52/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>    
                                /34
                            </td>
                        </tr>
                        <tr class="row3">
                            <td class="column1 style4 s">Huachis</td>
                            <td class="column2 style5 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /40
                            </td>
                            <td class="column3 style5 s">39/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /30
                            </td>
                            <td class="column4 style5 s">62/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /46
                            </td>
                            <td class="column5 style5 s">55/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /69
                            </td>
                            <td class="column6 style5 s">70/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">52/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /37
                            </td>
                        </tr>
                        <tr class="row4">
                            <td class="column1 style7 s">Chavín de Huántar</td>
                            <td class="column2 style8 s">48/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                            <td class="column3 style8 s">28/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /23
                            </td>
                            <td class="column4 style8 s">65/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /46
                            </td>
                            <td class="column5 style8 s">55/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /67
                            </td>
                            <td class="column6 style8 s">53/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">49/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /36
                            </td>
                        </tr>
                        <tr class="row5">
                            <td class="column0 style14 s style14" rowspan="5">UGT Huallanca</td>
                            <td class="column1 style4 s">Huallanca</td>
                            <td class="column2 style5 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /53
                            </td>
                            <td class="column3 style5 s">28/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /24
                            </td>
                            <td class="column4 style5 s">67/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /50
                            </td>
                            <td class="column5 style5 s">49/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /52
                            </td>
                            <td class="column6 style5 s">42/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">49/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /36
                            </td>
                        </tr>
                        <tr class="row6">
                            <td class="column1 style7 s">Aquia</td>
                            <td class="column2 style8 s">67/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /58
                            </td>
                            <td class="column3 style8 s">33/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /23
                            </td>
                            <td class="column4 style8 s">61/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /49
                            </td>
                            <td class="column5 style8 s">51/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /54
                            </td>
                            <td class="column6 style8 s">52/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">53/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /37
                            </td>
                        </tr>
                        <tr class="row7">
                            <td class="column1 style4 s">Chiquián</td>
                            <td class="column2 style5 s">59/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /48
                            </td>
                            <td class="column3 style5 s">30/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /28
                            </td>
                            <td class="column4 style5 s">51/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /36
                            </td>
                            <td class="column5 style5 s">44/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /49
                            </td>
                            <td class="column6 style5 s">36/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">45/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /32
                            </td>
                        </tr>
                        <tr class="row8">
                            <td class="column1 style7 s">Puños</td>
                            <td class="column2 style8 s">54/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /57
                            </td>
                            <td class="column3 style8 s">36/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /27
                            </td>
                            <td class="column4 style8 s">74/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /50
                            </td>
                            <td class="column5 style8 s">54/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /71
                            </td>
                            <td class="column6 style8 s">72/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                        </tr>
                        <tr class="row9">
                            <td class="column1 style4 s">Llata</td>
                            <td class="column2 style5 s">57/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /52
                            </td>
                            <td class="column3 style5 s">30/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /21
                            </td>
                            <td class="column4 style5 s">57/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                            <td class="column5 style5 s">60/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /62
                            </td>
                            <td class="column6 style5 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">51/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /35
                            </td>
                        </tr>
                        <tr class="row10">
                            <td class="column0 style13 s style13" rowspan="10">UGT Valle fortaleza</td>
                            <td class="column1 style7 s">Pampas Chico</td>
                            <td class="column2 style8 s">63/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /57
                            </td>
                            <td class="column3 style8 s">37/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /31
                            </td>
                            <td class="column4 style8 s">62/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /52
                            </td>
                            <td class="column5 style8 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /61
                            </td>
                            <td class="column6 style8 s">64/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /15
                            </td>
                            <td class="column7 style9 s">53/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /43
                            </td>
                        </tr>
                        <tr class="row11">
                            <td class="column1 style4 s">Marca</td>
                            <td class="column2 style5 s">60/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /44
                            </td>
                            <td class="column3 style5 s">43/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                            <td class="column4 style5 s">70/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /66
                            </td>
                            <td class="column5 style5 s">58/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /66
                            </td>
                            <td class="column6 style5 s">70/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /17
                            </td>
                            <td class="column7 style6 s">58/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /47
                            </td>
                        </tr>
                        <tr class="row12">
                            <td class="column1 style7 s">Cajacay</td>
                            <td class="column2 style8 s">74/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /51
                            </td>
                            <td class="column3 style8 s">33/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /19
                            </td>
                            <td class="column4 style8 s">71/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /46
                            </td>
                            <td class="column5 style8 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /54
                            </td>
                            <td class="column6 style8 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /34
                            </td>
                        </tr>
                        <tr class="row13">
                            <td class="column1 style4 s">Huayllacayán</td>
                            <td class="column2 style5 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /56
                            </td>
                            <td class="column3 style5 s">42/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /25
                            </td>
                            <td class="column4 style5 s">65/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /57
                            </td>
                            <td class="column5 style5 s">49/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /67
                            </td>
                            <td class="column6 style5 s">54/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">53/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                        </tr>
                        <tr class="row14">
                            <td class="column1 style7 s">Antonio Raymondi</td>
                            <td class="column2 style8 s">55/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /52
                            </td>
                            <td class="column3 style8 s">29/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /19
                            </td>
                            <td class="column4 style8 s">77/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /52
                            </td>
                            <td class="column5 style8 s">48/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /63
                            </td>
                            <td class="column6 style8 s">62/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /8
                            </td>
                            <td class="column7 style9 s">53/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /39
                            </td>
                        </tr>
                        <tr class="row15">
                            <td class="column1 style4 s">Llacllín</td>
                            <td class="column2 style5 s">48/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /56
                            </td>
                            <td class="column3 style5 s">48/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /34
                            </td>
                            <td class="column4 style5 s">63/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /56
                            </td>
                            <td class="column5 style5 s">54/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /61
                            </td>
                            <td class="column6 style5 s">62/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">53/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                        </tr>
                        <tr class="row16">
                            <td class="column1 style7 s">Colquioc</td>
                            <td class="column2 style8 s">61/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /56
                            </td>
                            <td class="column3 style8 s">28/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /26
                            </td>
                            <td class="column4 style8 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /49
                            </td>
                            <td class="column5 style8 s">45/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /48
                            </td>
                            <td class="column6 style8 s">40/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /36
                            </td>
                        </tr>
                        <tr class="row17">
                            <td class="column1 style4 s">Pararín</td>
                            <td class="column2 style5 s">57/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /50
                            </td>
                            <td class="column3 style5 s">50/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /42
                            </td>
                            <td class="column4 style5 s">67/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /48
                            </td>
                            <td class="column5 style5 s">47/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /65
                            </td>
                            <td class="column6 style5 s">71/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /41
                            </td>
                        </tr>
                        <tr class="row18">
                            <td class="column1 style7 s">Paramonga</td>
                            <td class="column2 style8 s">39/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /49
                            </td>
                            <td class="column3 style8 s">28/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /30
                            </td>
                            <td class="column4 style8 s">57/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /58
                            </td>
                            <td class="column5 style8 s">35/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /37
                            </td>
                            <td class="column6 style8 s">30/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">39/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /35
                            </td>
                        </tr>
                        <tr class="row19">
                            <td class="column1 style4 s">Cátac</td>
                            <td class="column2 style5 s">66/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /53
                            </td>
                            <td class="column3 style5 s">24/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /21
                            </td>
                            <td class="column4 style5 s">49/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /47
                            </td>
                            <td class="column5 style5 s">51/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /60
                            </td>
                            <td class="column6 style5 s">60/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style6 s">48/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /36
                            </td>
                        </tr>
                        <tr class="row20">
                            <td class="column0 style10 s">UGT Huarmey</td>
                            <td class="column1 style11 s">Huarmey</td>
                            <td class="column2 style8 s">61/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /42
                            </td>
                            <td class="column3 style8 s">22/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /20
                            </td>
                            <td class="column4 style8 s">61/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /49
                            </td>
                            <td class="column5 style8 s">34/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /43
                            </td>
                            <td class="column6 style8 s">39/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /0
                            </td>
                            <td class="column7 style9 s">44/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /31
                            </td>
                        </tr>
                        <tr class="row21">
                            <td class="column0 style15 s style16" colspan="2">Total</td>
                            <td class="column2 style12 s">56/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /53
                            </td>
                            <td class="column3 style12 s">34/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /27
                            </td>
                            <td class="column4 style12 s">63/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /49
                            </td>
                            <td class="column5 style12 s">49/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /58
                            </td>
                            <td class="column6 style12 s">54/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /2
                            </td>
                            <td class="column7 style12 s">51/
                                <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                ?>
                                /38
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h6>
                    2021 <b>/ <?php if(isset($_POST['years']) and $_POST['years']!='Todos'){ if($_POST['years']=="32022"){echo '3T 2022';} elseif($_POST['years']=="22022"){echo '2T 2022';} else { echo $_POST['years'];}} else { echo '2T 2022';} ?> /</b> 2026
                </h6>
                <p class="fuente">Fuente: PNUD, INEI, CCD, elaboración propia</p>
            </div>
            <hr>
            <div class="row dwnld-div">
                <a href="/descargar-brechas">
                    <svg class="dwnld-re" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" fill="#FFF" stroke-miterlimit="10" stroke-width="2">
                        <path stroke="#979593" d="M67.1716,7H27c-1.1046,0-2,0.8954-2,2v78 c0,1.1046,0.8954,2,2,2h58c1.1046,0,2-0.8954,2-2V26.8284c0-0.5304-0.2107-1.0391-0.5858-1.4142L68.5858,7.5858 C68.2107,7.2107,67.702,7,67.1716,7z"/>
                        <path fill="none" stroke="#979593" d="M67,7v18c0,1.1046,0.8954,2,2,2h18"/>
                        <path fill="#C8C6C4" d="M51 61H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 60.5523 51.5523 61 51 61zM51 55H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 54.5523 51.5523 55 51 55zM51 49H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 48.5523 51.5523 49 51 49zM51 43H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 42.5523 51.5523 43 51 43zM51 67H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 66.5523 51.5523 67 51 67zM79 61H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 60.5523 79.5523 61 79 61zM79 67H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 66.5523 79.5523 67 79 67zM79 55H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 54.5523 79.5523 55 79 55zM79 49H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 48.5523 79.5523 49 79 49zM79 43H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 42.5523 79.5523 43 79 43zM65 61H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 60.5523 65.5523 61 65 61zM65 67H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 66.5523 65.5523 67 65 67zM65 55H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 54.5523 65.5523 55 65 55zM65 49H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 48.5523 65.5523 49 65 49zM65 43H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 42.5523 65.5523 43 65 43z"/>
                        <path fill="#107C41" d="M12,74h32c2.2091,0,4-1.7909,4-4V38c0-2.2091-1.7909-4-4-4H12c-2.2091,0-4,1.7909-4,4v32 C8,72.2091,9.7909,74,12,74z"/>
                        <path d="M16.9492,66l7.8848-12.0337L17.6123,42h5.8115l3.9424,7.6486c0.3623,0.7252,0.6113,1.2668,0.7471,1.6236 h0.0508c0.2617-0.58,0.5332-1.1436,0.8164-1.69L33.1943,42h5.335l-7.4082,11.9L38.7168,66H33.041l-4.5537-8.4017 c-0.1924-0.3116-0.374-0.6858-0.5439-1.1215H27.876c-0.0791,0.2684-0.2549,0.631-0.5264,1.0878L22.6592,66H16.9492z"/>
                    </svg>
                     DATA
                </a>
            </div>
            <div class="p-4">
                <h3>Documentos de interés de 
                    <b id="unidadt"><?php
                        if(isset($_POST['location'])) {
                            if ($_POST['location'] != "AIO") {
                                $location = $_POST['location'];
                                $distrito = explode(",",$location);
                                $distrito_nom = $distrito[2];
                                echo $distrito_nom;
                            } else {
                                echo "AIO";
                            }
                        } else {
                            echo "AIO";
                        }
                        ?></b>
                </h3>
                <ul id="utAIO" class="class-list-block">
                    <li><a href="#">Documento sobre tema 1</a></li>
                    <li><a href="#">Documento sobre tema 2</a></li>
                    <li><a href="#">Documento sobre tema 3</a></li>
                    <li><a href="#">Documento sobre tema 4</a></li>
                </ul>
                <ul id="utAquia" class="class-list-none">
                    <li><a href="#">Documento sobre Aquia 1</a></li>
                    <li><a href="#">Documento sobre Aquia 2</a></li>
                    <li><a href="#">Documento sobre Aquia 3</a></li>
                    <li><a href="#">Documento sobre Aquia 4</a></li>
                </ul>
            </div>
        </div>
        <!-- Brechas End -->

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
    <!-- Documentos de interés -->
    <script src="js/docs.js"></script>
    {{-- Loader --}}
    <script type="text/javascript">
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
</body>
</html>