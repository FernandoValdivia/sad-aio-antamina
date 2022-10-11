<?php 
    error_reporting(E_ALL);
    session_start();
    //variables de select para cambiar título
    function getName() {
        $distrito = "";
        $anio = "";

        if (isset($_POST['location'],$_POST['years'])) {
            $_SESSION['distrito'] = $distrito = $_POST['location'];
            $_SESSION['anio'] = $anio = $_POST['years'];
        } elseif (isset($_SESSION['distrito'],$_SESSION['anio'])) {
            $distrito = $_SESSION['distrito'];
            $anio = $_SESSION['anio'];
        }

        if ($distrito=="AIO") {
            echo "IDH distritos del AIO";
        } elseif (isset($_POST['location'])) {
            $distrito = $_POST['location'];
            $nombre = explode(",",$distrito);
            $distrito_nom = $nombre[2];
            echo "IDH de ".$distrito_nom;
        } else {
            echo "IDH distritos del AIO";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Resumen</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Sistema de Administración del Desarrollo - Resumen" name="description">
    <meta content="" name="keywords">
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    {{-- Logo --}}
                    <div class="row m-4 divlogo">
                        {{-- <div class="col-3 logo">
                            <img class="img-logo" src="/img/logo-navbar2.png" alt="logoccd">
                            <p>CENTRO PARA</p>
                            <p>LA COMPETITIVIDAD</p>
                            <p>Y EL DESARROLLO</p>
                        </div>
                        <div class="col-9">
                            <p> SAD AIO Antamina</p>
                        </div> --}}
                        <img src="/img/logo-sad.png" alt="Logo SAD" class="img-fluid">
                    </div>
                    {{-- End Logo --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="/" class="nav-item nav-link">Home</a>
                        <a href="/resumen" class="nav-item nav-link active">Resumen</a>
                        <a href="/brechas" class="nav-item nav-link">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-1 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Resumen</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#" class="aactiva">Resumen</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Resumen</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <!-- Resumen Start -->
        <div class="container-xxl">
            <div class="container-fluid-rsm">
                <div class="grid-rsm-container">
                    <div class="grid-rsm-1"></div>
                    <!-- titulo -->
                    <div class="grid-rsm-2">
                        <div class="row text-center">
                            <h3 id="titulo"><?=getName();?></h3>
                            <p>(Comparación relativa)</p>
                        </div>
                    </div>
                    <div class="grid-rsm-3"></div>
                    <!-- IDH -->
                    <div class="grid-rsm-4">
                        <div class="col-9">
                            <h4>IDH</h4>
                            <small>(Índice)</small>
                        </div>
                        <div class="col-3">
                            <h4>
                            <?php                           
                                //filtro año y distrito
                                if (isset($_POST['location']) or isset($_POST['years'])) {
                                    //solo distrito
                                    if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                        if ($_POST['location']=="AIO") {
                                        //Promedio idh
                                        $idh = DB::table('idh')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                        } else {
                                            //Potencialidades de X distrito
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            //
                                            $idh = DB::table('idh')
                                                    ->where('distrito',$distrito_nom)
                                                    ->avg('idh');
                                                echo number_format($idh,2);
                                        }
                                    //solo año
                                    } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                        if ($_POST['years']=="Todos") {
                                        //Promedio idh
                                        $idh = DB::table('idh')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                        } else {
                                            //Potencialidades de X distrito
                                            $anio = $_POST['years'];
                                            //
                                            $idh = DB::table('idh')
                                                    ->where('anio',$anio)
                                                    ->avg('idh');
                                                echo number_format($idh,2);
                                        }
                                    //distrito y año
                                    } else {
                                        //Potencialidades de X distrito y año
                                        $location = $_POST['location'];
                                        $distrito = explode(",",$location);
                                        $distrito_nom = $distrito[2];
                                        $anio = $_POST['years'];
                                        //Query
                                        $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                        //
                                        $idh = DB::table('idh')
                                                ->where($query)
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                    }
                                } else {
                                    $idh = DB::table('idh')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                }
                            ?>
                            </h4>
                        </div>
                    </div>
                    <!-- Ingresos per cápita -->
                    <div class="grid-rsm-5">
                        <div class="col-9">
                            <h4>Ingresos per cápita</h4>
                            <small>(Soles mensual)</small>
                        </div>
                        <div class="col-3">
                            <h4>
                            <?php
                                //filtro año y distrito
                                if (isset($_POST['location']) or isset($_POST['years'])) {
                                    //solo distrito
                                    if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                        if ($_POST['location']=="AIO") {
                                        //Promedio idh
                                        $ingr = DB::table('idh')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                        } else {
                                            //Potencialidades de X distrito
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            //
                                            $ingr = DB::table('idh')
                                                    ->where('distrito',$distrito_nom)
                                                    ->avg('ingreso_per_capita');
                                                echo number_format($ingr,0);
                                        }
                                    //solo año
                                    } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                        if ($_POST['years']=="Todos") {
                                        //Promedio idh
                                        $ingr = DB::table('idh')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                        } else {
                                            //Potencialidades de X distrito
                                            $anio = $_POST['years'];
                                            //
                                            $ingr = DB::table('idh')
                                                    ->where('anio',$anio)
                                                    ->avg('ingreso_per_capita');
                                                echo number_format($ingr,0);
                                        }
                                    //distrito y año
                                    } else {
                                        //Potencialidades de X distrito y año
                                        $location = $_POST['location'];
                                        $distrito = explode(",",$location);
                                        $distrito_nom = $distrito[2];
                                        $anio = $_POST['years'];
                                        //Query
                                        $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                        //
                                        $ingr = DB::table('idh')
                                                ->where($query)
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                    }
                                } else {
                                    $ingr = DB::table('idh')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                }
                            ?>
                            </h4>
                        </div>
                    </div>
                    <!-- Brecha física -->
                    <div class="grid-rsm-6">
                        <table>
                            <tr>
                                <th>
                                    <h4>Brecha física</h4>
                                    <small>(%)</small>
                                </th>
                                <td>
                                    <h5>
                                        <?php
                                            //filtro año y distrito
                                            if (isset($_POST['location']) or isset($_POST['years'])) {
                                                //solo distrito
                                                if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                    if ($_POST['location']=="AIO") {
                                                        //Promedio brechas
                                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Total', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'anio' => $anio];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Total', 'distrito' => $distrito_nom, 'anio' => $anio];
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
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Institucionalidad Madura</p></th>
                                <td>
                                    <p>
                                        <?php
                                            //filtro año y distrito
                                            if (isset($_POST['location']) or isset($_POST['years'])) {
                                                //solo distrito
                                                if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                    if ($_POST['location']=="AIO") {
                                                        //Promedio brechas
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'anio' => $anio];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom, 'anio' => $anio];
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
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Oportunidades para las futuras generaciones</p></td>
                                <td>
                                    <p>
                                        <?php
                                            //filtro año y distrito
                                            if (isset($_POST['location']) or isset($_POST['years'])) {
                                                //solo distrito
                                                if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                    if ($_POST['location']=="AIO") {
                                                        //Promedio brechas
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'anio' => $anio];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom, 'anio' => $anio];
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
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Infraestructura social y productiva</p></th>
                                <td>
                                    <p>
                                        <?php
                                            //filtro año y distrito
                                            if (isset($_POST['location']) or isset($_POST['years'])) {
                                                //solo distrito
                                                if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                    if ($_POST['location']=="AIO") {
                                                        //Promedio brechas
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'anio' => $anio];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom, 'anio' => $anio];
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
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Emprendimiento y desarrollo econónico</p></th>
                                <td>
                                    <p>
                                        <?php
                                            //filtro año y distrito
                                            if (isset($_POST['location']) or isset($_POST['years'])) {
                                                //solo distrito
                                                if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                    if ($_POST['location']=="AIO") {
                                                        //Promedio brechas
                                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => 'AIO', 'anio' => $anio];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Emprendimiento  y desarrollo económico', 'distrito' => $distrito_nom, 'anio' => $anio];
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
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th><p>Emergencias</p></th>
                                <td>
                                    <p>
                                        <?php
                                            //filtro año y distrito
                                            if (isset($_POST['location']) or isset($_POST['years'])) {
                                                //solo distrito
                                                if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                                    if ($_POST['location']=="AIO") {
                                                        //Promedio brechas
                                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '2021'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'anio' => $anio];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,0);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom, 'anio' => $anio];
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
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Brecha financiera -->
                    <div class="grid-rsm-7">
                        <div class="col-8">
                            <h4>Brecha financiera</h4>
                            <small>(Millones de Soles)</small>
                        </div>
                        <div class="col-4">
                            <h4>
                                @php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total de brecha financiera
                                            $financiera = DB::table('brecha_financiera')
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            } else {
                                                //Brecha financiera por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $financiera = DB::table('brecha_financiera')
                                                    ->where('distrito',$distrito_nom)
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $financiera = DB::table('brecha_financiera')
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $financiera = DB::table('brecha_financiera')
                                                    ->where('anio',$anio)
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $financiera = DB::table('brecha_financiera')
                                                    ->where($query)
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                        }
                                    } else {
                                        //Total de brecha financiera
                                        $financiera = DB::table('brecha_financiera')
                                                    ->avg('monto');
                                                    echo number_format($financiera,2);
                                    }
                                @endphp
                            </h4>
                        </div>
                    </div>
                    <!-- Map -->
                    <div class="grid-rsm-8">
                        <div id="map-rsm"></div> 
                    </div>
                    <!-- Filtros -->
                    <div class="grid-rsm-9">
                        <form action="/resumen" method="POST">
                            @csrf
                            <div class="row" id="select-location">
                                <label for="location">Unidad territorial</label>
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
                                <label for="years" class="mt-3">Años</label>
                                <select name="years" id="yrs">
                                    <option value="Todos">Todos</option>
                                    <option value="2021" <?php if (isset($_POST['years'])){ if($_POST['years']=="2021") echo 'selected';}?> >2021</option>
                                    <option value="2022" <?php if (isset($_POST['years'])){ if($_POST['years']=="2022") echo 'selected';}?> >2022</option>
                                    <option value="2023" <?php if (isset($_POST['years'])){ if($_POST['years']=="2023") echo 'selected';}?> >2023</option>
                                    <option value="2024" <?php if (isset($_POST['years'])){ if($_POST['years']=="2024") echo 'selected';}?> >2024</option>
                                    <option value="2026" <?php if (isset($_POST['years'])){ if($_POST['years']=="2026") echo 'selected';}?> >2026</option>
                                </select>
                                <input type="submit" class="mt-3" value="Filtrar">
                            </div>
                        </form>
                    </div>
                    <!-- Potencialidades -->
                    <div class="grid-rsm-11">
                        <table>
                            <thead>
                                <th><h5 class="mt-2">Potencialidades</h5></th>
                            </thead>
                            <?php
                                if (isset($_POST['location'])) {
                                    if ($_POST['location']=="AIO") {
                                        //Todas las potencialidades
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
                                    //Todas las potencialidades
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
                                        <div class="row mb-2" id="pot1" style="background-color: {{$poten->hexcolor}};">
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
                    <!-- Proyectos -->
                    <div class="grid-rsm-12">
                        <table>
                            <tr>
                                <th><h5>Proyectos <sup>1/</sup></h5></th>
                                <th class="text-center"><h6>Número</h6></th>
                                <td class="text-center">
                                    <h6>Monto</h6>
                                    <small>(S/ millones)</small>
                                </td>
                            </tr>
                            <tr>
                                <th><h4>Total</h4></th>
                                <th class="txt"><strong>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where('distrito',$distrito_nom)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where('anio',$anio)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </strong></th>
                                <th class="txt"><strong>
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where('anio',$anio)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </strong></th>
                            </tr>
                            {{-- First engagement - deleted --}}
                            <tr>
                                <td>Short Term</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Short Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Short Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Short Term'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','Short Term')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Short Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Short Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Short Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Short Term'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','Short Term')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Medium Term</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Medium Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Medium Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Medium Term'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','Medium Term')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Medium Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Medium Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Medium Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Medium Term'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','Medium Term')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Long Term</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Long Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Long Term'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Long Term'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('time_frame','Long Term')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Long Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('time_frame','Long Term')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'time_frame' => 'Long Term'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'time_frame' => 'Long Term'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('time_frame','Long Term')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Modalidad de intervención -->
                    <div class="grid-rsm-13">
                        <table>
                            <tr>
                                <th><h5>Modalidad de <br>intervención</h5></th>
                                <th class="text-center"><h6>Número</h6></th>
                                <td class="text-center">
                                    <h6>Monto</h6>
                                    <small>(S/ millones)</small>
                                </td>
                            </tr>
                            <tr>
                                <td>Proyectos sociales</td>
                                {{-- Cantidad --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: OPEX')
                                                    ->orWhere('tipo_de_inversion', 'Inversión Social Directa Antamina: CAPEX')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom];
                                                //
                                                $tipos = ['Inversión Social Directa Antamina: OPEX','Inversión Social Directa Antamina: CAPEX'];
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->whereIn('tipo_de_inversion',$tipos)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: OPEX')
                                                    ->orWhere('tipo_de_inversion', 'Inversión Social Directa Antamina: CAPEX')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio];
                                                //
                                                $tipos = ['Inversión Social Directa Antamina: OPEX','Inversión Social Directa Antamina: CAPEX'];
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->whereIn('tipo_de_inversion',$tipos)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $tipos = ['Inversión Social Directa Antamina: OPEX','Inversión Social Directa Antamina: CAPEX'];
                                            $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->whereIn('tipo_de_inversion',$tipos)
                                                        ->count();
                                                        echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Directa Antamina: OPEX')
                                                ->orWhere('tipo_de_inversion', 'Inversión Social Directa Antamina: CAPEX')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                {{-- Monto --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: OPEX')
                                                    ->orWhere('tipo_de_inversion', 'Inversión Social Directa Antamina: CAPEX')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom];
                                                //
                                                $tipos = ['Inversión Social Directa Antamina: OPEX','Inversión Social Directa Antamina: CAPEX'];
                                                $sum = DB::table('proyectos')
                                                            ->where($query)
                                                            ->whereIn('tipo_de_inversion',$tipos)
                                                            ->sum('monto_actualizado');
                                                            echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Directa Antamina: OPEX')
                                                    ->orWhere('tipo_de_inversion', 'Inversión Social Directa Antamina: CAPEX')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio];
                                                //
                                                $tipos = ['Inversión Social Directa Antamina: OPEX','Inversión Social Directa Antamina: CAPEX'];
                                                $sum = DB::table('proyectos')
                                                            ->where($query)
                                                            ->whereIn('tipo_de_inversion',$tipos)
                                                            ->sum('monto_actualizado');
                                                            echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                            //
                                            $tipos = ['Inversión Social Directa Antamina: OPEX','Inversión Social Directa Antamina: CAPEX'];
                                            $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->whereIn('tipo_de_inversion',$tipos)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Directa Antamina: OPEX')
                                                ->orWhere('tipo_de_inversion', 'Inversión Social Directa Antamina: CAPEX')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Pública y privada</td>
                                {{-- Cantidad --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada(Obras por impuesto)')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada(Obras por impuesto)'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada(Obras por impuesto)')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada(Obras por impuesto)'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada(Obras por impuesto)'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada(Obras por impuesto)')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                {{-- Monto --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada(Obras por impuesto)')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada(Obras por impuesto)'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada(Obras por impuesto)')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada(Obras por impuesto)'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Social Gestión Pública y Privada(Obras por impuesto)'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Social Gestión Pública y Privada(Obras por impuesto)')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Inversión pública</td>
                                {{-- Cantidad --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                ->count();
                                                echo $count1;
                                    }
                                ?>
                                </td>
                                {{-- Monto --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $sum = DB::table('proyectos')
                                                    ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                                //
                                                $sum = DB::table('proyectos')
                                                        ->where($query)
                                                        ->sum('monto_actualizado');
                                                        echo number_format($sum,0);
                                            }
                                        //distrito y año
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, 'anio' => $anio, 'tipo_de_inversion' => 'Inversión Pública (GL/GR/GN)'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where('tipo_de_inversion','Inversión Pública (GL/GR/GN)')
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Canon y regalía -->
                    <div class="grid-rsm-14">
                        <table>
                            <tr>
                                <th><h5>Canon y Regalía</h5></th>
                                <th class="text-center"><h6>2007-2021</h6></th>
                                <th class="text-center"><h6>2022</h6></th>
                                <th class="text-center"><h6>2023-2036</h6></th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Mineria y otros</h5>
                                    <small>(Millones de Soles)</small>
                                </th>
                                {{-- 2007-2021 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio','<=',2021,'and')
                                                    ->where('anio','>=',2007)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio','<=',2021,'and')
                                                        ->where('anio','>=',2007, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio','<=',2021,'and')
                                                    ->where('anio','>=',2007)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                                {{-- 2022 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio',2022)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio',2022,'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio',2022)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                                {{-- 2023-2036 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio','<=',2036,'and')
                                                    ->where('anio','>=',2023)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio','<=',2036,'and')
                                                        ->where('anio','>=',2023,'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio','<=',2036,'and')
                                                    ->where('anio','>=',2023)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Inversión Social -->
                    <div class="grid-rsm-15">
                        <table>
                            <tr>
                                <th><h5>Inversión social</h5></th>
                                <th class="text-center"><h6>2022</h6></th>
                                <th class="text-center"><h6>2023</h6></th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Directa Antamina</h5>
                                    <small>(Millones de Soles)</small>
                                </th>
                                {{-- 2022 --}}
                                <td class="text-center">
                                <?php
                                    //filtro distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $is_sum = DB::table('inversion_social')
                                                    ->where('anio',2022)
                                                    ->sum('monto');
                                                    echo number_format($is_sum,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $is_sum = DB::table('inversion_social')
                                                        ->where('anio',2022, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($is_sum,0);
                                            }
                                    } else {
                                        //Total canon
                                        $is_sum = DB::table('inversion_social')
                                                ->where('anio',2022)
                                                ->sum('monto');
                                                echo number_format($is_sum,0);
                                    }
                                ?>
                                </td>
                                {{-- 2023 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $is_sum = DB::table('inversion_social')
                                                    ->where('anio',2023)
                                                    ->sum('monto');
                                                    echo number_format($is_sum,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $is_sum = DB::table('inversion_social')
                                                        ->where('anio',2023, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($is_sum,0);
                                            }
                                    } else {
                                        //Total canon
                                        $is_sum = DB::table('inversion_social')
                                                ->where('anio',2023)
                                                ->sum('monto');
                                                echo number_format($is_sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <p id="referencia"><sup>1/</sup> Proyectos y/o intervenciones</p>
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
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>melissa.sanchez@competitividadccd.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Centro-para-la-Competitividad-y-el-Desarrollo-CCD-151040740434523?_rdc=1&_rdr"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://api.whatsapp.com/send?phone=51922753771"><i class="fab fa-whatsapp"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/centro-para-la-competitividad-y-el-desarrollo-434799214/"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social" href="mailto:melissa.sanchez@competitividadccd.com"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">CCD</a>, Todos los derechos reservados. 
							Desarrollado por <a class="border-bottom" href="https://fernandovaldivia.github.io/about-me/" target="_blank">LValdivia</a> & <a class="border-bottom" href="https://ivanoscco.wixsite.com/my-site" target="_blank">IOscco</a><br><br>
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
    <!-- Script Color Map -->
    <script>
        //Color por IDH
        function getColor(d) {
            switch (d) {
                case "PARARIN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Pararín (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else {  $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Pararín (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Pararín (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';//RED
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';//ORANGE
                    } else if(peru < idh) {
                        return '#57CB8C';//GREEN
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "LLACLLIN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Llacllín (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Llacllín (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Llacllín (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "MARCA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Marca (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Marca (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Marca (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "ANTONIO RAYMONDI":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Antonio Raymondi (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Antonio Raymondi (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Antonio Raymondi (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CAJACAY":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Cajacay (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Cajacay (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Cajacay (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUAYLLACAYAN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "PAMPAS CHICO":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huayllacayán (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CATAC":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Cátac (Recuay / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Cátac (Recuay / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Cátac (Recuay / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "AQUIA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Aquia (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Aquia (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Aquia (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUALLANCA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huallanca (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huallanca (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huallanca (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "LLATA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Llata (Huamalíes / Huánuco)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Llata (Huamalíes / Huánuco)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Llata (Huamalíes / Huánuco)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CHAVIN DE HUANTAR":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Chavín de Huántar (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Chavín de Huántar (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Chavín de Huántar (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "PUÑOS":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Puños (Huamalíes / Huánuco)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Puños (Huamalíes / Huánuco)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Puños (Huamalíes / Huánuco)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "SAN PEDRO DE CHANA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','San Pedro de Chaná (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','San Pedro de Chaná (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','San Pedro de Chaná (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUACHIS":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Huachis (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huachis (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huachis (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "HUARMEY":
                    idh = "<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $idharray = DB::table('idh') ->where('distrito','Huarmey (Huarmey / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Huarmey (Huarmey / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Huarmey (Huarmey / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "COLQUIOC":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Colquioc (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Colquioc (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Colquioc (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "CHIQUIAN":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Chiquián (Bolognesi / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Chiquián (Bolognesi / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Chiquián (Bolognesi / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "SAN MARCOS":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','San Marcos (Huari / Áncash)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','San Marcos (Huari / Áncash)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','San Marcos (Huari / Áncash)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                case "PARAMONGA":
                    idh = "<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') {  $idharray = DB::table('idh') ->where('distrito','Paramonga (Barranca / Lima)') ->avg('idh'); echo $idharray; } else { $anio = $_POST['years']; $idharray = DB::table('idh') ->where('distrito','Paramonga (Barranca / Lima)', 'and') ->where('anio',$anio) ->avg('idh'); echo $idharray; }} else { $idharray = DB::table('idh') ->where('distrito','Paramonga (Barranca / Lima)')->avg('idh'); echo $idharray; }?>";
                    aio = parseFloat("<?php  if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio;} else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; }} else { $query = ['nombre' => 'AIO']; $aio = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $aio; } ?>");
                    peru = parseFloat("<?php if (isset($_POST['years'])) { if ($_POST['years']=='Todos') { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } else { $anio = $_POST['years']; $query = ['anio' => $anio, 'nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } } else { $query = ['nombre' => 'Perú']; $peru = DB::table('aio_peru') ->where($query) ->avg('idh'); echo $peru; } ?>");
                    if (idh < aio) {
                        return '#FF7F7F';
                    } else if(aio <= idh && idh <= peru) {
                        return '#FAC090';
                    } else if(peru < idh) {
                        return '#57CB8C';
                    } else {
                        return '#ffffff';
                    }
                    break;
                default:
                    return '#ffffff';
                    break;
            }
        }   
    </script>
    {{-- Script Map --}}
    <script src="{{ asset('js/map-rsm.js')  }}"></script>

    {{-- Loader --}}
    <script type="text/javascript">
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script type="text/javascript">
        var botmanWidget = {
            frameEndpoint: 'chat.html',
            headerTextColor: '#fff',
            bubbleAvatarUrl: '/img/botlogo.png',
            title: 'Chatea con nosotros!',
            introMessage: "✋ Hola, ¿En que te podemos ayudar?",
            aboutText: 'Powered by LFValdivia',
            aboutLink: 'https://fernandovaldivia.github.io/about-me/',
            placeholderText: 'Escribe un mensaje...',
            mainColor: '#0F172B',
            bubbleBackground: '#0F172B',
            mobileHeight: '100%',
            mobileWidth: '100%'
        };
    </script>
</body>
</html>