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
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Resumen</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="SAD AIO - Resumen" name="description">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link href="/img/logo-sad.svg" rel="icon" type="image/x-icon">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- BOXICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    {{-- Chat whatsapp --}}
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">

    <!-- Mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
    <div class="container-xxl p-0">
        @extends('layouts.navbar')
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
                        <div class="col-8">
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
                                                ->where('distrito','AIO')
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
                                                ->where('distrito','AIO')
                                                ->avg('idh');
                                            echo number_format($idh,2);
                                        } else {
                                            //Potencialidades de X distrito
                                            $anio = $_POST['years'];
                                            //
                                            $idh = DB::table('idh')
                                                    ->where('distrito','AIO')
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
                                    $distrito_nom = 'AIO';
                                    $anio = '22022';
                                    //Query
                                    $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                    //
                                    $idh = DB::table('idh')
                                            ->where($query)
                                            ->avg('idh');
                                        echo number_format($idh,2);
                                }
                            ?>
                            </h4>
                        </div>
                    </div>
                    <!-- Ingresos per cápita -->
                    <div class="grid-rsm-5">
                        <div class="col-8">
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
                                                ->where('distrito','AIO')
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
                                                ->where('distrito','AIO')
                                                ->avg('ingreso_per_capita');
                                            echo number_format($ingr,0);
                                        } else {
                                            //Potencialidades de X distrito
                                            $anio = $_POST['years'];
                                            //
                                            $ingr = DB::table('idh')
                                                    ->where('anio',$anio)
                                                    ->where('distrito','AIO')
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
                                    $distrito_nom = 'AIO';
                                    $anio = '22022';
                                    //Query
                                    $query = ['distrito' => $distrito_nom, 'anio' => $anio];
                                    $ingr = DB::table('idh')
                                            ->where($query)
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
                                    <h4><a href="/brechas">Brecha física</a></h4>
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
                                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Total', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Total', 'distrito' => 'AIO', 'anio' => $anio, 'impacto' => 'Con impacto'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
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
                                                    echo number_format($total,1);
                                                }
                                            } else {
                                                //Promedio total
                                                $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                $total = DB::table('brechasbd')
                                                    ->where($query)
                                                    ->avg('porcentaje');
                                                echo number_format($total,1);
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
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'anio' => $anio, 'impacto' => 'Con impacto'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
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
                                                    echo number_format($total,1);
                                                }
                                            } else {
                                                //Promedio total
                                                $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                $total = DB::table('brechasbd')
                                                    ->where($query)
                                                    ->avg('porcentaje');
                                                echo number_format($total,1);
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
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'anio' => $anio, 'impacto' => 'Con impacto'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
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
                                                    echo number_format($total,1);
                                                }
                                            } else {
                                                //Promedio total
                                                $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                $total = DB::table('brechasbd')
                                                    ->where($query)
                                                    ->avg('porcentaje');
                                                echo number_format($total,1);
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
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'anio' => $anio, 'impacto' => 'Con impacto'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
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
                                                    echo number_format($total,1);
                                                }
                                            } else {
                                                //Promedio total
                                                $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                $total = DB::table('brechasbd')
                                                    ->where($query)
                                                    ->avg('porcentaje');
                                                echo number_format($total,1);
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
                                                        $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'AIO', 'anio' => $anio, 'impacto' => 'Con impacto'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //distrito y año
                                                } else {
                                                    //brechas por año y distrito
                                                    $location = $_POST['location'];
                                                    $distrito = explode(",",$location);
                                                    $distrito_nom = $distrito[2];
                                                    $anio = $_POST['years'];
                                                    $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => $distrito_nom, 'anio' => $anio];
                                                    $total = DB::table('brechasbd')
                                                        ->where($query)
                                                        ->avg('porcentaje');
                                                    echo number_format($total,1);
                                                }
                                            } else {
                                                //Promedio total
                                                $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                $total = DB::table('brechasbd')
                                                    ->where($query)
                                                    ->avg('porcentaje');
                                                echo number_format($total,1);
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
                                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //Promedio de brechas de X distrito
                                                        $location = $_POST['location'];
                                                        $distrito = explode(",",$location);
                                                        $distrito_nom = $distrito[2];
                                                        $query = ['variable' => 'Emergencias', 'distrito' => $distrito_nom];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    }
                                                //solo año
                                                } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                                    if ($_POST['years']=="Todos") {
                                                        //Promedio total
                                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
                                                    } else {
                                                        //brechas por año
                                                        $anio = $_POST['years'];
                                                        $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'anio' => $anio, 'impacto' => 'Con impacto'];
                                                        $total = DB::table('brechasbd')
                                                            ->where($query)
                                                            ->avg('porcentaje');
                                                        echo number_format($total,1);
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
                                                    echo number_format($total,1);
                                                }
                                            } else {
                                                //Promedio total
                                                $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022'];
                                                $total = DB::table('brechasbd')
                                                    ->where($query)
                                                    ->avg('porcentaje');
                                                echo number_format($total,1);
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
                                                    ->sum('monto');
                                                    echo number_format($financiera,0);
                                            } else {
                                                //Brecha financiera por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $financiera = DB::table('brecha_financiera')
                                                    ->where('distrito',$distrito_nom)
                                                    ->sum('monto');
                                                    echo number_format($financiera,0);
                                            }
                                        //solo año
                                        } elseif (isset($_POST['years']) and $_POST['location']=='AIO') {
                                            if ($_POST['years']=="Todos") {
                                            //Total de proyectos
                                            $financiera = DB::table('brecha_financiera')
                                                    ->sum('monto');
                                                    echo number_format($financiera,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                //
                                                $financiera = DB::table('brecha_financiera')
                                                    ->where('anio',$anio)
                                                    ->sum('monto');
                                                    echo number_format($financiera,0);
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
                                                    ->sum('monto');
                                                    echo number_format($financiera,0);
                                        }
                                    } else {
                                        //Query
                                        $query = ['anio' => '22022'];
                                        //Total de brecha financiera
                                        $financiera = DB::table('brecha_financiera')
                                                    ->where($query)
                                                    ->sum('monto');
                                                    echo number_format($financiera,0);
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
                                <label for="years" class="mt-3">Periodo</label>
                                <select id="years" name="years">
                                    <option value="22022" <?php if (isset($_POST['years'])){ if($_POST['years']=="22022") echo 'selected';}?> >2T 2022</option>
                                    <option value="32022" <?php if (isset($_POST['years'])){ if($_POST['years']=="32022") echo 'selected';}?> >3T 2022</option>
                                    <option value="42022" <?php if (isset($_POST['years'])){ if($_POST['years']=="42022") echo 'selected';}?> >4T 2022</option>
                                    <option value="12023" <?php if (isset($_POST['years'])){ if($_POST['years']=="12023") echo 'selected';}?> >1T 2023</option>
                                    <option value="22023" <?php if (isset($_POST['years'])){ if($_POST['years']=="22023") echo 'selected';}?> >2T 2023</option>
                                    <option value="32023" <?php if (isset($_POST['years'])){ if($_POST['years']=="32023") echo 'selected';}?> >3T 2023</option>
                                    <option value="42023" <?php if (isset($_POST['years'])){ if($_POST['years']=="42023") echo 'selected';}?> >4T 2023</option>                                    
                                    <option value="12024" <?php if (isset($_POST['years'])){ if($_POST['years']=="12024") echo 'selected';}?> >1T 2024</option>
                                    <option value="22024" <?php if (isset($_POST['years'])){ if($_POST['years']=="22024") echo 'selected';}?> >2T 2024</option>
                                    <option value="32024" <?php if (isset($_POST['years'])){ if($_POST['years']=="32024") echo 'selected';}?> >3T 2024</option>
                                    <option value="42024" <?php if (isset($_POST['years'])){ if($_POST['years']=="42024") echo 'selected';}?> >4T 2024</option>
                                    <option value="12025" <?php if (isset($_POST['years'])){ if($_POST['years']=="12025") echo 'selected';}?> >1T 2025</option>
                                    <option value="22025" <?php if (isset($_POST['years'])){ if($_POST['years']=="22025") echo 'selected';}?> >2T 2025</option>
                                    <option value="32025" <?php if (isset($_POST['years'])){ if($_POST['years']=="32025") echo 'selected';}?> >3T 2025</option>
                                    <option value="42025" <?php if (isset($_POST['years'])){ if($_POST['years']=="42025") echo 'selected';}?> >4T 2025</option>
                                    <option value="12026" <?php if (isset($_POST['years'])){ if($_POST['years']=="12026") echo 'selected';}?> >1T 2026</option>
                                    <option value="22026" <?php if (isset($_POST['years'])){ if($_POST['years']=="22026") echo 'selected';}?> >2T 2026</option>
                                    <option value="32026" <?php if (isset($_POST['years'])){ if($_POST['years']=="32026") echo 'selected';}?> >3T 2026</option>
                                    <option value="42026" <?php if (isset($_POST['years'])){ if($_POST['years']=="42026") echo 'selected';}?> >4T 2026</option>
                                    <option value="42021" <?php if (isset($_POST['years'])){ if($_POST['years']=="42021") echo 'selected';}?>>2021</option>
                                    <option value="42022" <?php if (isset($_POST['years'])){ if($_POST['years']=="42022") echo 'selected';}?> >2022</option>
                                    <option value="42023" <?php if (isset($_POST['years'])){ if($_POST['years']=="42023") echo 'selected';}?> >2023</option>
                                    <option value="42024" <?php if (isset($_POST['years'])){ if($_POST['years']=="42024") echo 'selected';}?> >2024</option>
                                    <option value="42025" <?php if (isset($_POST['years'])){ if($_POST['years']=="42025") echo 'selected';}?> >2025</option>
                                    <option value="42026" <?php if (isset($_POST['years'])){ if($_POST['years']=="42026") echo 'selected';}?> >2026</option>
                                </select>
                                <input type="submit" class="mt-3" value="Filtrar">
                            </div>
                        </form>
                    </div>
                    <!-- Potencialidades -->
                    <div class="grid-rsm-11">
                        <table>
                            <thead>
                                <th><h5 class="mt-2"><a href="/potencialidades">Potencialidades</a></h5></th>
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
                                <th><h5><a href="/proyectos">Proyectos en Cartera</a></h5></th>
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
                                                        ->where('_'.$anio, $anio)
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio];
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where($query)
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
                                                        ->where('_'.$anio,$anio)
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio];
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where($query)
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </strong></th>
                            </tr>
                            {{-- First engagement - deleted --}}
                            <tr>
                                <td>Corto Plazo</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Corto Plazo')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Corto Plazo'];
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
                                                    ->where('time_frame','Corto Plazo')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['_'.$anio => $anio, 'time_frame' => 'Corto Plazo'];
                                                //
                                                $count1 = DB::table('proyectos')
                                                        ->where($query)
                                                        ->count();
                                                        echo $count1;
                                            }
                                        //distrito y año $anio = '22022';
                                        } else {
                                            //proyectos por distrito y año
                                            $location = $_POST['location'];
                                            $distrito = explode(",",$location);
                                            $distrito_nom = $distrito[2];
                                            $anio = $_POST['years'];
                                            //Query
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio, 'time_frame' => 'Corto Plazo'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio, 'time_frame' => 'Corto Plazo'];
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where($query)
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
                                                    ->where('time_frame','Corto Plazo')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Corto Plazo'];
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
                                                    ->where('time_frame','Corto Plazo')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['_'.$anio => $anio, 'time_frame' => 'Corto Plazo'];
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio, 'time_frame' => 'Corto Plazo'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio, 'time_frame' => 'Corto Plazo'];
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where($query)
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Mediano Plazo</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Mediano Plazo')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Mediano Plazo'];
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
                                                    ->where('time_frame','Mediano Plazo')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['_'.$anio => $anio, 'time_frame' => 'Mediano Plazo'];
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio, 'time_frame' => 'Mediano Plazo'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio, 'time_frame' => 'Mediano Plazo'];
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where($query)
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
                                                    ->where('time_frame','Mediano Plazo')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Mediano Plazo'];
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
                                                    ->where('time_frame','Mediano Plazo')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['_'.$anio => $anio, 'time_frame' => 'Mediano Plazo'];
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio, 'time_frame' => 'Mediano Plazo'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio, 'time_frame' => 'Mediano Plazo'];
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where($query)
                                                ->sum('monto_actualizado');
                                                echo number_format($sum,0);
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Largo Plazo</td>
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location']) or isset($_POST['years'])) {
                                        //solo distrito
                                        if (isset($_POST['location']) and $_POST['years']=='Todos') {
                                            if ($_POST['location']=="AIO") {
                                            //Total proyectos
                                            $count1 = DB::table('proyectos')
                                                    ->where('time_frame','Largo Plazo')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Largo Plazo'];
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
                                                    ->where('time_frame','Largo Plazo')
                                                    ->count();
                                                    echo $count1;
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['_'.$anio => $anio, 'time_frame' => 'Largo Plazo'];
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio, 'time_frame' => 'Largo Plazo'];
                                            //
                                            $count1 = DB::table('proyectos')
                                                    ->where($query)
                                                    ->count();
                                                    echo $count1;
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio, 'time_frame' => 'Largo Plazo'];
                                        //Total de proyectos
                                        $count1 = DB::table('proyectos')
                                                ->where($query)
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
                                                    ->where('time_frame','Largo Plazo')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                $query = ['distrito' => $distrito_nom, 'time_frame' => 'Largo Plazo'];
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
                                                    ->where('time_frame','Largo Plazo')
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                            } else {
                                                //Proyectos por año
                                                $anio = $_POST['years'];
                                                $query = ['_'.$anio => $anio, 'time_frame' => 'Largo Plazo'];
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
                                            $query = ['distrito' => $distrito_nom, '_'.$anio => $anio, 'time_frame' => 'Largo Plazo'];
                                            //
                                            $sum = DB::table('proyectos')
                                                    ->where($query)
                                                    ->sum('monto_actualizado');
                                                    echo number_format($sum,0);
                                        }
                                    } else {
                                        $anio = '22022';
                                        //Query
                                        $query = ['_'.$anio => $anio, 'time_frame' => 'Largo Plazo'];
                                        //Total de proyectos
                                        $sum = DB::table('proyectos')
                                                ->where($query)
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
                                <th><h5><a href="/recursos">Canon y Regalía</a></h5></th>
                                <th class="text-center"><h6>2007-2022</h6></th>
                                <th class="text-center"><h6>2022</h6></th>
                                <th class="text-center"><h6>2023-2036</h6></th>
                            </tr>
                            <tr>
                                <th>
                                    <h5>Mineria y otros</h5>
                                    <small>(Millones de Soles)</small>
                                </th>
                                {{-- 2007-2022 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio','<=',2022,'and')
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
                                                        ->where('anio','<=',2022,'and')
                                                        ->where('anio','>=',2007, 'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio','<=',2022,'and')
                                                    ->where('anio','>=',2007)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
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
                                            $canon = DB::table('canon')
                                                    ->where('anio',2023)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                            } else {
                                                //Canon por distrito
                                                $location = $_POST['location'];
                                                $distrito = explode(",",$location);
                                                $distrito_nom = $distrito[2];
                                                //
                                                $canon = DB::table('canon')
                                                        ->where('anio',2023,'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio',2023)
                                                    ->sum('monto');
                                                    echo number_format($canon,0);
                                    }
                                ?>
                                </td>
                                {{-- 2024-2036 --}}
                                <td class="text-center">
                                <?php
                                    //filtro año y distrito
                                    if (isset($_POST['location'])) {
                                        if ($_POST['location']=="AIO") {
                                            //Total canon
                                            $canon = DB::table('canon')
                                                    ->where('anio','<=',2036,'and')
                                                    ->where('anio','>=',2024)
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
                                                        ->where('anio','>=',2024,'and')
                                                        ->where('distrito',$distrito_nom)
                                                        ->sum('monto');
                                                        echo number_format($canon,0);
                                            }
                                    } else {
                                        //Total canon
                                        $canon = DB::table('canon')
                                                    ->where('anio','<=',2036,'and')
                                                    ->where('anio','>=',2024)
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
            </div>
        </div>
        <!-- Resumen End -->
        @extends('layouts.footer')
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>