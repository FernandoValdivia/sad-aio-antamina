<!DOCTYPE html>
<html lang="en">
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
                    <table>
                        <tr>
                            <th><h5>Potencialidades</h5></th>
                        </tr>
                    </table>
                </div>
                {{-- Potencialidades --}}
                <div class="grid-br-40">
                    <div class="c-br-40">
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
            {{-- Tabla cierre brechas --}}
            <hr>
            <div class="cierre-brechas text-center">
                <h3>KPI Antamina: Reducción de Brechas en el AIO por Pilares y Distritos</h3>
                <p>(Porcentajes)</p>
                <div class="tablePilares">
                    <table cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
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
                                    {{ $resultados['Institucionalidad Madura']['San Marcos (Huari / Áncash)']}}
                                    / 38
                                </td>
                                <td class="column3 style5 s">31/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['San Marcos (Huari / Áncash)']}}
                                    /26
                                </td>
                                <td class="column4 style5 s">60/
                                    {{ $resultados['Infraestructura social y productiva']['San Marcos (Huari / Áncash)']}}
                                    /42
                                </td>
                                <td class="column5 style5 s">44/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['San Marcos (Huari / Áncash)']}}
                                    /46
                                </td>
                                <td class="column6 style5 s">43/
                                    {{ $resultados['Emergencias']['San Marcos (Huari / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">47/
                                    {{ $resultados['Total']['San Marcos (Huari / Áncash)']}}
                                    /30
                                </td>
                            </tr>
                            <tr class="row2">
                                <td class="column1 style7 s">San Pedro de Chaná</td>
                                <td class="column2 style8 s">47/
                                    {{ $resultados['Institucionalidad Madura']['San Pedro de Chaná (Huari / Áncash)']}}
                                    /30
                                </td>
                                <td class="column3 style8 s">34/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['San Pedro de Chaná (Huari / Áncash)']}}
                                    /25
                                </td>
                                <td class="column4 style8 s">68/
                                    {{ $resultados['Infraestructura social y productiva']['San Pedro de Chaná (Huari / Áncash)']}}
                                    /41
                                </td>
                                <td class="column5 style8 s">57/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['San Pedro de Chaná (Huari / Áncash)']}}
                                    /72
                                </td>
                                <td class="column6 style8 s">55/
                                    {{ $resultados['Emergencias']['San Pedro de Chaná (Huari / Áncash)']}}  
                                    /0
                                </td>
                                <td class="column7 style9 s">52/
                                    {{ $resultados['Total']['San Pedro de Chaná (Huari / Áncash)']}}  
                                    /34
                                </td>
                            </tr>
                            <tr class="row3">
                                <td class="column1 style4 s">Huachis</td>
                                <td class="column2 style5 s">47/
                                    {{ $resultados['Institucionalidad Madura']['Huachis (Huari / Áncash)']}}
                                    /40
                                </td>
                                <td class="column3 style5 s">39/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Huachis (Huari / Áncash)']}}
                                    /30
                                </td>
                                <td class="column4 style5 s">62/
                                    {{ $resultados['Infraestructura social y productiva']['Huachis (Huari / Áncash)']}}
                                    /46
                                </td>
                                <td class="column5 style5 s">55/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Huachis (Huari / Áncash)']}}
                                    /69
                                </td>
                                <td class="column6 style5 s">70/
                                    {{ $resultados['Emergencias']['Huachis (Huari / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">52/
                                    {{ $resultados['Total']['Huachis (Huari / Áncash)']}}
                                    /37
                                </td>
                            </tr>
                            <tr class="row4">
                                <td class="column1 style7 s">Chavín de Huántar</td>
                                <td class="column2 style8 s">48/
                                    {{ $resultados['Institucionalidad Madura']['Chavín de Huántar (Huari / Áncash)']}}
                                    /41
                                </td>
                                <td class="column3 style8 s">28/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Chavín de Huántar (Huari / Áncash)']}}
                                    /23
                                </td>
                                <td class="column4 style8 s">65/
                                    {{ $resultados['Infraestructura social y productiva']['Chavín de Huántar (Huari / Áncash)']}}
                                    /46
                                </td>
                                <td class="column5 style8 s">55/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Chavín de Huántar (Huari / Áncash)']}}
                                    /67
                                </td>
                                <td class="column6 style8 s">53/
                                    {{ $resultados['Emergencias']['Chavín de Huántar (Huari / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">49/
                                    {{ $resultados['Total']['Chavín de Huántar (Huari / Áncash)']}}
                                    /36
                                </td>
                            </tr>
                            <tr class="row5">
                                <td class="column0 style14 s style14" rowspan="5">UGT Huallanca</td>
                                <td class="column1 style4 s">Huallanca</td>
                                <td class="column2 style5 s">56/
                                    {{ $resultados['Institucionalidad Madura']['Huallanca (Bolognesi / Áncash)']}}
                                    /53
                                </td>
                                <td class="column3 style5 s">28/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Huallanca (Bolognesi / Áncash)']}}
                                    /24
                                </td>
                                <td class="column4 style5 s">67/
                                    {{ $resultados['Infraestructura social y productiva']['Huallanca (Bolognesi / Áncash)']}}
                                    /50
                                </td>
                                <td class="column5 style5 s">49/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Huallanca (Bolognesi / Áncash)']}}
                                    /52
                                </td>
                                <td class="column6 style5 s">42/
                                    {{ $resultados['Emergencias']['Huallanca (Bolognesi / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">49/
                                    {{ $resultados['Total']['Huallanca (Bolognesi / Áncash)']}}
                                    /36
                                </td>
                            </tr>
                            <tr class="row6">
                                <td class="column1 style7 s">Aquia</td>
                                <td class="column2 style8 s">67/
                                    {{ $resultados['Institucionalidad Madura']['Aquia (Bolognesi / Áncash)']}}
                                    /58
                                </td>
                                <td class="column3 style8 s">33/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Aquia (Bolognesi / Áncash)']}}
                                    /23
                                </td>
                                <td class="column4 style8 s">61/
                                    {{ $resultados['Infraestructura social y productiva']['Aquia (Bolognesi / Áncash)']}}
                                    /49
                                </td>
                                <td class="column5 style8 s">51/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Aquia (Bolognesi / Áncash)']}}
                                    /54
                                </td>
                                <td class="column6 style8 s">52/
                                    {{ $resultados['Emergencias']['Aquia (Bolognesi / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">53/
                                    {{ $resultados['Total']['Aquia (Bolognesi / Áncash)']}}
                                    /37
                                </td>
                            </tr>
                            <tr class="row7">
                                <td class="column1 style4 s">Chiquián</td>
                                <td class="column2 style5 s">59/
                                    {{ $resultados['Institucionalidad Madura']['Chiquián (Bolognesi / Áncash)']}}
                                    /48
                                </td>
                                <td class="column3 style5 s">30/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Chiquián (Bolognesi / Áncash)']}}
                                    /28
                                </td>
                                <td class="column4 style5 s">51/
                                    {{ $resultados['Infraestructura social y productiva']['Chiquián (Bolognesi / Áncash)']}}
                                    /36
                                </td>
                                <td class="column5 style5 s">44/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Chiquián (Bolognesi / Áncash)']}}
                                    /49
                                </td>
                                <td class="column6 style5 s">36/
                                    {{ $resultados['Emergencias']['Chiquián (Bolognesi / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">45/
                                    {{ $resultados['Total']['Chiquián (Bolognesi / Áncash)']}}
                                    /32
                                </td>
                            </tr>
                            <tr class="row8">
                                <td class="column1 style7 s">Puños</td>
                                <td class="column2 style8 s">54/
                                    {{ $resultados['Institucionalidad Madura']['Puños (Huamalíes / Huánuco)']}}
                                    /57
                                </td>
                                <td class="column3 style8 s">36/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Puños (Huamalíes / Huánuco)']}}
                                    /27
                                </td>
                                <td class="column4 style8 s">74/
                                    {{ $resultados['Infraestructura social y productiva']['Puños (Huamalíes / Huánuco)']}}
                                    /50
                                </td>
                                <td class="column5 style8 s">54/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Puños (Huamalíes / Huánuco)']}}
                                    /71
                                </td>
                                <td class="column6 style8 s">72/
                                    {{ $resultados['Emergencias']['Puños (Huamalíes / Huánuco)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">56/
                                    {{ $resultados['Total']['Puños (Huamalíes / Huánuco)']}}
                                    /41
                                </td>
                            </tr>
                            <tr class="row9">
                                <td class="column1 style4 s">Llata</td>
                                <td class="column2 style5 s">57/
                                    {{ $resultados['Institucionalidad Madura']['Llata (Huamalíes / Huánuco)']}}
                                    /52
                                </td>
                                <td class="column3 style5 s">30/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Llata (Huamalíes / Huánuco)']}}
                                    /21
                                </td>
                                <td class="column4 style5 s">57/
                                    {{ $resultados['Infraestructura social y productiva']['Llata (Huamalíes / Huánuco)']}}
                                    /41
                                </td>
                                <td class="column5 style5 s">60/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Llata (Huamalíes / Huánuco)']}}
                                    /62
                                </td>
                                <td class="column6 style5 s">47/
                                    {{ $resultados['Emergencias']['Llata (Huamalíes / Huánuco)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">51/
                                    {{ $resultados['Total']['Llata (Huamalíes / Huánuco)']}}
                                    /35
                                </td>
                            </tr>
                            <tr class="row10">
                                <td class="column0 style13 s style13" rowspan="10">UGT Valle fortaleza</td>
                                <td class="column1 style7 s">Pampas Chico</td>
                                <td class="column2 style8 s">63/
                                    {{ $resultados['Institucionalidad Madura']['Pampas Chico (Recuay / Áncash)']}}
                                    /57
                                </td>
                                <td class="column3 style8 s">37/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Pampas Chico (Recuay / Áncash)']}}
                                    /31
                                </td>
                                <td class="column4 style8 s">62/
                                    {{ $resultados['Infraestructura social y productiva']['Pampas Chico (Recuay / Áncash)']}}
                                    /52
                                </td>
                                <td class="column5 style8 s">47/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Pampas Chico (Recuay / Áncash)']}}
                                    /61
                                </td>
                                <td class="column6 style8 s">64/
                                    {{ $resultados['Emergencias']['Pampas Chico (Recuay / Áncash)']}}
                                    /15
                                </td>
                                <td class="column7 style9 s">53/
                                    {{ $resultados['Total']['Pampas Chico (Recuay / Áncash)']}}
                                    /43
                                </td>
                            </tr>
                            <tr class="row11">
                                <td class="column1 style4 s">Marca</td>
                                <td class="column2 style5 s">60/
                                    {{ $resultados['Institucionalidad Madura']['Marca (Recuay / Áncash)']}}
                                    /44
                                </td>
                                <td class="column3 style5 s">43/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Marca (Recuay / Áncash)']}}
                                    /41
                                </td>
                                <td class="column4 style5 s">70/
                                    {{ $resultados['Infraestructura social y productiva']['Marca (Recuay / Áncash)']}}
                                    /66
                                </td>
                                <td class="column5 style5 s">58/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Marca (Recuay / Áncash)']}}
                                    /66
                                </td>
                                <td class="column6 style5 s">70/
                                    {{ $resultados['Emergencias']['Marca (Recuay / Áncash)']}}
                                    /17
                                </td>
                                <td class="column7 style6 s">58/
                                    {{ $resultados['Total']['Marca (Recuay / Áncash)']}}
                                    /47
                                </td>
                            </tr>
                            <tr class="row12">
                                <td class="column1 style7 s">Cajacay</td>
                                <td class="column2 style8 s">74/
                                    {{ $resultados['Institucionalidad Madura']['Cajacay (Bolognesi / Áncash)']}}
                                    /51
                                </td>
                                <td class="column3 style8 s">33/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Cajacay (Bolognesi / Áncash)']}}
                                    /19
                                </td>
                                <td class="column4 style8 s">71/
                                    {{ $resultados['Infraestructura social y productiva']['Cajacay (Bolognesi / Áncash)']}}
                                    /46
                                </td>
                                <td class="column5 style8 s">47/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Cajacay (Bolognesi / Áncash)']}}
                                    /54
                                </td>
                                <td class="column6 style8 s">47/
                                    {{ $resultados['Emergencias']['Cajacay (Bolognesi / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">56/
                                    {{ $resultados['Total']['Cajacay (Bolognesi / Áncash)']}}
                                    /34
                                </td>
                            </tr>
                            <tr class="row13">
                                <td class="column1 style4 s">Huayllacayán</td>
                                <td class="column2 style5 s">56/
                                    {{ $resultados['Institucionalidad Madura']['Huayllacayán (Bolognesi / Áncash)']}}
                                    /56
                                </td>
                                <td class="column3 style5 s">42/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Huayllacayán (Bolognesi / Áncash)']}}
                                    /25
                                </td>
                                <td class="column4 style5 s">65/
                                    {{ $resultados['Infraestructura social y productiva']['Huayllacayán (Bolognesi / Áncash)']}}
                                    /57
                                </td>
                                <td class="column5 style5 s">49/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Huayllacayán (Bolognesi / Áncash)']}}
                                    /67
                                </td>
                                <td class="column6 style5 s">54/
                                    {{ $resultados['Emergencias']['Huayllacayán (Bolognesi / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">53/
                                    {{ $resultados['Total']['Huayllacayán (Bolognesi / Áncash)']}}
                                    /41
                                </td>
                            </tr>
                            <tr class="row14">
                                <td class="column1 style7 s">Antonio Raymondi</td>
                                <td class="column2 style8 s">55/
                                    {{ $resultados['Institucionalidad Madura']['Antonio Raymondi (Bolognesi / Áncash)']}}
                                    /52
                                </td>
                                <td class="column3 style8 s">29/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Antonio Raymondi (Bolognesi / Áncash)']}}
                                    /19
                                </td>
                                <td class="column4 style8 s">77/
                                    {{ $resultados['Infraestructura social y productiva']['Antonio Raymondi (Bolognesi / Áncash)']}}
                                    /52
                                </td>
                                <td class="column5 style8 s">48/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Antonio Raymondi (Bolognesi / Áncash)']}}
                                    /63
                                </td>
                                <td class="column6 style8 s">62/
                                    {{ $resultados['Emergencias']['Antonio Raymondi (Bolognesi / Áncash)']}}
                                    /8
                                </td>
                                <td class="column7 style9 s">53/
                                    {{ $resultados['Total']['Antonio Raymondi (Bolognesi / Áncash)']}}
                                    /39
                                </td>
                            </tr>
                            <tr class="row15">
                                <td class="column1 style4 s">Llacllín</td>
                                <td class="column2 style5 s">48/
                                    {{ $resultados['Institucionalidad Madura']['Llacllín (Recuay / Áncash)']}}
                                    /56
                                </td>
                                <td class="column3 style5 s">48/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Llacllín (Recuay / Áncash)']}}
                                    /34
                                </td>
                                <td class="column4 style5 s">63/
                                    {{ $resultados['Infraestructura social y productiva']['Llacllín (Recuay / Áncash)']}}
                                    /56
                                </td>
                                <td class="column5 style5 s">54/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Llacllín (Recuay / Áncash)']}}
                                    /61
                                </td>
                                <td class="column6 style5 s">62/
                                    {{ $resultados['Emergencias']['Llacllín (Recuay / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">53/
                                    {{ $resultados['Total']['Llacllín (Recuay / Áncash)']}}
                                    /41
                                </td>
                            </tr>
                            <tr class="row16">
                                <td class="column1 style7 s">Colquioc</td>
                                <td class="column2 style8 s">61/
                                    {{ $resultados['Institucionalidad Madura']['Colquioc (Bolognesi / Áncash)']}}
                                    /56
                                </td>
                                <td class="column3 style8 s">28/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Colquioc (Bolognesi / Áncash)']}}
                                    /26
                                </td>
                                <td class="column4 style8 s">56/
                                    {{ $resultados['Infraestructura social y productiva']['Colquioc (Bolognesi / Áncash)']}}
                                    /49
                                </td>
                                <td class="column5 style8 s">45/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Colquioc (Bolognesi / Áncash)']}}
                                    /48
                                </td>
                                <td class="column6 style8 s">40/
                                    {{ $resultados['Emergencias']['Colquioc (Bolognesi / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">47/
                                    {{ $resultados['Total']['Colquioc (Bolognesi / Áncash)']}}
                                    /36
                                </td>
                            </tr>
                            <tr class="row17">
                                <td class="column1 style4 s">Pararín</td>
                                <td class="column2 style5 s">57/
                                    {{ $resultados['Institucionalidad Madura']['Pararín (Recuay / Áncash)']}}
                                    /50
                                </td>
                                <td class="column3 style5 s">50/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Pararín (Recuay / Áncash)']}}
                                    /42
                                </td>
                                <td class="column4 style5 s">67/
                                    {{ $resultados['Infraestructura social y productiva']['Pararín (Recuay / Áncash)']}}
                                    /48
                                </td>
                                <td class="column5 style5 s">47/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Pararín (Recuay / Áncash)']}}
                                    /65
                                </td>
                                <td class="column6 style5 s">71/
                                    {{ $resultados['Emergencias']['Pararín (Recuay / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">56/
                                    {{ $resultados['Total']['Pararín (Recuay / Áncash)']}}
                                    /41
                                </td>
                            </tr>
                            <tr class="row18">
                                <td class="column1 style7 s">Paramonga</td>
                                <td class="column2 style8 s">39/
                                    {{ $resultados['Institucionalidad Madura']['Paramonga (Barranca / Lima)']}}
                                    /49
                                </td>
                                <td class="column3 style8 s">28/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Paramonga (Barranca / Lima)']}}
                                    /30
                                </td>
                                <td class="column4 style8 s">57/
                                    {{ $resultados['Infraestructura social y productiva']['Paramonga (Barranca / Lima)']}}
                                    /58
                                </td>
                                <td class="column5 style8 s">35/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Paramonga (Barranca / Lima)']}}
                                    /37
                                </td>
                                <td class="column6 style8 s">30/
                                    {{ $resultados['Emergencias']['Paramonga (Barranca / Lima)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">39/
                                    {{ $resultados['Total']['Paramonga (Barranca / Lima)']}}
                                    /35
                                </td>
                            </tr>
                            <tr class="row19">
                                <td class="column1 style4 s">Cátac</td>
                                <td class="column2 style5 s">66/
                                    {{ $resultados['Institucionalidad Madura']['Cátac (Recuay / Áncash)']}}
                                    /53
                                </td>
                                <td class="column3 style5 s">24/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Cátac (Recuay / Áncash)']}}
                                    /21
                                </td>
                                <td class="column4 style5 s">49/
                                    {{ $resultados['Infraestructura social y productiva']['Cátac (Recuay / Áncash)']}}
                                    /47
                                </td>
                                <td class="column5 style5 s">51/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Cátac (Recuay / Áncash)']}}
                                    /60
                                </td>
                                <td class="column6 style5 s">60/
                                    {{ $resultados['Emergencias']['Cátac (Recuay / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style6 s">48/
                                    {{ $resultados['Total']['Cátac (Recuay / Áncash)']}}
                                    /36
                                </td>
                            </tr>
                            <tr class="row20">
                                <td class="column0 style10 s">UGT Huarmey</td>
                                <td class="column1 style11 s">Huarmey</td>
                                <td class="column2 style8 s">61/
                                    {{ $resultados['Institucionalidad Madura']['Huarmey (Huarmey / Áncash)']}}
                                    /42
                                </td>
                                <td class="column3 style8 s">22/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['Huarmey (Huarmey / Áncash)']}}
                                    /20
                                </td>
                                <td class="column4 style8 s">61/
                                    {{ $resultados['Infraestructura social y productiva']['Huarmey (Huarmey / Áncash)']}}
                                    /49
                                </td>
                                <td class="column5 style8 s">34/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['Huarmey (Huarmey / Áncash)']}}
                                    /43
                                </td>
                                <td class="column6 style8 s">39/
                                    {{ $resultados['Emergencias']['Huarmey (Huarmey / Áncash)']}}
                                    /0
                                </td>
                                <td class="column7 style9 s">44/
                                    {{ $resultados['Total']['Huarmey (Huarmey / Áncash)']}}
                                    /31
                                </td>
                            </tr>
                            <tr class="row21">
                                <td class="column0 style15 s style16" colspan="2">Total</td>
                                <td class="column2 style12 s">56/
                                    {{ $resultados['Institucionalidad Madura']['AIO']}}
                                    /53
                                </td>
                                <td class="column3 style12 s">34/
                                    {{ $resultados['Oportunidades para las futuras generaciones']['AIO']}}
                                    /27
                                </td>
                                <td class="column4 style12 s">63/
                                    {{ $resultados['Infraestructura social y productiva']['AIO']}}
                                    /49
                                </td>
                                <td class="column5 style12 s">49/
                                    {{ $resultados['Emprendimiento y desarrollo económico']['AIO']}}
                                    /58
                                </td>
                                <td class="column6 style12 s">54/
                                    {{ $resultados['Emergencias']['AIO']}}
                                    /2
                                </td>
                                <td class="column7 style12 s">51/
                                    {{ $resultados['Total']['AIO']}}
                                    /38
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h6>
                    2021 <b>/ {{ $period }} /</b> 2026
                </h6>
                <p class="fuente">Fuente: PNUD, INEI, CCD, elaboración propia</p>
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

    {{-- Chat Bot --}}
    <script src="widget.js"></script>
    <script src="botman.js"></script>
</body>
</html>