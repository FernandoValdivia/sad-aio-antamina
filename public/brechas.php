<?php   

//variables
    //1ra dosis = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Vacunación 1ra dosis")


    $dosis1 = DB::table('brechas')
        ->where('variable','Vacunación 1ra dosis')
        ->avg('porcentaje');

    //2da dosis = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Vacunación 2da dosis")
    $dosis2 = DB::table('brechas')
        ->where('variable','Vacunación 2da dosis')
        ->avg('porcentaje');
    
    //3ra dosis = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Vacunación 3ra dosis")
    $dosis3 = DB::table('brechas')
        ->where('variable','Vacunación 3ra dosis')
        ->avg('porcentaje');

    //Acceso a servicio de salud = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Camas de Hospitalización e internamientos")
    $acceso_salud = DB::table('brechas')
        ->where('variable','Camas de Hospitalización e internamientos')
        ->avg('porcentaje');

    //afiliacion a seguro desalud = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Población afiliada a algún tipo de seguro")
    $seguro_salud = DB::table('brechas')
        ->where('variable','Población afiliada a algún tipo de seguro')
        ->avg('porcentaje');
    
    //Agropecuaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Producción agrícola - Superficie Agrícola Bajo Riego (ha)")
    $agropecuaria = DB::table('brechas')
        ->where('variable','Producción agrícola - Superficie Agrícola Bajo Riego (ha)')
        ->avg('porcentaje');

    //Agropecuario = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Agropecurio")
    $agropecuario = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Agropecurio')
        ->avg('porcentaje');

    //Agua = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Abastecimiento de agua en la vivienda por red pública dentro de la vivienda")
    $agua = DB::table('brechas')
        ->where('variable','Abastecimiento de agua en la vivienda por red pública dentro de la vivienda')
        ->avg('porcentaje');

    //Anemia = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Anemia")
    $anemia = DB::table('brechas')
        ->where('variable','Anemia')
        ->avg('porcentaje');

    //Bicicletas rutas = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Bicicletas Rutas Solidarias")
    $bicicletas = DB::table('brechas')
        ->where('variable','Bicicletas Rutas Solidarias')
        ->avg('porcentaje');

    //CL- 2do de secundaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria")
    $cl_2dosecundaria = DB::table('brechas')
        ->where('variable','Alumnos con nivel satisfactorio en comprensión lectora - 2do secundaria')
        ->avg('porcentaje');

    //CL- 4to de primaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "CL-Satisfactorio 4To primaria")
    $cl_4toprimaria = DB::table('brechas')
        ->where('variable','CL-Satisfactorio 4To primaria')
        ->avg('porcentaje');

    //Inicial = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial")
    $inicial = DB::table('brechas')
        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Inicial')
        ->avg('porcentaje');

    //Clima social = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Clima social")
    $climasocial = DB::table('brechas')
        ->where('variable','Clima social')
        ->avg('porcentaje');

    //DCI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Desnutrición crónica infantil")
    $dci = DB::table('brechas')
        ->where('variable','Desnutrición crónica infantil')
        ->avg('porcentaje');

    //Desague = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Viviendas con red pública de desagüe dentro de la vivienda")
    $desague = DB::table('brechas')
        ->where('variable','Viviendas con red pública de desagüe dentro de la vivienda')
        ->avg('porcentaje');

    //Educacion = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Educación")
    $educacion = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Educación')
        ->avg('porcentaje');

    //Electricidad = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Viviendas con alumbrado eléctrico por red pública")
    $electricidad = DB::table('brechas')
        ->where('variable','Viviendas con alumbrado eléctrico por red pública')
        ->avg('porcentaje');

    //Esperanza de vida = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Esperanza de vida")
    $esperanza = DB::table('brechas')
        ->where('variable','Esperanza de vida')
        ->avg('porcentaje');

    //Gestion: ejecucion del gasto = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Ejecución presupuestal en inversiones")
    $gestion = DB::table('brechas')
        ->where('variable','Ejecución presupuestal en inversiones')
        ->avg('porcentaje');

    //Juntos = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Juntos, hogares afiliados")
    $juntos = DB::table('brechas')
        ->where('variable','Juntos, hogares afiliados')
        ->avg('porcentaje');

    //Kit de higiene escolar = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Kit de higiene escolar")
    $kitescolar = DB::table('brechas')
        ->where('variable','Kit de higiene escolar')
        ->avg('porcentaje');

    //Locales publicos en buen estado = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Locales públicos en buen estado (% del total)")
    $localesbuenestado = DB::table('brechas')
        ->where('variable','Locales públicos en buen estado (% del total)')
        ->avg('porcentaje');

    //M/L Plazo = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Locales públicos en buen estado (% del total)")
    $mlplazo = DB::table('brechas')
        ->where('variable','Locales públicos en buen estado (% del total)')
        ->avg('porcentaje');

    //Mantenimiento de IIEE = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Mantenimiento de IIEE")
    $mant_iiee = DB::table('brechas')
        ->where('variable','Mantenimiento de IIEE')
        ->avg('porcentaje');

    //Mat- 2do de secundaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Alumnos con nivel satisfactorio en matemática - 2do secundaria")
    $mat_2dosecundaria = DB::table('brechas')
        ->where('variable','Alumnos con nivel satisfactorio en matemática - 2do secundaria')
        ->avg('porcentaje');

    //Mat- 4to de primaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Mat-Satisfactorio 4To primaria")
    $mat_4toprimaria = DB::table('brechas')
        ->where('variable','Mat-Satisfactorio 4To primaria')
        ->avg('porcentaje');

    //PDLC = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: PDLC Actualizados")
    $pdlc = DB::table('brechas')
        ->where('variable','Planeamiento: PDLC Actualizados')
        ->avg('porcentaje');

    //PEA = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Poblacion economicante activa - PEA")
    $pea = DB::table('brechas')
        ->where('variable','Poblacion economicante activa - PEA')
        ->avg('porcentaje');

    //PEA ocupada = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "PEA Ocupada")
    $pea_ocupada = DB::table('brechas')
        ->where('variable','PEA Ocupada')
        ->avg('porcentaje');
    
    //PEI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: PEI Actualizados")
    $pei = DB::table('brechas')
        ->where('variable','Planeamiento: PEI Actualizados')
        ->avg('porcentaje');

    //Pension 65 = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Pensión 65, usuarios")
    $pension_65 = DB::table('brechas')
        ->where('variable','Pensión 65, usuarios')
        ->avg('porcentaje');

    //PMI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: PMI Actualizados")
    $pmi = DB::table('brechas')
        ->where('variable','Planeamiento: PMI Actualizados')
        ->avg('porcentaje');

    //Poblacion con educacion tecnica = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Población con educación técnica superior")
    $poblacion_edu_tecnica = DB::table('brechas')
        ->where('variable','Población con educación técnica superior')
        ->avg('porcentaje');

    //Poblacion con educacion universitaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Población con educación universitaria superior")
    $poblacion_edu_universitaria = DB::table('brechas')
        ->where('variable','Población con educación universitaria superior')
        ->avg('porcentaje');

    //Poblacion rural con acceso a educacion 17 y 20 años = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable]="Población rural entre 17 y 20 años con educación secundaria completa")
    $poblacion_rural_edu_17_20 = DB::table('brechas')
        ->where('variable','Población rural entre 17 y 20 años con educación secundaria completa')
        ->avg('porcentaje');

    //Poblacion urbana con acceso a educacion 17 y 20 años = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable]="Población urbana entre 17 y 20 años con educación secundaria completa")
    $poblacion_urbana_edu_17_20 = DB::table('brechas')
        ->where('variable','Población urbana entre 17 y 20 años con educación secundaria completa')
        ->avg('porcentaje');

    //POI = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Planeamiento: POI Actualizados")
    $poi = DB::table('brechas')
        ->where('variable','Planeamiento: POI Actualizados')
        ->avg('porcentaje');

    //Presencia de centros - EPT = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT")
    $presencia_ept = DB::table('brechas')
        ->where('variable','Presencia de Centros de Educación Técnico Productiva - Educación Para el Trabajo EPT')
        ->avg('porcentaje');

    //Presencia de escuelas - CETPROS = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Escuelas de Educación Superior - CETPROS")
    $presencia_cetpros = DB::table('brechas')
        ->where('variable','Presencia de Escuelas de Educación Superior - CETPROS')
        ->avg('porcentaje');

    //Presencia de institutos = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Institutos de Educación Superior")
    $presencia_institutos = DB::table('brechas')
        ->where('variable','Presencia de Institutos de Educación Superior')
        ->avg('porcentaje');

    //Presencia de universidades = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Presencia de Universidades Total")
    $presencia_universidades = DB::table('brechas')
        ->where('variable','Presencia de Universidades Total')
        ->avg('porcentaje');

    //Primaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria")
    $primaria = DB::table('brechas')
        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel primaria')
        ->avg('porcentaje');

    //PTAR = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)")
    $ptar = DB::table('brechas')
        ->where('variable','Acceso a Planta de Tratamiento de Aguas Residuales (PTAR)')
        ->avg('porcentaje');

    //Recursos para el desarrollo = CALCULATE( AVERAGE(Base[Brecha]); Base[Variable] = "Brecha recursos financieros (total brecha – Canon y Regalía Minera)")
    $recursos_desarrollo = DB::table('brechas')
        ->where('variable','Brecha recursos financieros (total brecha – Canon y Regalía Minera)')
        ->avg('porcentaje');
    
    //Red vial departamental = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Red vial departamental - Pavimentado")
    $red_vial_departamental = DB::table('brechas')
        ->where('variable','Red vial departamental - Pavimentado')
        ->avg('porcentaje');

    //Red vial nacional = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Red vial nacional - Pavimentado")
    $red_vial_nacional = DB::table('brechas')
        ->where('variable','Red vial nacional - Pavimentado')
        ->avg('porcentaje');

    //Red vial vecinal = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Red vial vecinal - Pavimentado")
    $red_vial_vecinal = DB::table('brechas')
        ->where('variable','Red vial vecinal - Pavimentado')
        ->avg('porcentaje');

    //Salud = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Salud")
    $salud = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Salud')
        ->avg('porcentaje');

    //Saneamiento = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Saneamiento")
    $saneamiento = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Saneamiento')
        ->avg('porcentaje');

    //Secundaria = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria")
    $secundaria = DB::table('brechas')
        ->where('variable','MATRÍCULA EN EL SISTEMA EDUCATIVO TOTAL - Nivel Secundaria')
        ->avg('porcentaje');

    //Servicio de internet = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Hogares con internet")
    $servicio_internet = DB::table('brechas')
        ->where('variable','Hogares con internet')
        ->avg('porcentaje');

    //Telefonia movil = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Hogares con telefonía celular")
    $telefonia_movil = DB::table('brechas')
        ->where('variable','Hogares con telefonía celular')
        ->avg('porcentaje');

    //Transporte = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Calidad de gasto presupuestal en inversiones - Transporte")
    $transporte = DB::table('brechas')
        ->where('variable','Calidad de gasto presupuestal en inversiones - Transporte')
        ->avg('porcentaje');

    //Turistica = CALCULATE(AVERAGE(Base[Brecha]);Base[Variable] = "Número de establecimientos de hospedaje")
    $turistica = DB::table('brechas')
        ->where('variable','Número de establecimientos de hospedaje')
        ->avg('porcentaje');

