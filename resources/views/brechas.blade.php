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

    <!-- Mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/> 
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
    <div class="loader">
        <img src="https://res.cloudinary.com/lvaldivia/image/upload/v1657142287/ccd/load-red_quymsp.gif" alt="Loading..." />
    </div>
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
                        <a href="/brechas" class="nav-item nav-link active">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-1 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Brechas</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/resumen" class="aactiva">Resumen</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Brechas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
        <!-- Brechas Start -->
        <div class="container-xxl py-3">
            <div class="grid-container">
                <div class="grid-br-1"></div>
                {{-- titulo --}}
                <div class="grid-br-2">
                    <h3>Brechas en el AIO: Por Pilares</h3>
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
                                00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Instrumentos de Planeamiento Municipal</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Ejecución del gasto de inversión municipal</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Calidad del gasto de inversión municipal</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h6>Clima social para el desarrollo</h6>
                            </th>
                            <td>
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="sanea"><h6>Saneamiento</h6></th>
                            <td id="vsanea">
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="trans"><h6>Transporte</h6></th>
                            <td id="vtrans">
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="agro"><h6>Agropecuario</h6></th>
                            <td id="vagro">
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="edu"><h6>Educación</h6></th>
                            <td id="vedu">
                                <h6>
                                    00
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
                                    00
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
                                00
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
                                00
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
                                00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Nivel de educación completa</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Logros de aprendizaje</h6></th>
                            <td>
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Pob. Urb. sec. comp.</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>CL 4to primaria</h6></th>
                            <td>
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Pob. Ru. sec. comp.</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Mat. 4to primaria</h6></th>
                            <td>
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>CL 2do sec.</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Mat 2do sec --}}
                <div class="grid-br-19">
                    <table>
                        <tr>
                            <th><h6>Mat. 2do sec.</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
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
                                <label id="label2" for="">Año</label>
                                <select id="year" name="year">
                                    <option value="Todos">Todos</option>
                                    <option value="2020" <?php if(isset($_POST['year'])){ if($_POST['year']=="2020") echo 'selected';}?>>2020</option>
                                    <option value="2021" <?php if(isset($_POST['year'])){ if($_POST['year']=="2021") echo 'selected';}?>>2021</option>
                                    <option value="2022" <?php if(isset($_POST['year'])){ if($_POST['year']=="2022") echo 'selected';}?>>2022</option>
                                    <option value="2023" <?php if(isset($_POST['year'])){ if($_POST['year']=="2023") echo 'selected';}?>>2023</option>
                                    <option value="2024" <?php if(isset($_POST['year'])){ if($_POST['year']=="2024") echo 'selected';}?>>2024</option>
                                    <option value="2026" <?php if(isset($_POST['year'])){ if($_POST['year']=="2025") echo 'selected';}?>>2026</option>
                                </select>
                            </div>
                            {{-- Impacto Antamina --}}
                            <div class="row mt-2">
                                <label for="imp">Impacto Antamina</label>
                                <select id="impacto" name="impacto">
                                    <option value="Todas">Todas</option>
                                    <option value="Sin impacto" <?php if (isset($_POST['impacto'])){ if($_POST['impacto']=="Sin impacto") echo 'selected';}?>>Sin impacto</option>
                                    <option value="Con impacto" <?php if (isset($_POST['impacto'])){ if($_POST['impacto']=="Con impacto") echo 'selected';}?>>Con impacto</option>
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
                                00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Anemia</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Desnutrición Crónica</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Afiliación a seguro de salud</h6></th>
                            <td>
                                <h6>
                                    00
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
                                00
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
                                00
                            </h4>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <th><h6>Tratamiento de Aguas Res.</h6></th>
                            <td><h6>00</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Servicios de internet (antenas) --}}
                <div class="grid-br-26">
                    <table>
                        <tr>
                            <th><h6>Servicios de internet (antenas)</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Telefonía móvil</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Agua</h6></th>
                            <td>
                                <h6>
                                    00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Electrificación</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{--  --}}
                <div class="grid-br-29"></div>
                {{-- Social --}}
                <div class="grid-br-30">
                    <table>
                        <tr>
                            <th><h6>Vial pavimentado</h6></th>
                            <td><h6>00</h6></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div>
                            <h5 class="clave">Social</h5>
                        </div>
                        <div>
                            <h4 class="valor">
                                00
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Nacional --}}
                <div class="grid-br-31">
                    <table>
                        <tr>
                            <th><h6>Nacional</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Hospitales: Camas por mil hab.</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>IIEE en adecuado estado</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Departamental --}}
                <div class="grid-br-32">
                    <table>
                        <tr>
                            <th><h6>Departamental</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>Mejoras de IIEE</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Vecinal --}}
                <div class="grid-br-33">
                    <table>
                        <tr>
                            <th><h6>Vecinal</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>Retorno seguro</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Mant. de IIEE --}}
                <div class="grid-br-34">
                    <table>
                        <tr>
                            <th><h6>Mant. de IIEE</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Kits de Higiene --}}
                <div class="grid-br-35">
                    <table>
                        <tr>
                            <th><h6>Kits de Higiene</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Bicicletas Solidarias --}}
                <div class="grid-br-36">
                    <table>
                        <tr>
                            <th><h6>Bicicletas Solidarias</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Productiva --}}
                <div class="grid-br-37">
                    <div class="row">
                        <div>
                            <h5 class="clave">Productiva</h4>
                        </div>
                        <div>
                            <h4 class="valor">
                                00
                            </h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div>
                            <h6 class="clave">Mantenimiento de Infraestructura Pública</h6>
                        </div>
                        <div>
                            <h4 class="valor">
                                00
                            </h4>
                        </div>
                    </div>
                </div>
                {{-- Agropecuaria (riego tecnificado) --}}
                <div class="grid-br-38">
                    <table>
                        <tr>
                            <th><h6>Infraestructura Agropecuaria</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Turística</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Académica</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Importancia del monto asignado</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Velocidad de ejecución</h6></th>
                            <td>
                                <h6>
                                    00
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
                                00
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
                                00
                            </h4>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <th><h6>Ingreso por persona</h6></th>
                            <td><h6>00</h6></td>
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>PEA ocupada</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Formación Univ./Técnica</h6></th>
                            <td>
                                <h6>
                                    00
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
                                00
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
                                00
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
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>2da dosis</h6></th>
                            <td>
                                <h6>
                                    00
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>3ra dosis</h6></th>
                            <td>
                                <h6>
                                    00
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
                    <col class="col0">
                    <col class="col1">
                    <col class="col2">
                    <col class="col3">
                    <col class="col4">
                    <col class="col5">
                    <col class="col6">
                    <col class="col7">
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
                        <td class="column2 style5 s">51/44/38</td>
                        <td class="column3 style5 s">31/30/26</td>
                        <td class="column4 style5 s">60/52/42</td>
                        <td class="column5 style5 s">44/46/46</td>
                        <td class="column6 style5 s">43/27/0</td>
                        <td class="column7 style6 s">47/40/30</td>
                      </tr>
                      <tr class="row2">
                        <td class="column1 style7 s">San Pedro de Chaná</td>
                        <td class="column2 style8 s">47/35/30</td>
                        <td class="column3 style8 s">34/29/25</td>
                        <td class="column4 style8 s">68/61/41</td>
                        <td class="column5 style8 s">57/72/72</td>
                        <td class="column6 style8 s">55/49/0</td>
                        <td class="column7 style9 s">52/49/34</td>
                      </tr>
                      <tr class="row3">
                        <td class="column1 style4 s">Huachis</td>
                        <td class="column2 style5 s">47/46/40</td>
                        <td class="column3 style5 s">39/34/30</td>
                        <td class="column4 style5 s">62/52/46</td>
                        <td class="column5 style5 s">55/69/69</td>
                        <td class="column6 style5 s">70/64/0</td>
                        <td class="column7 style6 s">52/53/37</td>
                      </tr>
                      <tr class="row4">
                        <td class="column1 style7 s">Chavín de Huántar</td>
                        <td class="column2 style8 s">48/49/41</td>
                        <td class="column3 style8 s">28/28/23</td>
                        <td class="column4 style8 s">65/48/46</td>
                        <td class="column5 style8 s">55/67/67</td>
                        <td class="column6 style8 s">53/35/0</td>
                        <td class="column7 style9 s">49/46/36</td>
                      </tr>
                      <tr class="row5">
                        <td class="column0 style14 s style14" rowspan="5">UGT Huallanca</td>
                        <td class="column1 style4 s">Huallanca</td>
                        <td class="column2 style5 s">56/55/53</td>
                        <td class="column3 style5 s">28/29/24</td>
                        <td class="column4 style5 s">67/61/50</td>
                        <td class="column5 style5 s">49/52/52</td>
                        <td class="column6 style5 s">42/27/0</td>
                        <td class="column7 style6 s">49/45/36</td>
                      </tr>
                      <tr class="row6">
                        <td class="column1 style7 s">Aquia</td>
                        <td class="column2 style8 s">67/60/58</td>
                        <td class="column3 style8 s">33/26/23</td>
                        <td class="column4 style8 s">61/54/49</td>
                        <td class="column5 style8 s">51/54/54</td>
                        <td class="column6 style8 s">52/42/0</td>
                        <td class="column7 style9 s">53/47/37</td>
                      </tr>
                      <tr class="row7">
                        <td class="column1 style4 s">Chiquián</td>
                        <td class="column2 style5 s">59/53/48</td>
                        <td class="column3 style5 s">30/32/28</td>
                        <td class="column4 style5 s">51/47/36</td>
                        <td class="column5 style5 s">44/49/49</td>
                        <td class="column6 style5 s">36/25/0</td>
                        <td class="column7 style6 s">45/41/32</td>
                      </tr>
                      <tr class="row8">
                        <td class="column1 style7 s">Puños</td>
                        <td class="column2 style8 s">54/58/57</td>
                        <td class="column3 style8 s">36/31/27</td>
                        <td class="column4 style8 s">74/64/50</td>
                        <td class="column5 style8 s">54/71/71</td>
                        <td class="column6 style8 s">72/61/0</td>
                        <td class="column7 style9 s">56/57/41</td>
                      </tr>
                      <tr class="row9">
                        <td class="column1 style4 s">Llata</td>
                        <td class="column2 style5 s">57/54/52</td>
                        <td class="column3 style5 s">30/27/21</td>
                        <td class="column4 style5 s">57/51/41</td>
                        <td class="column5 style5 s">60/62/62</td>
                        <td class="column6 style5 s">47/26/0</td>
                        <td class="column7 style6 s">51/44/35</td>
                      </tr>
                      <tr class="row10">
                        <td class="column0 style13 s style13" rowspan="10">UGT Valle fortaleza</td>
                        <td class="column1 style7 s">Pampas Chico</td>
                        <td class="column2 style8 s">63/59/57</td>
                        <td class="column3 style8 s">37/40/31</td>
                        <td class="column4 style8 s">62/55/52</td>
                        <td class="column5 style8 s">47/61/61</td>
                        <td class="column6 style8 s">64/61/15</td>
                        <td class="column7 style9 s">53/55/43</td>
                      </tr>
                      <tr class="row11">
                        <td class="column1 style4 s">Marca</td>
                        <td class="column2 style5 s">60/44/44</td>
                        <td class="column3 style5 s">43/46/41</td>
                        <td class="column4 style5 s">70/69/66</td>
                        <td class="column5 style5 s">58/66/66</td>
                        <td class="column6 style5 s">70/70/17</td>
                        <td class="column7 style6 s">58/59/47</td>
                      </tr>
                      <tr class="row12">
                        <td class="column1 style7 s">Cajacay</td>
                        <td class="column2 style8 s">74/52/51</td>
                        <td class="column3 style8 s">33/24/19</td>
                        <td class="column4 style8 s">71/57/46</td>
                        <td class="column5 style8 s">47/54/54</td>
                        <td class="column6 style8 s">47/37/0</td>
                        <td class="column7 style9 s">56/45/34</td>
                      </tr>
                      <tr class="row13">
                        <td class="column1 style4 s">Huayllacayán</td>
                        <td class="column2 style5 s">56/58/56</td>
                        <td class="column3 style5 s">42/29/25</td>
                        <td class="column4 style5 s">65/61/57</td>
                        <td class="column5 style5 s">49/67/67</td>
                        <td class="column6 style5 s">54/37/0</td>
                        <td class="column7 style6 s">53/50/41</td>
                      </tr>
                      <tr class="row14">
                        <td class="column1 style7 s">Antonio Raymondi</td>
                        <td class="column2 style8 s">55/52/52</td>
                        <td class="column3 style8 s">29/23/19</td>
                        <td class="column4 style8 s">77/59/52</td>
                        <td class="column5 style8 s">48/63/63</td>
                        <td class="column6 style8 s">62/59/8</td>
                        <td class="column7 style9 s">53/51/39</td>
                      </tr>
                      <tr class="row15">
                        <td class="column1 style4 s">Llacllín</td>
                        <td class="column2 style5 s">48/60/56</td>
                        <td class="column3 style5 s">48/36/34</td>
                        <td class="column4 style5 s">63/59/56</td>
                        <td class="column5 style5 s">54/61/61</td>
                        <td class="column6 style5 s">62/53/0</td>
                        <td class="column7 style6 s">53/54/41</td>
                      </tr>
                      <tr class="row16">
                        <td class="column1 style7 s">Colquioc</td>
                        <td class="column2 style8 s">61/59/56</td>
                        <td class="column3 style8 s">28/28/26</td>
                        <td class="column4 style8 s">56/52/49</td>
                        <td class="column5 style8 s">45/48/48</td>
                        <td class="column6 style8 s">40/24/0</td>
                        <td class="column7 style9 s">47/42/36</td>
                      </tr>
                      <tr class="row17">
                        <td class="column1 style4 s">Pararín</td>
                        <td class="column2 style5 s">57/53/50</td>
                        <td class="column3 style5 s">50/45/42</td>
                        <td class="column4 style5 s">67/54/48</td>
                        <td class="column5 style5 s">47/65/65</td>
                        <td class="column6 style5 s">71/62/0</td>
                        <td class="column7 style6 s">56/56/41</td>
                      </tr>
                      <tr class="row18">
                        <td class="column1 style7 s">Paramonga</td>
                        <td class="column2 style8 s">39/49/49</td>
                        <td class="column3 style8 s">28/32/30</td>
                        <td class="column4 style8 s">57/62/58</td>
                        <td class="column5 style8 s">35/37/37</td>
                        <td class="column6 style8 s">30/14/0</td>
                        <td class="column7 style9 s">39/39/35</td>
                      </tr>
                      <tr class="row19">
                        <td class="column1 style4 s">Cátac</td>
                        <td class="column2 style5 s">66/58/53</td>
                        <td class="column3 style5 s">24/26/21</td>
                        <td class="column4 style5 s">49/50/47</td>
                        <td class="column5 style5 s">51/60/60</td>
                        <td class="column6 style5 s">60/33/0</td>
                        <td class="column7 style6 s">48/45/36</td>
                      </tr>
                      <tr class="row20">
                        <td class="column0 style10 s">UGT Huarmey</td>
                        <td class="column1 style11 s">Huarmey</td>
                        <td class="column2 style8 s">61/46/42</td>
                        <td class="column3 style8 s">22/26/20</td>
                        <td class="column4 style8 s">61/57/49</td>
                        <td class="column5 style8 s">34/44/43</td>
                        <td class="column6 style8 s">39/14/0</td>
                        <td class="column7 style9 s">44/37/31</td>
                      </tr>
                      <tr class="row21">
                        <td class="column0 style15 s style16" colspan="2">Total</td>
                        <td class="column2 style12 s">56/57/53</td>
                        <td class="column3 style12 s">34/31/27</td>
                        <td class="column4 style12 s">63/56/49</td>
                        <td class="column5 style12 s">49/58/58</td>
                        <td class="column6 style12 s">54/41/2</td>
                        <td class="column7 style12 s">51/49/38</td>
                      </tr>
                    </tbody>
                </table>
                <br>
                <h6>2021 <b>/ 2T 2022 / 2026</b></h6>
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
                    Descargar data
                </a>
            </div>
        </div>
        <!-- Brechas End -->

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

    {{-- Loader --}}
    <script type="text/javascript">
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
</body>
</html>