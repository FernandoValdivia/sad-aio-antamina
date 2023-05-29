<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Reducción</title>
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
    @extends('layouts.navbar')
    {{-- Tabla cierre brechas --}}
    <div class="cierre-brechas text-center">
        <div class="title-reduccion">
            <div class="title-text">
                <h3>KPI Antamina: Reducción de Brechas en el AIO por Pilares y Distritos</h3>
                <p>(Porcentajes)</p>
            </div>
            <div class="form-container">
                <form action="/reduccion" method="POST">
                    @csrf
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
                    {{-- Boton --}}
                    <div>
                        <input type="submit" value="Filtrar" onclick="onLoad()">
                    </div>
                </form>
            </div>
        </div>
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
            2021 / <b id="period">  </b> / 2026
        </h6>
        <p class="fuente">Fuente: PNUD, INEI, CCD, elaboración propia</p>
    </div>
    {{-- End tabla --}}
    @extends('layouts.footer')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Loader --}}
    <script>
        window.addEventListener("load", function () {
            const loader = document.querySelector(".loader");
            loader.className += " hidden"; // class "loader hidden"
        });
    </script>
    <script src="{{ asset('js/period.js') }}"></script>
</body>
</html>