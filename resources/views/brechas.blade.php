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
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Cargando...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
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
        <!-- Navbar & Hero End -->

        <!-- Resumen Start -->
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
                            <h4 class="valor">56</h4>
                        </div>
                    </div>
                </div>
                {{-- Canon minero --}}
                <div class="grid-br-6">
                    <table>
                        <tr>
                            <th><h6>Canon Minero, Regalía Minera y otros para el desarrollo</h6></th>
                            <td><h6>83</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Instrumentos de Planeamiento Municipal</h6></th>
                            <td><h6>16</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Ejecución del gasto de inversión municipal</h6></th>
                            <td><h6>49</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Calidad del gasto de inversión municipal</h6></th>
                            <td><h6>57</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Clima social para el desarrollo</h6></th>
                            <td><h6>52</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- PDLC --}}
                <div class="grid-br-7">
                    <table>
                        <tr>
                            <th><h6>PDLC</h6></th>
                            <td><h6>95</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Saneamiento</h6></th>
                            <td><h6>51</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- POI --}}
                <div class="grid-br-8">
                    <table>
                        <tr>
                            <th><h6>POI</h6></th>
                            <td><h6>80</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Transporte</h6></th>
                            <td><h6>46</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- PEI --}}
                <div class="grid-br-9">
                    <table>
                        <tr>
                            <th><h6>PEI</h6></th>
                            <td><h6>85</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Agropecuario</h6></th>
                            <td><h6>52</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- PMI --}}
                <div class="grid-br-10">
                    <table>
                        <tr>
                            <th><h6>PMI</h6></th>
                            <td><h6>5</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Educación</h6></th>
                            <td><h6>62</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Salud --}}
                <div class="grid-br-11">
                    <table>
                        <tr>
                            <th><h6>Salud</h6></th>
                            <td><h6>74</h6></td>
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
                            <h2 class="valor">41</h2>
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
                            <h4 class="valor">34</h4>
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
                            <h4 class="valor">49</h4>
                        </div>
                    </div>
                </div>
                {{-- Acceso educación --}}
                <div class="grid-br-15">
                    <table>
                        <tr>
                            <th><h6>Acceso educación (matriculados)</h6></th>
                            <td><h6>23</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Nivel de educación completa</h6></th>
                            <td><h6>39</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Logros de aprendizaje</h6></th>
                            <td><h6>85</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Inicial --}}
                <div class="grid-br-16">
                    <table>
                        <tr>
                            <th><h6>Inicial</h6></th>
                            <td><h6>21</h6></td>
                        </tr>
                        <tr>
                            <th><h6>4to primaria</h6></th>
                            <td><h6>77</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Primaria --}}
                <div class="grid-br-17">
                    <table>
                        <tr>
                            <th><h6>Primaria</h6></th>
                            <td><h6>20</h6></td>
                        </tr>
                        <tr>
                            <th><h6>2do secundaria</h6></th>
                            <td><h6>93</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Secundaria --}}
                <div class="grid-br-18">
                    <table>
                        <tr>
                            <th><h6>Secundaria</h6></th>
                            <td><h6>28</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Potencialidades --}}
                <div class="grid-br-20">
                    <table>
                        <tr>
                            <th><h5>Potencialidades</h5></th>
                        </tr>
                        <tr>
                            <td>
                                <div class="row mb-2" id="pot1">
                                    <div class="col-3">
                                        <img src="img/plant.svg" alt="" class="img-pt">
                                    </div>
                                    <div class="col-9">
                                        <p>Agroindustria</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row  mb-2" id="pot2">
                                    <div class="col-3" id="img-pt-c">
                                        <img src="img/cuy.svg" alt="" class="img-pt">
                                    </div>
                                    <div class="col-9">
                                        <p>Cuyes y animales menores</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row mb-2" id="pot3">
                                    <div class="col-3">
                                        <img src="img/milk.svg" alt="" class="img-pt">
                                    </div>
                                    <div class="col-9">
                                        <p>Lácteos</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row mb-2" id="pot4">
                                    <div class="col-3">
                                        <img src="img/mine.svg" alt="" class="img-pt">
                                    </div>
                                    <div class="col-9">
                                        <p>Mineria</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row mb-2" id="pot5">
                                    <div class="col-3">
                                        <img src="img/tourist.svg" alt="" class="img-pt">
                                    </div>
                                    <div class="col-9">
                                        <p>Turismo</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Vida larga y saludable --}}
                <div class="grid-br-21">
                    <div class="row">
                        <div>
                            <h5 class="clave">Vida larga y saludable</h5>
                        </div>
                        <div>
                            <h4 class="valor">19</h4>
                        </div>
                    </div>
                </div>
                {{-- Esperanza de vida --}}
                <div class="grid-br-22">
                    <table>
                        <tr>
                            <th><h6>Esperanza de vida</h6></th>
                            <td><h6>15</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Anemia</h6></th>
                            <td><h6>42</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Desnutrición Crónica</h6></th>
                            <td><h6>19</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Afiliación a seguro de salud</h6></th>
                            <td><h6>8</h6></td>
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
                            <h4 class="valor">63</h4>
                        </div>
                    </div>
                </div>
                {{-- Social --}}
                <div class="grid-br-25">
                    <div class="row">
                        <div>
                            <h5 class="clave">Social</h5>
                        </div>
                        <div>
                            <h4 class="valor">86</h4>
                        </div>
                    </div>
                </div>
                {{-- Colegios: Adecuado Estado IIEE --}}
                <div class="grid-br-26">
                    <table>
                        <tr>
                            <th><h6>Colegios: Adecuado Estado IIEE</h6></th>
                            <td><h6>91</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Hospitales: Camas por mil hab.</h6></th>
                            <td><h6>16</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- M/L Plazo --}}
                <div class="grid-br-27">
                    <table>
                        <tr>
                            <th><h6>M/L Plazo</h6></th>
                            <td><h6>81</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Retorno seguro --}}
                <div class="grid-br-28">
                    <table>
                        <tr>
                            <th><h6>Retorno seguro</h6></th>
                            <td><h6>100</h6></td>
                        </tr>
                    </table>
                </div>
                <div class="grid-br-29"></div>
                {{-- Servicios Básicos --}}
                <div class="grid-br-30">
                    <div class="row">
                        <div>
                            <h5 class="clave">Servicios Básicos</h5>
                        </div>
                        <div>
                            <h4 class="valor">53</h4>
                        </div>
                    </div>
                </div>
                {{-- Servicios de internet (antenas) --}}
                <div class="grid-br-31">
                    <table>
                        <tr>
                            <th><h6>Servicios de internet (antenas)</h6></th>
                            <td><h6>92</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Telefonía móvil</h6></th>
                            <td><h6>22</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Agua</h6></th>
                            <td><h6>49</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Desagüe --}}
                <div class="grid-br-32">
                    <table>
                        <tr>
                            <th><h6>Desagüe</h6></th>
                            <td><h6>56</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Electricidad</h6></th>
                            <td><h6>16</h6></td>
                        </tr>
                        <tr>
                            <th><h6>PTAR</h6></th>
                            <td><h6>95</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Vial pavimentada --}}
                <div class="grid-br-33">
                    <table>
                        <tr>
                            <th><h6>Vial pavimentada</h6></th>
                            <td><h6>40</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Productiva --}}
                <div class="grid-br-34">
                    <div class="row">
                        <div>
                            <h5 class="clave">Productiva</h5>
                        </div>
                        <div>
                            <h4 class="valor">51</h4>
                        </div>
                    </div>
                </div>
                {{-- Agropecuaria (riego tecnificado) --}}
                <div class="grid-br-35">
                    <table>
                        <tr>
                            <th><h6>Agropecuaria (riego tecnificado)</h6></th>
                            <td><h6>57</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Turística</h6></th>
                            <td><h6>26</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Académica</h6></th>
                            <td><h6>69</h6></td>
                        </tr>
                    </table>
                </div>
                <div class="grid-br-36"></div>
                {{-- Filtros --}}
                <div class="grid-br-37">
                    <div class="row">
                        <label id="label2" for="">Unidad Territorial</label>
                        <select name="">
                            <option value="">AIO</option>
                        </select>
                    </div>
                    <div class="row">
                        <label id="label2" for="">Año</label>
                        <select name="">
                            <option value="">2021</option>
                        </select>
                    </div>
                    <div class="row">
                        <label id="label2" for="">Modalidad de inversión</label>
                        <select name="">
                            <option value="">Todas</option>
                        </select>
                    </div>
                </div>
                <div class="grid-br-38"></div>
                {{-- Pilar 4 --}}
                <div class="grid-br-39">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 4: Emprendimiento y desarrollo económico</h5>
                        </div>
                        <div>
                            <h4 class="valor">49</h4>
                        </div>
                    </div>
                </div>
                {{-- Capital Humano --}}
                <div class="grid-br-40">
                    <div class="row">
                        <div>
                            <h5 class="clave">Capital Humano</h5>
                        </div>
                        <div>
                            <h4 class="valor">49</h4>
                        </div>
                    </div>
                </div>
                {{-- PEA --}}
                <div class="grid-br-41">
                    <table>
                        <tr>
                            <th><h6>PEA</h6></th>
                            <td><h6>52</h6></td>
                        </tr>
                        <tr>
                            <th><h6>PEA ocupada</h6></th>
                            <td><h6>7</h6></td>
                        </tr>
                        <tr>
                            <th><h6>Formación Univ./Técnica</h6></th>
                            <td><h6>88</h6></td>
                        </tr>
                    </table>
                </div>
                {{-- Pilar 5 --}}
                <div class="grid-br-42">
                    <div class="row">
                        <div>
                            <h5 class="clave">Pilar 5: Emergencias</h5>
                        </div>
                        <div>
                            <h4 class="valor">54</h4>
                        </div>
                    </div>
                </div>
                {{-- Vacuna Covid-19 --}}
                <div class="grid-br-43">
                    <div class="row">
                        <div>
                            <h5 class="clave">Vacuna Covid-19</h5>
                        </div>
                        <div>
                            <h4 class="valor">54</h4>
                        </div>
                    </div>
                </div>
                {{-- 1ra dosis --}}
                <div class="grid-br-44">
                    <table>
                        <tr>
                            <th><h6>1ra dosis</h6></th>
                            <td><h6>33</h6></td>
                        </tr>
                        <tr>
                            <th><h6>2da dosis</h6></th>
                            <td><h6>51</h6></td>
                        </tr>
                        <tr>
                            <th><h6>3ra dosis</h6></th>
                            <td><h6>77</h6></td>
                        </tr>
                    </table>
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
</body>
</html>