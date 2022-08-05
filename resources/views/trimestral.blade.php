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
    
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar -->
        <div class="container-xxl position-relative p-0 bg-black">
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
                        <a href="/trimestral" class="nav-item nav-link active">Reportes</a>
                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark2 second-nav navigation">
                <ul class="breadcrumb justify-content-center collapse navbar-collapse">
                    <li class="breadcrumb-item"><a href="#introduccion">Introducción</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page"><a href="#resumen">Resumen</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page"><a href="#antecedente">Antecedente</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page"><a href="#2t2022">2T 2022</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page"><a href="#proyeccion">Proyección</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page"><a href="#distritos">Distritos</a></li>
                </ul>
            </nav>
            <div class="container-xxl py-1 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5">
                    <h1 class="display-3 text-white mb-3 animated titleTrim"><b>Progreso Cierre de Brechas</b>
                        <br>AIO Antamina
                    </h1>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Trimestral Start -->      
        <div class="container-xxl py-5">
            <div class="row">
                <div class="col-10">
                    <h6 style="float: left; color: rgb(92, 92, 92); padding-left: 5%;">Segundo Trimestre 2022 <br>Reporte, agosto 2022</h6>
                </div>
                <div class="col-2">
                    <a class="descargar-btn" href="#descarga">Descargar Reportes</a>
                </div>
            </div>
            <div class="container-hor trim">
                {{-- Introducción --}}
                <section id="introduccion">
                    <div class="row text-center">
                        <h2>Introducción</h2>
                    </div>
                    <br>
                    <div class="trimestre1">
                        <div class="trimestre-grid-1">
                            <p>Disponer de indicadores es fundamental en todo proceso de desarrollo, permiten apoyar decisiones críticas de planificación y gestión, y proporcionan información clave para las actividades operacionales del sector público y privado.</p>
                        </div>
                        <div class="trimestre-grid-2 text-center">
                            <b>Importancia de Inficariores en el Desarrollo</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="trimestre-grid-3">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004489842505289788/unknown.png" alt="">
                        </div>
                        <div class="trimestre-grid-4">
                            <p>Con el objetivo de apoyar en las decisiones para el cierre de brechas y desarrollo en el AIO Antamina, se han identificado 55 indicadores (kpis), los mismos que se encuentran consolidados en el «KPI Cierre de Brechas Global» (KPI Global). El KPI Global refleja los impactos en el cierre de brechas de todos los proyectos e intervenciones público - privado ejecutados en el AIO.<br>
                            Para los proyectos e intervenciones vinculadas a Antamina (proyectos sociales y OxI) se dispone el «KPI Cierre de Brechas Antamina» (KPI Antamina), el cual incluye 14 kpis, clasificados en los factores de desarrollo de Antamina como se observa en la siguiente figura.
                            </p>
                        </div>
                        <div class="trimestre-grid-5 text-center">
                            <b>KPI Global y KPI Antamina: Cierre de Brechas AIO</b>
                            <h6>(Por factores y kpis)</h6>
                        </div>
                        <div class="trimestre-grid-6">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004872737078116503/unknown.png" alt="">
                        </div>
                        <div class="trimestre-grid-7">
                            <p>
                                Los kpis reflejan determinantes claves del Índice de Desarrollo Humano (IDH): ingresos, educación y salud; así como determinantes de la institucionalidad e intervenciones realizadas por Antamina para atender emergencias en apoyo a la población que se encuentra expuesta a eventualidades de la naturaleza.<br>
                                La información de los kpis se encuentra desde el 2017 (último censo peruano) hasta el 2T 2022, con frecuencia trimestral, y proyección que cubre la puesta en operación y, consecuentemente el cierre de brecha, de la cartera actual de proyectos e intervenciones de Antamina en el AIO.<br>
                                En el proceso de avance del cierre de brechas resulta fundamental que el KPI Global y el KPI Antamina muestren tendencias decrecientes. En el corto plazo puede observarse oscilaciones en los kpis debido a componentes estacionales, cambios gubernamentales que alteran la institucionalidad, eventos exógenos atribuidos a la naturaleza, entre otros.
                            </p>
                        </div>
                        <div class="trimestre-grid-8 text-center">
                            <b>Cartera de proyectos en el AIO: 2022-2025</b>
                            <h6>(S/ millones)</h6>
                        </div>
                        <div class="trimestre-grid-9">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004490019253264435/unknown.png" alt="">
                        </div>
                    </div>
                </section>
                <hr>
                {{-- Resumen --}}
                <section id="resumen">
                    <div class="row text-center">
                        <h2>Resumen</h2>
                    </div>
                    <br>
                    <div class="trimestre2">
                        <div class="grid-trimestre2-1 text-center">
                            <b>KPI Antamina: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre2-2">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004517818445860994/unknown.png" alt="">
                            <p>
                                1/  Incluye OPEX, CAPEX y OxI <br>
                                AIO: Ámbito de Influencia de Antamina <br>
                                Fuente: Antamina, MEF, CCD
                            </p>
                        </div>
                        <div class="grid-trimestre2-3">
                            <p>
                                El KPI Antamina presenta una tendencia decreciente desde el año 2017, acelerado a partir del 1T 2021 por el Pilar 5 (Emergencias) vinculado al proceso de vacunación. Asimismo, mejoras en el nivel educativo de la población, anemia, desnutrición crónica, e infraestructura de servicios básicos y productiva han contribuido en la reducción del KPI Antamina. <br>
                                En el 2T 2022 el KPI Antamina disminuyó 0.2 puntos porcentuales respecto al 1T 2022, explicado por la reducción de los kpis vinculados al  Pilar 3 (Infraestructura social y productiva), principalmente con los proyectos: Mejora en la conectividad de internet en los distritos de San Marcos y Chavín de Huántar, así como en la continuación en la  vacunación contra el Covid-19 en todos los distritos del AIO. <br>
                                En los próximos años, «período de cosecha» de proyectos, se prevé una importante reducción de brechas que se traducirá en una disminución del KPI Antamina en 6 puntos porcentuales, principalmente en los pilares 3 y 4 (Infraestructura social y productiva, y Emprendimiento y desarrollo económico): Saneamiento, Hospital y Desembarcadero en Huarmey; Saneamiento, Centro de Salud y Carretera Carash Pujún - Juprog en San Marcos; Saneamiento en Huallanca; Saneamiento Verdecocha y Canal Tacta en San Pedro de Chaná, Centro de Salud Chiquián, entre otros.

                            </p>
                        </div>
                        <div class="grid-trimestre2-4 text-center">
                            <b>KPI Antamina y Contribución en Reducción de Brecha: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre2-5">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004518904342790376/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre2-6">
                            <p>
                                Actualmente San Marcos y Aquia presentan clima social con nivel de riesgo de disconformidad y tensión.
                            </p>
                        </div>
                        <div class="grid-trimestre2-7 text-center">
                            <b>KPI Antamina: San Marcos</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre2-8">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004519548847923230/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre2-9 text-center">
                            <b>KPI Antamina: Aquia</b>
                            <h6>(Porcentaje)</h6></div>
                        <div class="grid-trimestre2-10">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004519700748836904/unknown.png" alt="">
                        </div>
                    </div>
                </section>
                <hr>
                {{-- Antecedentes --}}
                <section id="antecedente">
                    <div class="row text-center">
                        <h2>Antecedente</h2>
                    </div>
                    <br>
                    <div class="trimestre3">
                        <div class="grid-trimestre3-1">
                            <p>
                                Desde el 1T 2017 hasta el 1T 2022 se observa una tendencia decreciente del KPI Antamina, de 60% a 51% entre ambos trimestres. En la primera parte del periodo se ha registrado una disminución tendencial «smooth» o suave, principalmente explicada por la culminación de los proyectos de infraestructura ejecutada bajo el mecanismos de OxI  como la carretera Túnel Kahuish (San Marcos), el Canal Shongo-Tanin (Chavín de Huántar), entre otros.
                            </p>
                        </div>
                        <div class="grid-trimestre3-2 text-center">
                            <b>KPI Antamina: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre3-3">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004793151208292382/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre3-4">
                            <p>
                                1/  Incluye OPEX, CAPEX y OxI <br>
                                AIO: Ámbito de Influencia de Antamina <br>
                                Fuente: Antamina, MEF, CCD
                            </p>
                        </div>
                        <div class="grid-trimestre3-5">
                            <p>
                                En relación al KPI Global, desde el 1T 2017 hasta el 1T 2022 se observa una tendencia decreciente, de 54% a 49% entre ambos trimestres. Al igual que el KPI Antamina, en el periodo, el KPI Global ha registrado una tendencia decreciente, lo que significa que  los kpis vinculados a los proyectos e intervenciones bajo gestión pública de los gobiernos locales, regional y nacional también ha registrado tendencias decrecientes. <br>
                                Entre el 1T 2021 y el 1T 2022, el KPI Antamina registra una disminución más acelerada, explicada por el rápido avance en el cierre de brecha de la vacunación (Pilar 5: Emergencias), así como por el inicio de operación de los proyectos de infraestructura como la carretera Túnel Kahuish, Saneamiento Pincullo, Mejoramiento de reservorio del Centro Poblado Ayash Huaripampa, caminos viales en Huaripampa, Saneamiento Letrinas en el distrito de San Marcos, y Mejoramiento de la Institución Educativa Santa Rosa en el distrito de Cajacay. <br>
                                En la siguiente figura se observa el KPI Global entre los trimestres 1T 2017 y 1T 2022. La performance trimestral de corto plazo del KPI Global muestra oscilaciones, explicado principalmente por la estacionalidad en el kpi ejecución del gasto de inversión municipal (canon y regalía minera), mayor ejecución en el cuarto trimestre de cada año, la nueva gestión municipal y regional iniciada en el primer trimestre del 2019, así como el inicio de la pandemia a principios del 2020 que generó la necesidad de establecer el kpi sobre brecha de vacunación de la población del AIO contra el Covid 19.
                            </p>
                        </div>
                        <div class="grid-trimestre3-6">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004795528086818856/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre3-7 text-center">
                            <b>KPI Global: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre3-8">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004795958510502009/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre3-9"></div>
                    </div>
                </section>
                <hr>
                {{-- 2T 2022 --}}
                <section id="2t2022">
                    <div class="row text-center">
                        <h2>2T 2022</h2>
                    </div>
                    <br>
                    <div class="trimestre4">
                        <div class="grid-trimestre4-1">
                            <p>
                                En el 2T 2022 el KPI Antamina alcanzó 50.8%, una disminución de 0.2 puntos porcentuales respecto al trimestre anterior, explicada principalmente por la reducción de las brechas en el Pilar 3 (Infraestructura social y productiva) por el inicio en operación de los proyectos Mejora en la conectividad de internet en los distritos de San Marcos (3,200 hogares con internet) y Chavín de Huántar (460 hogares con internet), así como por la continuación del proceso de vacunación contra el Covid-19 en todos los distritos del AIO correspondiente a la Región Áncash (más de 23,000 dosis aplicadas en el trimestre).
                            </p>
                        </div>
                        <div class="grid-trimestre4-2 text-center">
                            <b>KPI Antamina y Contribución en Reducción de Brecha: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre4-3">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004814324562403368/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre4-4 text-center">
                            <b>Proyectos Antamina Concluidos en el 2T 2022: AIO</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="grid-trimestre4-5 text-center">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Proyecto</td>
                                        <td>Distrito</td>
                                        <td>Modalidad de inversión</td>
                                        <td>Fecha Conclusión</td>
                                        <td>Pilar</td>
                                        <td>Beneficiarios</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tr-color">
                                        <td class="proyecto-text">
                                            Mejoramiento de la conectividad en el distrito de Chavín de Huántar
                                        </td>
                                        <td>
                                            Chavín de Huántar
                                        </td>
                                        <td>
                                            CAPEX
                                        </td>
                                        <td>
                                            1/06/2022
                                        </td>
                                        <td>
                                            Pilar 3: Infraestructura social y productiva
                                        </td>
                                        <td>
                                            460 hogares con internet
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="proyecto-text">
                                            Mejoramiento de la conectividad en el distrito de San Marcos
                                        </td>
                                        <td>
                                            San Marcos
                                        </td>
                                        <td>
                                            CAPEX
                                        </td>
                                        <td>
                                            1/06/2022
                                        </td>
                                        <td>
                                            Pilar 3: Infraestructura social y productiva
                                        </td>
                                        <td>
                                            3,200 hogares con internet
                                        </td>
                                    </tr>
                                    <tr class="tr-color">
                                        <td class="proyecto-text">
                                            Apoyo al Gobierno Regional de Áncash en la ejecución del Plan de Vacunación contra el Covid 19 en todos los distritos del AIO y en la Región Áncash
                                        </td>
                                        <td>
                                            17 distritos del AIO correspondientes a la Región Áncash
                                        </td>
                                        <td>
                                            OPEX
                                        </td>
                                        <td>
                                            Proceso
                                        </td>
                                        <td>
                                            Pilar 5: Emergencias
                                        </td>
                                        <td>
                                            23,059 dosis aplicadas
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <p>
                                Fuente: Antamina
                            </p>
                        </div>
                    </div>
                </section>
                <hr>
                {{-- Proyección --}}
                <section id="proyeccion">
                    <div class="row text-center">
                        <h2>Proyección</h2>
                    </div>
                    <br>
                    <div class="trimestre5">
                        <div class="grid-trimestre5-1">
                            <p>
                                Entre los años 2022-2026 se prevé una importante reducción de brechas que se traducirá en una disminución del KPI Antamina. Durante este «período de cosecha» de proyectos, se proyecta una reducción de brechas en 6 puntos porcentuales, como resultado de la entrada en operación de importantes proyectos, principalmente en los pilares 3 y 4 (Infraestructura social y productiva, y Emprendimiento y desarrollo económico): Saneamiento, Hospital y Desembarcadero en Huarmey; Saneamiento, Centro de Salud y Carretera Carash Pujún-  Juprog en San Marcos; Saneamiento en Huallanca; Saneamiento Verdecocha y Canal Tacta en San Pedro de Chaná, Centro de Salud Chiquián, entre otros.
                            </p>
                        </div>
                        <div class="grid-trimestre5-2 text-center">
                            <b>KPI Antamina y Contribución en Reducción de Brecha: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre5-3">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004836081390333992/unknown.png" alt="">
                            <p>Fuente: Antamina, MEF, CCD</p>
                        </div>
                        <div class="grid-trimestre5-4 text-center">
                            <b>Cartera de proyectos AIO: 3T 2022 - 2026</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="grid-trimestre5-5 text-center">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Proyecto</td>
                                        <td>Distrito</td>
                                        <td>Modalidad de Inversión</td>
                                        <td>Fecha Conclusión</td>
                                        <td>Pilar</td>
                                        <td>Beneficiarios</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="6" class="subtext">Trimestres 3T y 4T 2022:</td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="proyecto-text">Mejoramiento y ampliación del servicio de agua de riego en Yamor y Jarachara</td>
                                        <td>Antonio Raymondi</td>
                                        <td>OxI</td>
                                        <td>26/07/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>72 hectáreas de superficie agrícola bajo riego</td>
                                    </tr>
                                    <tr class="color2">
                                        <td class="proyecto-text">Mejoramiento y ampliación del servicio de agua y alcantarillado en Wishllac</td>
                                        <td>San Pedro de Chaná</td>
                                        <td>OxI</td>
                                        <td>21/08/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>26 viviendas con red publica de agua y desagüe</td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="proyecto-text">Mejoramiento y ampliación del servicio de agua y alcantarillado en zona urbana de San Marcos</td>
                                        <td>San Marcos</td>
                                        <td>OxI</td>
                                        <td>21/09/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>412 viviendas con red publica de agua y desague</td>
                                    </tr>
                                    <tr class="color2">
                                        <td class="proyecto-text">Mejoramiento y ampliación del servicio de agua para riego en el valle Purisima</td>
                                        <td>Huayllacayán</td>
                                        <td>OxI</td>
                                        <td>1/10/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>65 hectáreas de superficie agrícola bajo riego</td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="proyecto-text">Mejoramiento del servicio de agua para riego en Vinuc, Shillpo y Colca</td>
                                        <td>Cajacay</td>
                                        <td>OxI</td>
                                        <td>1/10/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>42 hectáreas de superficie agrícola bajo riego</td>
                                    </tr>
                                    <tr class="color2">
                                        <td class="proyecto-text">Hospital de Llata</td>
                                        <td>Llata</td>
                                        <td>OxI</td>
                                        <td>26/10/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>31 camas para atención medica</td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="proyecto-text">Conectividad Huachis</td>
                                        <td>Huachis</td>
                                        <td>CAPEX</td>
                                        <td>31/12/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>320 Hogares con acceso a internet</td>
                                    </tr>
                                    <tr class="color2">
                                        <td class="proyecto-text">Conectividad San Pedro de Chaná</td>
                                        <td>San Pedro de Chaná</td>
                                        <td>CAPEX</td>
                                        <td>31/12/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>655 Hogares con acceso a internet</td>
                                    </tr>
                                    <tr class="color1">
                                        <td class="proyecto-text">Conectividad segunda etapa San Marcos</td>
                                        <td>San Marcos</td>
                                        <td>CAPEX</td>
                                        <td>31/12/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>405 Hogares con acceso a internet</td>
                                    </tr>
                                    <tr class="color2">
                                        <td class="proyecto-text">Conectividad Aquia</td>
                                        <td>Aquia</td>
                                        <td>CAPEX</td>
                                        <td>31/12/2022</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>632 Hogares con acceso a internet</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="subtext2">Principales 2023 - 2026:</td>
                                    </tr>
                                    <tr class="color4">
                                        <td class="proyecto-text">Mejoramiento y ampliación de sistema de agua, alcantarillado y tratamiento de agua residual</td>
                                        <td>Huarmey</td>
                                        <td>OxI</td>
                                        <td>27/01/2023</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>3070 viviendas con red publica de agua y desagüe</td>
                                    </tr>
                                    <tr class="color3">
                                        <td class="proyecto-text">Mejoramiento del hospital Huarmey</td>
                                        <td>Huarmey</td>
                                        <td>OxI</td>
                                        <td>11/04/2023</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>28 camas para atención medica</td>
                                    </tr>
                                    <tr class="color4">
                                        <td class="proyecto-text">Mejoramiento de los canales de riego Huantun y Quechas</td>
                                        <td>Pararín</td>
                                        <td>CAPEX</td>
                                        <td>28/04/2023</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>108 hectáreas de superficie agrícola bajo riego</td>
                                    </tr>
                                    <tr class="color3">
                                        <td class="proyecto-text">Creación de sistema de riego en Yacupashtag</td>
                                        <td>Llata</td>
                                        <td>OxI</td>
                                        <td>29/09/2023</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>156.5 hectáreas de superficie agrícola bajo riego</td>
                                    </tr>
                                    <tr class="color4">
                                        <td class="proyecto-text">Mejoramiento y ampliación del sistema de agua y alcantarillado Huallanca</td>
                                        <td>Huallanca</td>
                                        <td>OxI</td>
                                        <td>29/12/2023</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>1707 viviendas con red publica de agua y desagüe</td>
                                    </tr>
                                    <tr class="color3">
                                        <td class="proyecto-text">Construcción y mejoramiento de carretera 
                                            <br>Carash - Pujun - Juprog</td>
                                        <td>San Marcos</td>
                                        <td>OxI</td>
                                        <td>31/12/2023</td>
                                        <td>Pilar 3: Infraestructura social y productiva</td>
                                        <td>34  kilómetros de red vial vecinal</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <hr>
                {{-- Distritos --}}
                <section id="distritos">
                    <div class="row text-center">
                        <h2>Distritos</h2>
                    </div>
                    <br>
                    <div class="trimestre6">
                        <div class="grid-trimestre6-1 text-center">
                            <b>Indicadores de clima social en comunidades del AIO</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="grid-trimestre6-2">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1004868215618404352/unknown.png" alt="">
                            <p>
                                Fuente: Antamina
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="trimestre7">
                        <div class="grid-trimestre7-1 text-center">
                            <h3>San Marcos</h3>
                        </div>
                        <div class="grid-trimestre7-2 text-center">
                            <b>KPI Antamina</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre7-3">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1005215245440131173/unknown.png" alt="">
                            <p>
                                1/  Incluye OPEX, CAPEX y OxI 
                                <br>
                                AIO: Ámbito de Influencia de Antamina
                                <br>
                                Fuente: Antamina, MEF, CCD
                            </p>
                        </div>
                        <div class="grid-trimestre7-4">
                            <p>
                                San Marcos es el distrito con mayor reducción de las brechas en el AIO. Desde el 1T 2017 hasta el 1T 2022 se observa una tendencia decreciente del KPI Antamina San Marcos, 64% a 51%. En el 2T 2022, el KPI Antamina San Marcos disminuyó 1 punto porcentual respecto al trimestre anterior, como resultado por la reducción en la brecha en conectividad distrital y la vacunación contra el Covid-19 (más de 7,057 dosis aplicadas en el trimestre).
                                <br>
                                En lo que resta del año 2022, se prevé el inicio del servicio de saneamiento distrital, la construcción de pistas en Huaripampa, la construcción del proyecto de agua y saneamiento Caserío Ayash Huamanin, y agua y saneamiento en el sub sector Ishanca. En los próximos años será fundamental para el distrito la construcción de la Carretera Carash Pujún -  Juprog y la Creación del sistema de riego Agua para todos en CC Ayash y Huaripampa, y Santa Cruz de Pichiu.
                            </p>
                        </div>
                        <div class="grid-trimestre7-5 text-center">
                            <b>KPI Antamina y Contribución en Reducción de Brecha</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre7-6">
                            <img src="https://cdn.discordapp.com/attachments/959455678940987512/1005217993552318515/unknown.png" alt="">
                        </div>
                        <div class="grid-trimestre7-7 text-center">
                            <b>Cartera de proyectos: 2T 2022 - 2026</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="grid-trimestre7-8 text-center">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Proyectos</td>
                                        <td>Modalidad de Inversión</td>
                                        <td>Fecha</td>
                                        <td>Pilar</td>
                                        <td>Beneficiarios</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="thead-1">
                                        <td colspan="5">Trimestre 2T 2022:</td>
                                    </tr>
                                    <tr class="table-1">
                                        <td class="proyecto-text">Mejora de la conectividad (antenas)</td>
                                        <td>CAPEX</td>
                                        <td>01/06/2022</td>
                                        <td>Pilar 3</td>
                                        <td>3,200 hogares</td>
                                    </tr>
                                    <tr class="table-1">
                                        <td class="proyecto-text">Plan de Vacunación contra el Covid 19 en San Marcos</td>
                                        <td>OPEX</td>
                                        <td>Proceso</td>
                                        <td>Pilar 5</td>
                                        <td>7,057 dosis</td>
                                    </tr>
                                    <tr class="thead-2">
                                        <td colspan="5">Trimestre 3T y 4T 2022:</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Saneamiento San Marcos</td>
                                        <td>OxI</td>
                                        <td>21/09/2022</td>
                                        <td>Pilar 3</td>
                                        <td>412 viviendas</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Pistas Huaripampa</td>
                                        <td>OxI</td>
                                        <td>18/10/2022</td>
                                        <td>Pilar 3</td>
                                        <td>1 kilómetro</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Proyecto de agua y saneamiento caserío Ayash Huamanin</td>
                                        <td>CAPEX</td>
                                        <td>31/10/2022</td>
                                        <td>Pilar 3</td>
                                        <td>70 viviendas</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Proyecto de agua y saneamiento<br>sub sector Ishanca</td>
                                        <td>CAPEX</td>
                                        <td>31/12/2022</td>
                                        <td>Pilar 3</td>
                                        <td>38 viviendas</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Conectividad segunda etapa San Marcos</td>
                                        <td>CAPEX</td>
                                        <td>31/12/2022</td>
                                        <td>Pilar 3</td>
                                        <td>405 hogares</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="thead-3">Principales 2023 - 2026:</td>
                                    </tr>
                                    <tr class="table-3">
                                        <td class="proyecto-text">Carretera Carash Pujún -  Juprog</td>
                                        <td>OxI</td>
                                        <td>31/12/2023</td>
                                        <td>Pilar 3</td>
                                        <td>334 kilómetros</td>
                                    </tr>
                                    <tr class="table-3">
                                        <td class="proyecto-text">Creación del sistema de riego Agua para todos, CC Ayash Huaripampa, Santa Cruz de Pichiu</td>
                                        <td>OPEX</td>
                                        <td>31/12/2023</td>
                                        <td>Pilar 3</td>
                                        <td>870 hectáreas</td>
                                    </tr>
                                    <tr class="table-3">
                                        <td class="proyecto-text">Centro de Salud San Marcos</td>
                                        <td>OxI</td>
                                        <td>01/06/2024</td>
                                        <td>Pilar 3</td>
                                        <td>20 camas</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <hr>
                {{-- Descargar --}}
                <section id="descarga">
                    <div class="row text-center">
                        <h2>Descargar Reportes</h2>
                    </div>
                    <br>
                    <div>
                        <ul>
                            <li><a href="/descargar" class="adescargar">Descargar Reporte Progreso Cierre de Brechas AIO Antamina</a></li>
                        </ul>
                    </div>
                </section>
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
    <script type="text/javascript">
        var sections = document.querySelectorAll('section');
        onscroll = function () {
            var scrollPosition = document.documentElement.scrollTop;

            sections.forEach( section => {
                if(scrollPosition + 210 >= section.offsetTop && scrollPosition < section.offsetTop + section.offsetHeight) {
                    var currId = section.attributes.id.value;
                    removeAllActiveClasses();
                    addActiveCLass(currId)
                }
            })
        }

        var removeAllActiveClasses = function() {
            document.querySelectorAll("nav a").forEach( el => {
                el.classList.remove('actual');
            })
        }

        var addActiveCLass = function(id) {
            console.log(id);
            var selector = `nav a[href="#${id}"]`;
            document.querySelector(selector).classList.add('actual')
        }
    </script>
</body>
</html>