<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Brechas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="SAD AIO - Brechas" name="description">
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
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    {{-- BOXICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- Chat whatsapp --}}
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-xxl p-0">
        @extends('layouts.navbar')
        <!-- Brechas Start -->
        <div class="container-xxl py-3">
            <div class="grid-container">
                <div class="grid-br-1"></div>
                {{-- titulo --}}
                <div class="grid-br-2">
                    <div class="title-grid">
                        <div class="text-grid">
                            <h3 id="titulo">Brechas en el AIO: Por Pilares</h3>
                            <p>(Porcentajes)</p>
                        </div>
                        <div class="btn-grid">
                            <a class="descargar-btn" href="#interested" role="button">
                                <i class="fas fa-cloud-download-alt"></i>
                                Documentos de interés
                            </a>
                        </div>
                    </div>
                    {{-- Filtros --}}
                    <div class="form-container">
                        <form action="/brechas" method="POST">
                            @csrf
                            {{-- Unidad Territorial --}}
                            <div>
                                <label id="label" for="location">Unidad Territorial</label>
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
                            <div>
                                <label id="label" for="years">Periodo</label>
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
                                    <option value="42021" <?php if (isset($_POST['years'])){ if($_POST['years']=="42021") echo 'selected';}?> >2021</option>
                                    <option value="2022" <?php if (isset($_POST['years'])){ if($_POST['years']=="2022") echo 'selected';}?> >2022</option>
                                    <option value="2023" <?php if (isset($_POST['years'])){ if($_POST['years']=="2023") echo 'selected';}?> >2023</option>
                                    <option value="2024" <?php if (isset($_POST['years'])){ if($_POST['years']=="2024") echo 'selected';}?> >2024</option>
                                    <option value="2025" <?php if (isset($_POST['years'])){ if($_POST['years']=="2025") echo 'selected';}?> >2025</option>
                                    <option value="2026" <?php if (isset($_POST['years'])){ if($_POST['years']=="2026") echo 'selected';}?> >2026</option>
                                </select>
                            </div>
                            {{-- Impactos --}}
                            <div>
                                <label id="label" for="impacto">Impactos</label>
                                <select id="impacto" name="impacto">
                                    <option value="Con impacto" <?php if (isset($_POST['impacto'])){ if($_POST['impacto']=="Con impacto") echo 'selected';}?>>Con Antamina</option>
                                    <option value="Sin impacto" <?php if (isset($_POST['impacto'])){ if($_POST['impacto']=="Sin impacto") echo 'selected';}?>>Sin Antamina</option>
                                </select>
                            </div>
                            {{-- Boton --}}
                            <div>
                                <input type="submit" value="Filtrar" onclick="onLoad()">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="grid-br-3"></div>
                <div class="grid-br-4"></div>
                {{-- Pilar 1 --}}
                <div class="grid-br-5">
                    <div class="clave">
                        <h5>Pilar 1: Institucionalidad Madura</h5>
                    </div>
                    <div class="valor">
                        <h4 >
                            {{ $indicador0 }}
                        </h4>
                    </div>
                </div>
                {{-- Canon minero --}}
                <div class="grid-br-6">
                    <table>
                        <tr>
                            <th><h6>Canon Minero, Regalía Minera y otros para el desarrollo</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador1 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Instrumentos de Planeamiento Municipal</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador2 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Ejecución del gasto de inversión municipal</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador3 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Calidad del gasto de inversión municipal</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador4 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <h6>Clima social para el desarrollo</h6>
                            </th>
                            <td>
                                <h6>
                                    {{ $indicador5 }}
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
                                    {{ $indicador6 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="sanea"><h6>Saneamiento</h6></th>
                            <td id="vsanea">
                                <h6>
                                    {{ $indicador7 }}
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
                                    {{ $indicador8 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="trans"><h6>Transporte</h6></th>
                            <td id="vtrans">
                                <h6>
                                    {{ $indicador9 }}
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
                                    {{ $indicador10 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="agro"><h6>Agropecuario</h6></th>
                            <td id="vagro">
                                <h6>
                                    {{ $indicador11 }}
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
                                    {{ $indicador12 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th id="edu"><h6>Educación</h6></th>
                            <td id="vedu">
                                <h6>
                                    {{ $indicador13 }}
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
                                    {{ $indicador14 }}
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
                                {{ $indicador15 }}
                            </h2>
                        </div>
                    </div>
                </div>
                {{-- Pilar 2 --}}
                <div class="grid-br-13">
                    <div class="clave">
                        <h5>Pilar 2: Oportunidades para las futuras generaciones</h5>
                    </div>
                    <div class="valor">
                        <h4>
                            {{ $indicador16 }}
                        </h4>
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
                                {{ $indicador17 }}
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
                                    {{ $indicador18 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Nivel de educación completa</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador19 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Logros de aprendizaje</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador20 }}
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
                                    {{ $indicador21 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>4to primaria</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador22 }}
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
                                    {{ $indicador23 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <th><h6>2do sec.</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador24 }}
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
                                    {{ $indicador25 }}
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
                {{-- Vida larga y saludable --}}
                <div class="grid-br-21">
                    <div class="clave">
                        <h5>Vida larga y saludable</h5>
                    </div>
                    <div class="valor">
                        <h4>
                            {{ $indicador26 }}
                        </h4>
                    </div>
                </div>
                {{-- Esperanza de vida --}}
                <div class="grid-br-22">
                    <table>
                        <tr>
                            <th><h6>Esperanza de vida</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador27 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Anemia</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador28 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Desnutrición Crónica</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador29 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Afiliación a seguro de salud</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador30 }}
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="grid-br-23"></div>
                {{-- Pilar 3 --}}
                <div class="grid-br-24">
                    <div class="clave">
                        <h5>Pilar 3: Infraestructura social y productiva</h5>
                    </div>
                    <div class="valor">
                        <h4>
                            {{ $indicador31 }}
                        </h4>
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
                                {{ $indicador32 }}
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
                                    {{ $indicador33 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Telefonía móvil</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador34 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Agua</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador35 }}
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
                                    {{ $indicador36 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Electrificación</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador37 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>PTAR</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador38 }}
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
                                    {{ $indicador39 }}
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
                                {{ $indicador40 }}
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
                                    {{ $indicador41 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Colegios: Adecuado Estado IIEE</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador42 }}
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
                                    {{ $indicador43 }}
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
                                    {{ $indicador44 }}
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
                                {{ $indicador45 }}
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
                                {{ $indicador46 }}
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
                                    {{ $indicador47 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Turística</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador48 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Académica</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador49 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Importancia del monto asignado</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador50 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Velocidad de ejecución</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador51 }}
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Titulo potencialidades --}}
                <div class="grid-br-39">
                    
                </div>
                {{-- Potencialidades --}}
                <div class="grid-br-40">
                    
                </div>
                <div class="grid-br-41"></div>
                {{-- Pilar 4 --}}
                <div class="grid-br-42">
                    <div class="clave">
                        <h5>Pilar 4: Emprendimiento y desarrollo económico</h5>
                    </div>
                    <div class="valor">
                        <h4>
                            {{ $indicador52 }}
                        </h4>
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
                                {{ $indicador53 }}
                            </h4>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <th><h6>Ingreso por persona</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador54 }}
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
                                    {{ $indicador55 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>PEA ocupada</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador56 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>Formación Univ./Técnica</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador57 }}
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- Pilar 5 --}}
                <div class="grid-br-45">
                    <div class="clave">
                        <h5>Pilar 5: Emergencias</h5>
                    </div>
                    <div class="valor">
                        <h4>
                            {{ $indicador58 }}
                        </h4>
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
                                {{ $indicador59 }}
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
                                    {{ $indicador60 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>2da dosis</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador61 }}
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <th><h6>3ra dosis</h6></th>
                            <td>
                                <h6>
                                    {{ $indicador62 }}
                                </h6>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
            {{-- Descarga --}}
            <div class="row dwnld-div" id="descarga">
                <a href="/descargar-brechas">
                        <i class="far fa-file-excel"></i>
                        DATA
                </a>
            </div>
            <div class="p-4" id="interested">
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
                {{-- <ul>
                    @php
                        $location = $_POST['location'];
                        $distrito = explode(",",$location);
                        $distrito_nom = $distrito[2];

                        $query = ['distrito' => $distrito_nom];
                        $doc = DB::table('documentos')
                            ->where($query)
                            ->get();
                    @endphp
                    @foreach ($doc as $d)
                        <li><a href="{{$d->doc_url}}">{{$d->doc_nombre}}</a></li>
                    @endforeach
                </ul> --}}
                <ul id="utAIO" class="class-list-block">
                    <li><a href="#">Documento sobre tema 1</a></li>
                    <li><a href="#">...</a></li>
                </ul>
                <ul id="utAquia" class="class-list-none">
                    <li><a href="#">Documento sobre Aquia 1</a></li>
                    <li><a href="#">...</a></li>
                </ul>
            </div>
        </div>
        <!-- Brechas End -->
        @extends('layouts.footer')
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Documentos de interés -->
    <script src="js/docs.js"></script>

    {{-- Loader --}}
    <script type="text/javascript">
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
</body>
</html>