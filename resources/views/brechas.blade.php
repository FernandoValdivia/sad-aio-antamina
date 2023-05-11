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
                                    <option value="42021" <?php if (isset($_POST['years'])){ if($_POST['years']=="42021") echo 'selected';}?>>2021</option>
                                    <option value="42022" <?php if (isset($_POST['years'])){ if($_POST['years']=="42022") echo 'selected';}?> >2022</option>
                                    <option value="42023" <?php if (isset($_POST['years'])){ if($_POST['years']=="42023") echo 'selected';}?> >2023</option>
                                    <option value="42024" <?php if (isset($_POST['years'])){ if($_POST['years']=="42024") echo 'selected';}?> >2024</option>
                                    <option value="42025" <?php if (isset($_POST['years'])){ if($_POST['years']=="42025") echo 'selected';}?> >2025</option>
                                    <option value="42026" <?php if (isset($_POST['years'])){ if($_POST['years']=="42026") echo 'selected';}?> >2026</option>
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
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    / 38
                                </td>
                                <td class="column3 style5 s">31/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /26
                                </td>
                                <td class="column4 style5 s">60/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /42
                                </td>
                                <td class="column5 style5 s">44/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /46
                                </td>
                                <td class="column6 style5 s">43/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'San Marcos (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /30
                                </td>
                            </tr>
                            <tr class="row2">
                                <td class="column1 style7 s">San Pedro de Chaná</td>
                                <td class="column2 style8 s">47/
                                    <?php
                                    if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                        $anio = $_POST['years'];
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    } else {
                                        $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                        $total = DB::table('brechasbd')
                                            ->where($query)
                                            ->avg('porcentaje');
                                        echo number_format($total,0);
                                    }
                                    ?> 
                                    /30
                                </td>
                                <td class="column3 style8 s">34/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /25
                                </td>
                                <td class="column4 style8 s">68/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                                <td class="column5 style8 s">57/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /72
                                </td>
                                <td class="column6 style8 s">55/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>    
                                    /0
                                </td>
                                <td class="column7 style9 s">52/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'San Pedro de Chaná (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>    
                                    /34
                                </td>
                            </tr>
                            <tr class="row3">
                                <td class="column1 style4 s">Huachis</td>
                                <td class="column2 style5 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /40
                                </td>
                                <td class="column3 style5 s">39/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /30
                                </td>
                                <td class="column4 style5 s">62/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /46
                                </td>
                                <td class="column5 style5 s">55/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /69
                                </td>
                                <td class="column6 style5 s">70/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">52/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Huachis (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /37
                                </td>
                            </tr>
                            <tr class="row4">
                                <td class="column1 style7 s">Chavín de Huántar</td>
                                <td class="column2 style8 s">48/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                                <td class="column3 style8 s">28/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /23
                                </td>
                                <td class="column4 style8 s">65/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /46
                                </td>
                                <td class="column5 style8 s">55/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /67
                                </td>
                                <td class="column6 style8 s">53/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">49/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Chavín de Huántar (Huari / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /36
                                </td>
                            </tr>
                            <tr class="row5">
                                <td class="column0 style14 s style14" rowspan="5">UGT Huallanca</td>
                                <td class="column1 style4 s">Huallanca</td>
                                <td class="column2 style5 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /53
                                </td>
                                <td class="column3 style5 s">28/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /24
                                </td>
                                <td class="column4 style5 s">67/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /50
                                </td>
                                <td class="column5 style5 s">49/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /52
                                </td>
                                <td class="column6 style5 s">42/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">49/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Huallanca (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /36
                                </td>
                            </tr>
                            <tr class="row6">
                                <td class="column1 style7 s">Aquia</td>
                                <td class="column2 style8 s">67/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /58
                                </td>
                                <td class="column3 style8 s">33/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /23
                                </td>
                                <td class="column4 style8 s">61/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /49
                                </td>
                                <td class="column5 style8 s">51/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /54
                                </td>
                                <td class="column6 style8 s">52/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">53/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Aquia (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /37
                                </td>
                            </tr>
                            <tr class="row7">
                                <td class="column1 style4 s">Chiquián</td>
                                <td class="column2 style5 s">59/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /48
                                </td>
                                <td class="column3 style5 s">30/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /28
                                </td>
                                <td class="column4 style5 s">51/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /36
                                </td>
                                <td class="column5 style5 s">44/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /49
                                </td>
                                <td class="column6 style5 s">36/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">45/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Chiquián (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /32
                                </td>
                            </tr>
                            <tr class="row8">
                                <td class="column1 style7 s">Puños</td>
                                <td class="column2 style8 s">54/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /57
                                </td>
                                <td class="column3 style8 s">36/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /27
                                </td>
                                <td class="column4 style8 s">74/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /50
                                </td>
                                <td class="column5 style8 s">54/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /71
                                </td>
                                <td class="column6 style8 s">72/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Puños (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                            </tr>
                            <tr class="row9">
                                <td class="column1 style4 s">Llata</td>
                                <td class="column2 style5 s">57/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /52
                                </td>
                                <td class="column3 style5 s">30/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /21
                                </td>
                                <td class="column4 style5 s">57/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                                <td class="column5 style5 s">60/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /62
                                </td>
                                <td class="column6 style5 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">51/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Llata (Huamalíes / Huánuco)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /35
                                </td>
                            </tr>
                            <tr class="row10">
                                <td class="column0 style13 s style13" rowspan="10">UGT Valle fortaleza</td>
                                <td class="column1 style7 s">Pampas Chico</td>
                                <td class="column2 style8 s">63/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /57
                                </td>
                                <td class="column3 style8 s">37/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /31
                                </td>
                                <td class="column4 style8 s">62/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /52
                                </td>
                                <td class="column5 style8 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /61
                                </td>
                                <td class="column6 style8 s">64/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /15
                                </td>
                                <td class="column7 style9 s">53/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Pampas Chico (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /43
                                </td>
                            </tr>
                            <tr class="row11">
                                <td class="column1 style4 s">Marca</td>
                                <td class="column2 style5 s">60/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /44
                                </td>
                                <td class="column3 style5 s">43/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                                <td class="column4 style5 s">70/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /66
                                </td>
                                <td class="column5 style5 s">58/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /66
                                </td>
                                <td class="column6 style5 s">70/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /17
                                </td>
                                <td class="column7 style6 s">58/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Marca (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /47
                                </td>
                            </tr>
                            <tr class="row12">
                                <td class="column1 style7 s">Cajacay</td>
                                <td class="column2 style8 s">74/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /51
                                </td>
                                <td class="column3 style8 s">33/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /19
                                </td>
                                <td class="column4 style8 s">71/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /46
                                </td>
                                <td class="column5 style8 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /54
                                </td>
                                <td class="column6 style8 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Cajacay (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /34
                                </td>
                            </tr>
                            <tr class="row13">
                                <td class="column1 style4 s">Huayllacayán</td>
                                <td class="column2 style5 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /56
                                </td>
                                <td class="column3 style5 s">42/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /25
                                </td>
                                <td class="column4 style5 s">65/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /57
                                </td>
                                <td class="column5 style5 s">49/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /67
                                </td>
                                <td class="column6 style5 s">54/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">53/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Huayllacayán (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                            </tr>
                            <tr class="row14">
                                <td class="column1 style7 s">Antonio Raymondi</td>
                                <td class="column2 style8 s">55/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /52
                                </td>
                                <td class="column3 style8 s">29/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /19
                                </td>
                                <td class="column4 style8 s">77/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /52
                                </td>
                                <td class="column5 style8 s">48/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /63
                                </td>
                                <td class="column6 style8 s">62/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /8
                                </td>
                                <td class="column7 style9 s">53/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Antonio Raymondi (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /39
                                </td>
                            </tr>
                            <tr class="row15">
                                <td class="column1 style4 s">Llacllín</td>
                                <td class="column2 style5 s">48/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /56
                                </td>
                                <td class="column3 style5 s">48/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /34
                                </td>
                                <td class="column4 style5 s">63/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /56
                                </td>
                                <td class="column5 style5 s">54/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /61
                                </td>
                                <td class="column6 style5 s">62/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">53/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Llacllín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                            </tr>
                            <tr class="row16">
                                <td class="column1 style7 s">Colquioc</td>
                                <td class="column2 style8 s">61/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /56
                                </td>
                                <td class="column3 style8 s">28/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /26
                                </td>
                                <td class="column4 style8 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /49
                                </td>
                                <td class="column5 style8 s">45/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /48
                                </td>
                                <td class="column6 style8 s">40/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Colquioc (Bolognesi / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /36
                                </td>
                            </tr>
                            <tr class="row17">
                                <td class="column1 style4 s">Pararín</td>
                                <td class="column2 style5 s">57/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /50
                                </td>
                                <td class="column3 style5 s">50/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /42
                                </td>
                                <td class="column4 style5 s">67/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /48
                                </td>
                                <td class="column5 style5 s">47/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /65
                                </td>
                                <td class="column6 style5 s">71/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Pararín (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /41
                                </td>
                            </tr>
                            <tr class="row18">
                                <td class="column1 style7 s">Paramonga</td>
                                <td class="column2 style8 s">39/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /49
                                </td>
                                <td class="column3 style8 s">28/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /30
                                </td>
                                <td class="column4 style8 s">57/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /58
                                </td>
                                <td class="column5 style8 s">35/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /37
                                </td>
                                <td class="column6 style8 s">30/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">39/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Paramonga (Barranca / Lima)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /35
                                </td>
                            </tr>
                            <tr class="row19">
                                <td class="column1 style4 s">Cátac</td>
                                <td class="column2 style5 s">66/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /53
                                </td>
                                <td class="column3 style5 s">24/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /21
                                </td>
                                <td class="column4 style5 s">49/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /47
                                </td>
                                <td class="column5 style5 s">51/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /60
                                </td>
                                <td class="column6 style5 s">60/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style6 s">48/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Cátac (Recuay / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /36
                                </td>
                            </tr>
                            <tr class="row20">
                                <td class="column0 style10 s">UGT Huarmey</td>
                                <td class="column1 style11 s">Huarmey</td>
                                <td class="column2 style8 s">61/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /42
                                </td>
                                <td class="column3 style8 s">22/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /20
                                </td>
                                <td class="column4 style8 s">61/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /49
                                </td>
                                <td class="column5 style8 s">34/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /43
                                </td>
                                <td class="column6 style8 s">39/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /0
                                </td>
                                <td class="column7 style9 s">44/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'Huarmey (Huarmey / Áncash)', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /31
                                </td>
                            </tr>
                            <tr class="row21">
                                <td class="column0 style15 s style16" colspan="2">Total</td>
                                <td class="column2 style12 s">56/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Institucionalidad Madura', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /53
                                </td>
                                <td class="column3 style12 s">34/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Oportunidades para las futuras generaciones', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /27
                                </td>
                                <td class="column4 style12 s">63/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Infraestructura social y productiva', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /49
                                </td>
                                <td class="column5 style12 s">49/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emprendimiento y desarrollo económico', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /58
                                </td>
                                <td class="column6 style12 s">54/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Emergencias', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /2
                                </td>
                                <td class="column7 style12 s">51/
                                    <?php
                                        if(isset($_POST['years']) and $_POST['years']!='Todos'){
                                            $anio = $_POST['years'];
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => $anio ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        } else {
                                            $query = ['variable' => 'Total', 'distrito' => 'AIO', 'impacto' => 'Con impacto', 'anio' => '22022' ];
                                            $total = DB::table('brechasbd')
                                                ->where($query)
                                                ->avg('porcentaje');
                                            echo number_format($total,0);
                                        }
                                    ?>
                                    /38
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h6>
                    2021 <b>/ <?php if(isset($_POST['years']) and $_POST['years']!='Todos'){ if($_POST['years']=="32022"){echo '3T 2022';} elseif($_POST['years']=="22022"){echo '2T 2022';} else { echo $_POST['years'];}} else { echo '2T 2022';} ?> /</b> 2026
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