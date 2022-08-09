<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Brechas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
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