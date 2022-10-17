<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporte Trimestral</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="SAD AIO Antamina - Reporte Trimestral" name="description">
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
    
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar -->
        <div class="container-xxl position-relative p-0 bg-black">
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
                    <h1 class="display-3 text-white mb-3 animated titleTrim mt-1"><b>Progreso Cierre de Brechas</b></h1>
                    <h1 class="display-3 text-white mb-3 animated">AIO Antamina - 2T 2022</h1>
                </div>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Trimestral Start -->      
        <div class="container-xxl py-5">
            <div class="row" id="trimestre-head">
                <div class="col-10">
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
                            <b>Importancia de Indicariores en el Desarrollo</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="trimestre-grid-3">
                            <img src="/img/reporte/Imagen1.png" alt="">
                            <p>Fuente: Banco Mundial, Antamina, CCD</p>
                        </div>
                        <div class="trimestre-grid-4">
                            <p>
                                Con el objetivo de apoyar en las decisiones para el cierre de brechas y desarrollo en el AIO Antamina, se han identificado 55 indicadores (kpis), los mismos que se encuentran consolidados en el «KPI Cierre de Brechas Global» (KPI Global). El KPI Global refleja los impactos en el cierre de brechas de todos los proyectos e intervenciones público - privado ejecutados en el AIO.
                            </p>
                        </div>
                        <div class="trimestre-grid-5 text-center">
                            <b>KPI Global: Cierre de Brechas AIO</b>
                            <h6>(Por factores y kpis)</h6>
                        </div>
                        <div class="trimestre-grid-6">
                            <img src="/img/reporte/Imagen2.png" alt="">
                        </div>
                        <div class="trimestre-grid-7">
                            <p>
                                Los kpis reflejan determinantes claves del Índice de Desarrollo Humano (IDH): ingresos, educación y salud; así como determinantes de la institucionalidad e intervenciones realizadas por Antamina para atender emergencias en apoyo a la población que se encuentra expuesta a eventualidades de la naturaleza. 
                                <br>
                                La información de los kpis se encuentra desde el 2017 (último censo peruano) hasta el 2T 2022, con frecuencia trimestral, y proyección que cubre la puesta en operación y, consecuentemente el cierre de brecha, de la cartera actual de proyectos e intervenciones de Antamina en el AIO.
                                <br>
                                En el proceso de avance del cierre de brechas resulta fundamental que el KPI Global muestre tendencia decreciente. En el corto plazo puede observarse oscilaciones en los kpis debido a componentes estacionales, cambios gubernamentales que alteran la institucionalidad, eventos exógenos atribuidos a la naturaleza, entre otros.
                            </p>
                        </div>
                        <div class="trimestre-grid-8 text-center">
                            <b>Cartera de proyectos en el AIO: 2022-2025</b>
                            <h6>(S/ millones)</h6>
                        </div>
                        <div class="trimestre-grid-9">
                            <img src="/img/reporte/Imagen3.png" alt="">
                            <p>
                                1/  Incluye OPEX y CAPEX del 2022
                                <br>
                                Pública: Gobiernos Local, Regional y Nacional
                            </p>
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
                            <b>KPI Global: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre2-2">
                            <img src="/img/reporte/Imagen4.png" alt="">
                            <p>
                                1/  Incluye OPEX, CAPEX y OxI <br>
                                AIO: Ámbito de Influencia de Antamina <br>
                                Fuente: Antamina, MEF, CCD
                            </p>
                        </div>
                        <div class="grid-trimestre2-3">
                            <p>
                                El KPI Global presenta una tendencia decreciente desde el año 2017, acelerado a partir del 1T 2021 por el Pilar 5 (Emergencias) vinculado al proceso de vacunación. Asimismo, mejoras en el nivel educativo de la población, anemia, desnutrición crónica, e infraestructura de servicios básicos y productiva han contribuido en la reducción del KPI Global.
                                <br>
                                En el 2T 2022 el KPI Global disminuyó 0.2 puntos porcentuales respecto al 1T 2022, explicado por la reducción de los kpis vinculados al  Pilar 3 (Infraestructura social y productiva), principalmente con los proyectos: Mejora en la conectividad de internet en los distritos de San Marcos y Chavín de Huántar, así como en la continuación en la  vacunación contra el Covid-19 en todos los distritos del AIO.
                                <br>
                                En los próximos años, «período de cosecha» de proyectos, se prevé una importante reducción de brechas que se traducirá en una disminución del KPI Global en más de 10 puntos porcentuales al 2026, principalmente en los pilares 3 y 4 (Infraestructura social y productiva, y Emprendimiento y desarrollo económico): Saneamiento, Hospital y Desembarcadero en Huarmey; Saneamiento, Centro de Salud y Carretera Carash Pujún - Juprog en San Marcos; Saneamiento en Huallanca; Saneamiento Verdecocha y Canal Tacta en San Pedro de Chaná, Centro de Salud Chiquián, entre otros.
                            </p>
                        </div>
                        <div class="grid-trimestre2-4 text-center">
                            <b>KPI Global y Contribución en Reducción de Brecha: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre2-5">
                            <img src="/img/reporte/Imagen5.png" alt="AIO">
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
                                <br>
                                Entre el 1T 2021 y el 1T 2022, el KPI Antamina registra una disminución más acelerada, explicada por el rápido avance en el cierre de brecha de la vacunación (Pilar 5: Emergencias), así como por el inicio de operación de los proyectos de infraestructura como la carretera Túnel Kahuish, Saneamiento Pincullo, Mejoramiento de reservorio del Centro Poblado Ayash Huaripampa, caminos viales en Huaripampa, Saneamiento Letrinas en el distrito de San Marcos, y Mejoramiento de la Institución Educativa Santa Rosa en el distrito de Cajacay. <br>
                                <br>
                                En la siguiente figura se observa el KPI Global entre los trimestres 1T 2017 y 1T 2022. La performance trimestral de corto plazo del KPI Global muestra oscilaciones, explicado principalmente por la estacionalidad en el kpi ejecución del gasto de inversión municipal (canon y regalía minera), mayor ejecución en el cuarto trimestre de cada año, la nueva gestión municipal y regional iniciada en el primer trimestre del 2019, así como el inicio de la pandemia a principios del 2020 que generó la necesidad de establecer el kpi sobre brecha de vacunación de la población del AIO contra el Covid 19.
                            </p>
                        </div>
                        <div class="grid-trimestre3-7 text-center">
                            <b>KPI Global: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre3-8">
                            <img src="/img/reporte/Imagen9.png" alt="">
                        </div>
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
                                En el 2T 2022 el KPI Global alcanzó 48.7%, una disminución de 0.2 puntos porcentuales respecto al trimestre anterior, explicada principalmente por la reducción de las brechas en el Pilar 3 (Infraestructura social y productiva) por el inicio en operación de los proyectos Mejora en la conectividad de internet en los distritos de San Marcos (3,200 hogares con internet) y Chavín de Huántar (460 hogares con internet), así como por la continuación del proceso de vacunación contra el Covid-19 en todos los distritos del AIO correspondiente a la Región Áncash (más de 23,000 dosis aplicadas en el trimestre).
                            </p>
                        </div>
                        <div class="grid-trimestre4-2 text-center">
                            <b>KPI Global y Contribución en Reducción de Brecha: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre4-3">
                            <img src="/img/reporte/Imagen11.png" alt="">
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
                <br>
                <br>
                <br>
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
                                Entre los años 2022-2026 se prevé una importante reducción de brechas que se traducirá en una disminución del KPI Global. Durante este «período de cosecha» de proyectos, se proyecta una reducción de brechas en más de 10 puntos porcentuales al 2026, como resultado de la entrada en operación de importantes proyectos, principalmente en los pilares 3 y 4 (Infraestructura social y productiva, y Emprendimiento y desarrollo económico): Saneamiento, Hospital y Desembarcadero en Huarmey; Saneamiento, Centro de Salud y Carretera Carash Pujún-  Juprog en San Marcos; Saneamiento en Huallanca; Saneamiento Verdecocha y Canal Tacta en San Pedro de Chaná, Centro de Salud Chiquián, entre otros.
                            </p>
                        </div>
                        <div class="grid-trimestre5-2 text-center">
                            <b>KPI Global y Contribución en Reducción de Brecha: AIO</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre5-3">
                            <img src="/img/reporte/Imagen12.png" alt="">
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
                            <img src="/img/reporte/Mapa.png" alt="">
                            <p>
                                Fuente: Antamina
                            </p>
                        </div>
                    </div>
                    <br>
                    <br>
                    {{-- San Marcos --}}
                    <div class="trimestre7">
                        <div class="grid-trimestre7-1 text-center">
                            <h3>San Marcos</h3>
                        </div>
                        <br>
                        <div class="grid-trimestre7-2 text-center">
                            <b>KPI Global</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre7-3">
                            <img src="/img/reporte/Imagen13.png" alt="">
                        </div>
                        <div class="grid-trimestre7-p">
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
                                San Marcos es uno de los distrito con mayor reducción de las brechas en el AIO. Desde el 1T 2017 hasta el 1T 2022 se observa una tendencia decreciente del KPI Global San Marcos, 47% a 40.6%. En el 2T 2022, el KPI Global San Marcos disminuyó 0.6 puntos porcentuales respecto al trimestre anterior, como resultado por la reducción en la brecha en conectividad distrital y la vacunación contra el Covid-19 (más de 7,057 dosis aplicadas en el trimestre).
                                <br>
                                En lo que resta del año 2022, se prevé el inicio del servicio de saneamiento distrital, la construcción de pistas en Huaripampa, la construcción del proyecto de agua y saneamiento Caserío Ayash Huamanin, y agua y saneamiento en el sub sector Ishanca. En los próximos años será fundamental para el distrito la construcción de la Carretera Carash Pujún -  Juprog y la Creación del sistema de riego Agua para todos en CC Ayash y Huaripampa, y Santa Cruz de Pichiu.
                            </p>
                        </div>
                        <div class="grid-trimestre7-5 text-center">
                            <b>KPI Global y Contribución en Reducción de Brecha</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre7-6">
                            <img src="/img/reporte/Imagen14.png" alt="">
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
                                        <td class="proyecto-text">Proyecto de agua y saneamiento sub sector Ayash Centro</td>
                                        <td>CAPEX</td>
                                        <td>30/11/2022</td>
                                        <td>Pilar 3</td>
                                        <td>71 viviendas</td>
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
                    <br>
                    {{-- Aquia --}}
                    <div class="trimestre8">
                        <div class="grid-trimestre8-1 text-center">
                            <h3>Aquia</h3>
                        </div>
                        <br>
                        <div class="grid-trimestre8-2 text-center">
                            <b>KPI Global</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre8-3">
                            <img src="/img/reporte/Imagen15.png" alt="">
                        </div>
                        <div class="grid-trimestre8-p">
                            <p>
                                1/  Incluye OPEX, CAPEX y OxI 
                                <br>
                                AIO: Ámbito de Influencia de Antamina
                                <br>
                                Fuente: Antamina, MEF, CCD
                            </p>
                        </div>
                        <div class="grid-trimestre8-4">
                            <p>
                                Desde el 1T 2017 hasta el 1T 2022 se observa una tendencia decreciente del KPI Global Aquia, de 56% a 48%. En el 2T 2022, el KPI Global disminuyó 0.9 puntos porcentuales respecto al trimestre anterior, explicado por la reducción en la brecha de vacunación contra el Covid-19 (476 dosis aplicadas en el trimestre).
                                <br>
                                En lo que resta del año 2022, se prevé culminar la construcción de la Cocina Comedor del Colegio de Aquia, la Conectividad distrital y la continuación del Programa “Más Educación”. Actualmente representantes de la Comunidad de Aquia y Antamina se viene reuniendo en los Comités de Desarrollo Económico para implementar nuevos proyectos productivos para los siguientes años.
                            </p>
                        </div>
                        <div class="grid-trimestre8-5 text-center">
                            <b>KPI Global y Contribución en Reducción de Brecha</b>
                            <h6>(Porcentaje)</h6>
                        </div>
                        <div class="grid-trimestre8-6">
                            <img src="/img/reporte/Imagen16.png" alt="">
                        </div>
                        <div class="grid-trimestre8-7 text-center">
                            <b>Cartera de proyectos: 2T 2022 - 2026</b>
                            <h6>(Descripción)</h6>
                        </div>
                        <div class="grid-trimestre8-8 text-center">
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
                                        <td class="proyecto-text">Plan de Vacunación contra el Covid 19 en Aquia</td>
                                        <td>OPEX</td>
                                        <td>Proceso</td>
                                        <td>Pilar 5</td>
                                        <td>476 dosis</td>
                                    </tr>
                                    <tr class="thead-2">
                                        <td colspan="5">Trimestre 3T y 4T 2022:</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Construcción de la Cocina Comedor del Colegio de Aquia</td>
                                        <td>CAPEX</td>
                                        <td>30/09/2022</td>
                                        <td>Pilar 3</td>
                                        <td>1 local público</td>
                                    </tr>
                                    <tr class="table-2">
                                        <td class="proyecto-text">Conectividad en Aquia</td>
                                        <td>CAPEX</td>
                                        <td>01/12/2022</td>
                                        <td>Pilar 2</td>
                                        <td>632 hogares</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="thead-3">Principales 2023 - 2026:</td>
                                    </tr>
                                    <tr class="table-3">
                                        <td class="proyecto-text">Elaboración de estudios de pre-inversión e inversión para el apalancamiento de fondos</td>
                                        <td>CAPEX</td>
                                        <td>01/07/2023</td>
                                        <td>Pilar 3</td>
                                        <td>Ejecución de gasto</td>
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
                    <table>
                        <thead class="text-center">
                            <tr>
                                <td>Periodo</td>
                                <td>Documento</td>
                                <td colspan="2">Descargar</td> 
                            </tr>
                        </thead>
                        {{-- Descarga 1 --}}
                        <tr>
                            <td class="text-center"><b>2T 2022</b></td>
                            <td>Progreso Cierre Brechas AIO - Reporte 2T 2022</td>
                            <td class="text-center">
                                <a href="/descargar-pdf1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="75.320129mm" height="92.604164mm" viewBox="0 0 75.320129 92.604164">
                                    <g transform="translate(53.548057 -183.975276) scale(1.4843)">
                                        <path fill="#ff2116" d="M-29.632812 123.94727c-3.551967 0-6.44336 2.89347-6.44336 6.44531v49.49804c0 3.55185 2.891393 6.44532 6.44336 6.44532H8.2167969c3.5519661 0 6.4433591-2.89335 6.4433591-6.44532v-40.70117s.101353-1.19181-.416015-2.35156c-.484969-1.08711-1.275391-1.84375-1.275391-1.84375a1.0584391 1.0584391 0 0 0-.0059-.008l-9.3906254-9.21094a1.0584391 1.0584391 0 0 0-.015625-.0156s-.8017392-.76344-1.9902344-1.27344c-1.39939552-.6005-2.8417968-.53711-2.8417968-.53711l.021484-.002z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/>
                                        <path fill="#f5f5f5" d="M-29.632812 126.06445h28.3789058a1.0584391 1.0584391 0 0 0 .021484 0s1.13480448.011 1.96484378.36719c.79889772.34282 1.36536982.86176 1.36914062.86524.0000125.00001.00391.004.00391.004l9.3671868 9.18945s.564354.59582.837891 1.20899c.220779.49491.234375 1.40039.234375 1.40039a1.0584391 1.0584391 0 0 0-.002.0449v40.74609c0 2.41592-1.910258 4.32813-4.3261717 4.32813H-29.632812c-2.415914 0-4.326172-1.91209-4.326172-4.32813v-49.49804c0-2.41603 1.910258-4.32813 4.326172-4.32813z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/>
                                        <path fill="#ff2116" d="M-23.40766 161.09299c-1.45669-1.45669.11934-3.45839 4.39648-5.58397l2.69124-1.33743 1.04845-2.29399c.57665-1.26169 1.43729-3.32036 1.91254-4.5748l.8641-2.28082-.59546-1.68793c-.73217-2.07547-.99326-5.19438-.52872-6.31588.62923-1.51909 2.69029-1.36323 3.50626.26515.63727 1.27176.57212 3.57488-.18329 6.47946l-.6193 2.38125.5455.92604c.30003.50932 1.1764 1.71867 1.9475 2.68743l1.44924 1.80272 1.8033728-.23533c5.72900399-.74758 7.6912472.523 7.6912472 2.34476 0 2.29921-4.4984914 2.48899-8.2760865-.16423-.8499666-.59698-1.4336605-1.19001-1.4336605-1.19001s-2.3665326.48178-3.531704.79583c-1.202707.32417-1.80274.52719-3.564509 1.12186 0 0-.61814.89767-1.02094 1.55026-1.49858 2.4279-3.24833 4.43998-4.49793 5.1723-1.3991.81993-2.86584.87582-3.60433.13733zm2.28605-.81668c.81883-.50607 2.47616-2.46625 3.62341-4.28553l.46449-.73658-2.11497 1.06339c-3.26655 1.64239-4.76093 3.19033-3.98386 4.12664.43653.52598.95874.48237 2.01093-.16792zm21.21809-5.95578c.80089-.56097.68463-1.69142-.22082-2.1472-.70466-.35471-1.2726074-.42759-3.1031574-.40057-1.1249.0767-2.9337647.3034-3.2403347.37237 0 0 .993716.68678 1.434896.93922.58731.33544 2.0145161.95811 3.0565161 1.27706 1.02785.31461 1.6224.28144 2.0729-.0409zm-8.53152-3.54594c-.4847-.50952-1.30889-1.57296-1.83152-2.3632-.68353-.89643-1.02629-1.52887-1.02629-1.52887s-.4996 1.60694-.90948 2.57394l-1.27876 3.16076-.37075.71695s1.971043-.64627 2.97389-.90822c1.0621668-.27744 3.21787-.70134 3.21787-.70134zm-2.74938-11.02573c.12363-1.0375.1761-2.07346-.15724-2.59587-.9246-1.01077-2.04057-.16787-1.85154 2.23517.0636.8084.26443 2.19033.53292 3.04209l.48817 1.54863.34358-1.16638c.18897-.64151.47882-2.02015.64411-3.06364z"/>
                                        <path fill="#2c2c2c" d="M-20.930423 167.83862h2.364986q1.133514 0 1.840213.2169.706698.20991 1.189489.9446.482795.72769.482795 1.75625 0 .94459-.391832 1.6233-.391833.67871-1.056548.97958-.65772.30087-2.02913.30087h-.818651v3.72941h-1.581322zm1.581322 1.22447v3.33058h.783664q1.049552 0 1.44838-.39184.405826-.39183.405826-1.27345 0-.65772-.265887-1.06355-.265884-.41282-.587747-.50378-.314866-.098-1.000572-.098zm5.50664-1.22447h2.148082q1.560333 0 2.4909318.55276.9375993.55276 1.4133973 1.6443.482791 1.09153.482791 2.42096 0 1.3994-.4338151 2.49793-.4268149 1.09153-1.3154348 1.76324-.8816233.67172-2.5189212.67172h-2.267031zm1.581326 1.26645v7.018h.657715q1.378411 0 2.001144-.9516.6227329-.95858.6227329-2.5539 0-3.5125-2.6238769-3.5125zm6.4722254-1.26645h5.30372941v1.26645H-4.2075842v2.85478h2.9807225v1.26646h-2.9807225v4.16322h-1.5813254z" font-family="Franklin Gothic Medium Cond" letter-spacing="0" style="line-height:125%;-inkscape-font-specification:'Franklin Gothic Medium Cond'" word-spacing="4.26000023"/>
                                    </g>
                                    </svg>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="/descargar-excel1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" fill="#FFF" stroke-miterlimit="10" stroke-width="2">
                                        <path stroke="#979593" d="M67.1716,7H27c-1.1046,0-2,0.8954-2,2v78 c0,1.1046,0.8954,2,2,2h58c1.1046,0,2-0.8954,2-2V26.8284c0-0.5304-0.2107-1.0391-0.5858-1.4142L68.5858,7.5858 C68.2107,7.2107,67.702,7,67.1716,7z"/>
                                        <path fill="none" stroke="#979593" d="M67,7v18c0,1.1046,0.8954,2,2,2h18"/>
                                        <path fill="#C8C6C4" d="M51 61H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 60.5523 51.5523 61 51 61zM51 55H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 54.5523 51.5523 55 51 55zM51 49H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 48.5523 51.5523 49 51 49zM51 43H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 42.5523 51.5523 43 51 43zM51 67H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 66.5523 51.5523 67 51 67zM79 61H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 60.5523 79.5523 61 79 61zM79 67H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 66.5523 79.5523 67 79 67zM79 55H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 54.5523 79.5523 55 79 55zM79 49H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 48.5523 79.5523 49 79 49zM79 43H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 42.5523 79.5523 43 79 43zM65 61H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 60.5523 65.5523 61 65 61zM65 67H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 66.5523 65.5523 67 65 67zM65 55H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 54.5523 65.5523 55 65 55zM65 49H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 48.5523 65.5523 49 65 49zM65 43H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 42.5523 65.5523 43 65 43z"/>
                                        <path fill="#107C41" d="M12,74h32c2.2091,0,4-1.7909,4-4V38c0-2.2091-1.7909-4-4-4H12c-2.2091,0-4,1.7909-4,4v32 C8,72.2091,9.7909,74,12,74z"/>
                                        <path d="M16.9492,66l7.8848-12.0337L17.6123,42h5.8115l3.9424,7.6486c0.3623,0.7252,0.6113,1.2668,0.7471,1.6236 h0.0508c0.2617-0.58,0.5332-1.1436,0.8164-1.69L33.1943,42h5.335l-7.4082,11.9L38.7168,66H33.041l-4.5537-8.4017 c-0.1924-0.3116-0.374-0.6858-0.5439-1.1215H27.876c-0.0791,0.2684-0.2549,0.631-0.5264,1.0878L22.6592,66H16.9492z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        {{-- Descarga 1 --}}
                        <tr>
                            <td class="text-center"><b>2T 2022</b></td>
                            <td>EC Monitoreo de KPIs y Vacunación - Reporte 2T 2022</td>
                            <td class="text-center">
                                <a href="/descargar-pdf2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="75.320129mm" height="92.604164mm" viewBox="0 0 75.320129 92.604164">
                                    <g transform="translate(53.548057 -183.975276) scale(1.4843)">
                                        <path fill="#ff2116" d="M-29.632812 123.94727c-3.551967 0-6.44336 2.89347-6.44336 6.44531v49.49804c0 3.55185 2.891393 6.44532 6.44336 6.44532H8.2167969c3.5519661 0 6.4433591-2.89335 6.4433591-6.44532v-40.70117s.101353-1.19181-.416015-2.35156c-.484969-1.08711-1.275391-1.84375-1.275391-1.84375a1.0584391 1.0584391 0 0 0-.0059-.008l-9.3906254-9.21094a1.0584391 1.0584391 0 0 0-.015625-.0156s-.8017392-.76344-1.9902344-1.27344c-1.39939552-.6005-2.8417968-.53711-2.8417968-.53711l.021484-.002z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/>
                                        <path fill="#f5f5f5" d="M-29.632812 126.06445h28.3789058a1.0584391 1.0584391 0 0 0 .021484 0s1.13480448.011 1.96484378.36719c.79889772.34282 1.36536982.86176 1.36914062.86524.0000125.00001.00391.004.00391.004l9.3671868 9.18945s.564354.59582.837891 1.20899c.220779.49491.234375 1.40039.234375 1.40039a1.0584391 1.0584391 0 0 0-.002.0449v40.74609c0 2.41592-1.910258 4.32813-4.3261717 4.32813H-29.632812c-2.415914 0-4.326172-1.91209-4.326172-4.32813v-49.49804c0-2.41603 1.910258-4.32813 4.326172-4.32813z" color="#000" font-family="sans-serif" overflow="visible" paint-order="markers fill stroke" style="line-height:normal;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;text-orientation:mixed;white-space:normal;shape-padding:0;isolation:auto;mix-blend-mode:normal;solid-color:#000000;solid-opacity:1"/>
                                        <path fill="#ff2116" d="M-23.40766 161.09299c-1.45669-1.45669.11934-3.45839 4.39648-5.58397l2.69124-1.33743 1.04845-2.29399c.57665-1.26169 1.43729-3.32036 1.91254-4.5748l.8641-2.28082-.59546-1.68793c-.73217-2.07547-.99326-5.19438-.52872-6.31588.62923-1.51909 2.69029-1.36323 3.50626.26515.63727 1.27176.57212 3.57488-.18329 6.47946l-.6193 2.38125.5455.92604c.30003.50932 1.1764 1.71867 1.9475 2.68743l1.44924 1.80272 1.8033728-.23533c5.72900399-.74758 7.6912472.523 7.6912472 2.34476 0 2.29921-4.4984914 2.48899-8.2760865-.16423-.8499666-.59698-1.4336605-1.19001-1.4336605-1.19001s-2.3665326.48178-3.531704.79583c-1.202707.32417-1.80274.52719-3.564509 1.12186 0 0-.61814.89767-1.02094 1.55026-1.49858 2.4279-3.24833 4.43998-4.49793 5.1723-1.3991.81993-2.86584.87582-3.60433.13733zm2.28605-.81668c.81883-.50607 2.47616-2.46625 3.62341-4.28553l.46449-.73658-2.11497 1.06339c-3.26655 1.64239-4.76093 3.19033-3.98386 4.12664.43653.52598.95874.48237 2.01093-.16792zm21.21809-5.95578c.80089-.56097.68463-1.69142-.22082-2.1472-.70466-.35471-1.2726074-.42759-3.1031574-.40057-1.1249.0767-2.9337647.3034-3.2403347.37237 0 0 .993716.68678 1.434896.93922.58731.33544 2.0145161.95811 3.0565161 1.27706 1.02785.31461 1.6224.28144 2.0729-.0409zm-8.53152-3.54594c-.4847-.50952-1.30889-1.57296-1.83152-2.3632-.68353-.89643-1.02629-1.52887-1.02629-1.52887s-.4996 1.60694-.90948 2.57394l-1.27876 3.16076-.37075.71695s1.971043-.64627 2.97389-.90822c1.0621668-.27744 3.21787-.70134 3.21787-.70134zm-2.74938-11.02573c.12363-1.0375.1761-2.07346-.15724-2.59587-.9246-1.01077-2.04057-.16787-1.85154 2.23517.0636.8084.26443 2.19033.53292 3.04209l.48817 1.54863.34358-1.16638c.18897-.64151.47882-2.02015.64411-3.06364z"/>
                                        <path fill="#2c2c2c" d="M-20.930423 167.83862h2.364986q1.133514 0 1.840213.2169.706698.20991 1.189489.9446.482795.72769.482795 1.75625 0 .94459-.391832 1.6233-.391833.67871-1.056548.97958-.65772.30087-2.02913.30087h-.818651v3.72941h-1.581322zm1.581322 1.22447v3.33058h.783664q1.049552 0 1.44838-.39184.405826-.39183.405826-1.27345 0-.65772-.265887-1.06355-.265884-.41282-.587747-.50378-.314866-.098-1.000572-.098zm5.50664-1.22447h2.148082q1.560333 0 2.4909318.55276.9375993.55276 1.4133973 1.6443.482791 1.09153.482791 2.42096 0 1.3994-.4338151 2.49793-.4268149 1.09153-1.3154348 1.76324-.8816233.67172-2.5189212.67172h-2.267031zm1.581326 1.26645v7.018h.657715q1.378411 0 2.001144-.9516.6227329-.95858.6227329-2.5539 0-3.5125-2.6238769-3.5125zm6.4722254-1.26645h5.30372941v1.26645H-4.2075842v2.85478h2.9807225v1.26646h-2.9807225v4.16322h-1.5813254z" font-family="Franklin Gothic Medium Cond" letter-spacing="0" style="line-height:125%;-inkscape-font-specification:'Franklin Gothic Medium Cond'" word-spacing="4.26000023"/>
                                    </g>
                                    </svg>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 96" fill="#FFF" stroke-miterlimit="10" stroke-width="2">
                                        <path stroke="#979593" d="M67.1716,7H27c-1.1046,0-2,0.8954-2,2v78 c0,1.1046,0.8954,2,2,2h58c1.1046,0,2-0.8954,2-2V26.8284c0-0.5304-0.2107-1.0391-0.5858-1.4142L68.5858,7.5858 C68.2107,7.2107,67.702,7,67.1716,7z"/>
                                        <path fill="none" stroke="#979593" d="M67,7v18c0,1.1046,0.8954,2,2,2h18"/>
                                        <path fill="#C8C6C4" d="M51 61H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 60.5523 51.5523 61 51 61zM51 55H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 54.5523 51.5523 55 51 55zM51 49H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 48.5523 51.5523 49 51 49zM51 43H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 42.5523 51.5523 43 51 43zM51 67H41v-2h10c.5523 0 1 .4477 1 1l0 0C52 66.5523 51.5523 67 51 67zM79 61H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 60.5523 79.5523 61 79 61zM79 67H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 66.5523 79.5523 67 79 67zM79 55H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 54.5523 79.5523 55 79 55zM79 49H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 48.5523 79.5523 49 79 49zM79 43H69c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C80 42.5523 79.5523 43 79 43zM65 61H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 60.5523 65.5523 61 65 61zM65 67H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 66.5523 65.5523 67 65 67zM65 55H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 54.5523 65.5523 55 65 55zM65 49H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 48.5523 65.5523 49 65 49zM65 43H55c-.5523 0-1-.4477-1-1l0 0c0-.5523.4477-1 1-1h10c.5523 0 1 .4477 1 1l0 0C66 42.5523 65.5523 43 65 43z"/>
                                        <path fill="#107C41" d="M12,74h32c2.2091,0,4-1.7909,4-4V38c0-2.2091-1.7909-4-4-4H12c-2.2091,0-4,1.7909-4,4v32 C8,72.2091,9.7909,74,12,74z"/>
                                        <path d="M16.9492,66l7.8848-12.0337L17.6123,42h5.8115l3.9424,7.6486c0.3623,0.7252,0.6113,1.2668,0.7471,1.6236 h0.0508c0.2617-0.58,0.5332-1.1436,0.8164-1.69L33.1943,42h5.335l-7.4082,11.9L38.7168,66H33.041l-4.5537-8.4017 c-0.1924-0.3116-0.374-0.6858-0.5439-1.1215H27.876c-0.0791,0.2684-0.2549,0.631-0.5264,1.0878L22.6592,66H16.9492z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </table>
                </section>
            </div>
        </div>
        <!-- Trimestral End -->

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
    <script src="{{ asset('js/navbar2.js') }}"></script>

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