//calculos y operaciones
    //2do de secundaria = ([Mat- 2do de secundaria] + [CL- 2do de secundaria])/2
    $secundaria2do = ($mat_2dosecundaria + $cl_2dosecundaria)/2;
    
    //4to de primaria = ( [Mat- 4to de primaria] + [CL- 4to de primaria] )/2
    $primaria4to = ($mat_4toprimaria + $cl_4toprimaria)/2;

    //Academica = ([Presencia de centros - EPT] + [Presencia de escuelas - CETPROS] + [Presencia de institutos] + [Presencia de universidades]) /4
    $academica = ($presencia_ept+$presencia_cetpros+$presencia_institutos+$presencia_universidades)/4;

    //Acceso a educacion = ([Inicial] + [Primaria] + [Secundaria]) /3
    $acceso_educacion = ($inicial+$primaria+$secundaria)/3;

    //Retorno seguro = ( [Kit de higiene escolar] + [Mantenimiento de IIEE] + Base[Bicicletas rutas] ) /3
    $retorno_seguro = ($kitescolar+$mant_iiee+$bicicletas)/3;

    //Adecuado estado de IIEE = ([Locales publicos en buen estado] + [Retorno seguro] ) /2
    $adecuado_estado_iiee = ($localesbuenestado+$retorno_seguro);

    //Calidad del gasto = ([Saneamiento] + [Transporte] + [Agropecuario] + [Educacion] + [Salud])/5
    $calidad_gasto = ($saneamiento+$transporte+$agropecuario+$educacion+$salud)/5;

    //Capital humano = ( [Poblacion con educacion tecnica] + [Poblacion con educacion universitaria] + [PEA ocupada] + [PEA])/4
    $capital_humano = ($poblacion_edu_tecnica+$poblacion_edu_universitaria+$pea_ocupada+$pea)/4;

    //Nivel de educacion = ([Poblacion rural con acceso a educacion 17 y 20 años] + [Poblacion urbana con acceso a educacion 17 y 20 años])/2
    $nivel_educacion = ($poblacion_rural_edu_17_20+$poblacion_urbana_edu_17_20)/2;

    //Logros de aprendizaje = ( [4to de primaria] + [2do de secundaria])/2
    $logros_aprendizaje = ($primaria4to+$secundaria2do)/2;

    //Educacion EBR = ( [Acceso a educacion] + [Nivel de educacion] + [Adecuado estado de IIEE] + [Logros de aprendizaje] )/4
    $educacion_ebr = ($acceso_educacion+$nivel_educacion+$adecuado_estado_iiee+$logros_aprendizaje)/4;

    //Vial pavimentado = ([Red vial departamental] + [Red vial nacional] + [Red vial vecinal])/3
    $vial_pavimentado = ($red_vial_departamental+$red_vial_nacional+$red_vial_vecinal)/3;

    //Servicion basicos = ([Servicio de internet] + [Telefonia movil] + [Agua] + [Desague] + [Electricidad] + [PTAR] + [Vial pavimentado] )/7
    $servicios_basicos = ($servicio_internet+$telefonia_movil+$agua+$desague+$electricidad+$ptar+$vial_pavimentado)/7;

    //Infraestructura para el desarrollo de potencialidades = (Base[Agropecuaria] + [Turistica])/2
    $infraestructura_potencialidades = ($agropecuaria+$turistica)/2;

    //Infraestructura = ( [Infraestructura para el desarrollo de potencialidades] + [Academica])/2
    $infraestructura = ($infraestructura_potencialidades+$academica)/2;

    //Transferencias monetarias = ( [Juntos] + [Pension 65] ) /2
    $tranferencias_monetarias = ($juntos+$pension_65)/2;

    //Ingresos = ( [Infraestructura] + [Capital humano] + [Transferencias monetarias] )/3
    $ingresos = ($infraestructura+$capital_humano+$tranferencias_monetarias)/3;

    //Nivel de vida digno = ([Servicion basicos] + [Ingresos])/2
    $nivel_vida_digno = ($servicios_basicos+$ingresos)/2;

    //Planeamiento = ( [PDLC] + [POI] + [PEI] + [PMI] )/4
    $planteamiento = ($pdlc+$poi+$pei+$pmi)/4;

    //Vacunacion covid = ( [1ra dosis] + [2da dosis] + [3ra dosis] ) /3
    $vacunacion = ($dosis1+$dosis2+$dosis3)/3;

    //Vida larga y saludable = ([Esperanza de vida] +[Acceso a servicio de salud] + [Anemia] + [DCI] + [afiliacion a seguro desalud] + [Vacunacion covid])/6
    $vida_larga_saludable = ($esperanza+$acceso_salud+$anemia+$dci+$seguro_salud+$vacunacion)/6;

    //Institucionalidad = ( [Recursos para el desarrollo] + [Planeamiento] + [Gestion: ejecucion del gasto] + [Calidad del gasto] + [Clima social])/5
    $institucionalidad = ($recursos_desarrollo+$planteamiento+$gestion+$calidad_gasto+$climasocial)/5;

    //Univ/tecnica = ([Presencia de universidades] + [Presencia de institutos])/2
    $univ_tecnica = ($presencia_universidades+$presencia_institutos)/2;

    //Total Prom = CALCULATE(([Nivel de vida digno] + [Educacion EBR] + [Vida larga y saludable] + [Institucionalidad]) / 4)
    $total_avg = ($nivel_vida_digno+$educacion_ebr+$vida_larga_saludable+$institucionalidad)/4;
?>