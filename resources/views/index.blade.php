<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SAD AIO Antamina</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Sistema de Administración del Desarrollo" name="description">
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

    {{-- Slider --}}
    <link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" href="css/mi-slider.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.slider.js"></script>

	<script type="text/javascript"> 
		$(window).on('load', function() {
		    $('#slider').nivoSlider();
		}); 
	</script>

</head>

<body>
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl position-relative p-0">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    {{-- Logo --}}
                    <div class="row m-4 divlogo">
                        <img src="/img/logo-sad-w.png"/>
                        <img class="top" src="/img/logo-sad.png" />
                    </div>
                    {{-- End Logo --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/resumen" class="nav-item nav-link">Resumen</a>
                        <a href="/brechas" class="nav-item nav-link">Brechas</a>
                        <a href="/proyectos" class="nav-item nav-link">Proyectos</a>
                        <a href="/recursos" class="nav-item nav-link">Recursos</a>
                        <a href="/potencialidades" class="nav-item nav-link">Potencialidades</a>
                        <a href="/trimestral" class="nav-item nav-link">Reportes</a>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Index -->
            <div class="container-xxl bg-dark hero-header">
               {{-- <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                         <div class="col-lg-6 text-center text-lg-start">
                            <p class="display-3 animated slideInLeft text-white" id="home-text">Dales calidad, <br>es el mejor tipo de publicidad</p>
                            <p class="text-white animated slideInLeft mb-4 pb-2">El centro para la Competitividad y el Desarrollo (CCD) es una institución cuyo fin es promover el desarrollo sostenible del país en base al principio de la competitividad y de esta forma mejorar la calidad de vida de los ciudadanos.</p>
                            <a href="/resumen" class="link me-3 animated slideInLeft"><strong>SAD AIO Antamina</strong>
                                <svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.6781 15.0212C20.6724 14.7732 20.6068 14.624 20.5229 14.5168L15.9103 8.05962C15.6925 7.71027 15.1988 7.65481 14.8901 7.93857C14.5815 8.22233 14.5652 8.75269 14.8127 9.06855L18.4828 14.2139H5.06649C4.67446 14.2139 4.35693 14.5753 4.35693 15.0209C4.35693 15.4668 4.67472 15.828 5.06649 15.828H18.4828L14.8127 20.9733C14.5317 21.2922 14.6117 21.8513 14.9082 22.1514C15.1364 22.3822 15.7447 22.3087 15.9105 21.9822L20.5231 15.525C20.6432 15.3578 20.6798 15.2334 20.6783 15.0206L20.6781 15.0212Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="/img/home.png" alt="Volquete CCD">
                        </div> 
                    </div>
                </div> --}}

                <div class="slider-wrapper theme-mi-slider">
                    <div id="slider" class="nivoSlider">     
                        <img src="/img/1.png" alt="" title="#htmlcaption1" />    
                        <img src="/img/2.png" alt="" title="#htmlcaption2" />    
                        <img src="/img/3.png" alt="" title="#htmlcaption3" />
                        <img src="/img/4.png" alt="" title="#htmlcaption4" />
                        <img src="/img/5.png" alt="" title="#htmlcaption5" />
                    </div>
                    <div id="htmlcaption1" class="nivo-html-caption">
                        <h1>Sistema de Administración <br> del Desarrollo</h1>
                    </div>
                    <div id="htmlcaption2" class="nivo-html-caption">
                        <h3><em>“El progreso y el desarrollo son imposibles <br> si uno sigue haciendo las cosas tal como siempre las ha hecho”</em> </h3>
                    </div>
                    <div id="htmlcaption3" class="nivo-html-caption">
                        <h3><em>“Para tener éxito, tu deseo de éxito debe ser mayor <br> que tu miedo al fracaso”</em> </h3>
                    </div>
                    <div id="htmlcaption4" class="nivo-html-caption">
                        <h3><em>“El éxito es la suma de pequeños esfuerzos repetidos <br> un día sí y otro también”</em> </h3>
                    </div>
                    <div id="htmlcaption5" class="nivo-html-caption">
                        <h3><em>“El verdadero progreso es el que pone <br> la tecnología al alcance de todos.”</em> </h3>
                    </div>
                </div>
            </div>
            <!-- Index End -->
        </div>

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-6 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Nosotros</h4>
                        <p class="col-lg-10">El SAD es un Sistema de Administración del Desarrollo enfocado a la mejora de las municipalidades mediante proyectos de mejora.</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
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
                        <div class="col-md-12 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">SAD</a>, Sistema de Administración del Desarrollo. Desarrollado por <a class="border-bottom" href="https://fernandovaldivia.github.io/about-me/" target="_blank">LValdivia</a> & <a class="border-bottom" href="https://ivanoscco.wixsite.com/my-site" target="_blank">IOscco</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
        
    </div>
    
    {{-- Chat Whatsapp --}}
    <a href="https://api.whatsapp.com/send?phone=51922753771&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20el%20SAD." class="float" target="_blank">
        <i class="fab fa-whatsapp my-float"></i>
    </a>

    <!-- JavaScript Libraries -->
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
    
    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
</body>
</html>