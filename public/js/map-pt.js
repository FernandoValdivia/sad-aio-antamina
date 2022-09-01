var mappt = L.map('map-pt');

L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
    attribution:'Centro para la Competitividad y el Desarrollo',
    minZoom: 1,
    maxZoom: 18,
    subdomains:['mt0','mt1','mt2','mt3'],
}).addTo(mappt);

//Añadir capa en formato Geojson
let geojson_url = "https://api.maptiler.com/data/428836f4-9131-4044-a4a2-64a4422d388f/features.json?key=xlYleewapf1kKt27GBjx"
fetch(
    geojson_url
).then(
    res => res.json()
).then(
    data => {
        let geojsonlayer = L.geoJson(data, {
            style: style,
            //Configuración popup distrito
            onEachFeature: function(feature, layer) {
                layer.bindPopup('<strong>Departamento: </strong>' + feature.properties.NOMBDEP.charAt(0).toUpperCase()+feature.properties.NOMBDEP.slice(1).toLowerCase()+ '</br>' + '<strong>Distrito: </strong>' + feature.properties.NOMBDIST.charAt(0).toUpperCase()+feature.properties.NOMBDIST.slice(1).toLowerCase());
            }
        }).addTo(mappt)
        mappt.fitBounds(geojsonlayer.getBounds())
    }
)

//Diseño del iconos
//First Engagement
var marker1 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1653405268/ccd/marker_fe_jza7oo.png',
    iconSize: [25,35]
})
// Short Term
var marker2 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1652367551/ccd/marker1_hdqypn.png',
    iconSize: [25,35]
})
// Medium Term
var marker3 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1652367551/ccd/marker2_weqa0n.png',
    iconSize: [25,35]
})
// Long Term
var marker4 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1652367552/ccd/marker3_ekcmkc.png',
    iconSize: [25,35]
})

//Filtro para moverse entre ubicaciones
document.getElementById('select-location').addEventListener('change', function(e){
    let coords = e.target.value.split(',');
    
    //Obtener el dato (texto) del filtro seleccionado
    var select = document.getElementById("location"), //El <select>
    value = select.value, //El valor seleccionado
    distr = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
    
    //Cambiar título dinámicamente
    document.getElementById('titulo').textContent='Cadenas productivas en '+distr;
    
    //Si el select es AIO muestra todo el mapa, sino muestra solo la zona seleccionada
    if (coords=="AIO") {
        document.getElementById('img-potencialidad').style.width = '100%';
        mappt.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        document.getElementById('img-potencialidad').style.width = '60%';
        mappt.flyTo(coords, 15);
    }
    
    //Cambiar imagen de potencialidad
    url = 'https://res.cloudinary.com/lvaldivia/image/upload/';
    switch (distr) {
        case 'Antonio Raymondi (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022680/ccd/potencialidades/distritos/antonio_raymondi_uyoldv.png';
            break;
        case 'Aquia (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022677/ccd/potencialidades/distritos/aquia_s2in8s.png';
            break;
        case 'Cajacay (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022680/ccd/potencialidades/distritos/cajacay_hi3f1v.png';
            break;
        case 'Cátac (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/catac_gzh9aw.png';
            break;
        case 'Chavín de Huántar (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/chavin_de_huantar_ds6n5j.png';
            break;
        case 'Chiquián (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022677/ccd/potencialidades/distritos/chiquian_wv1z96.png';
            break;
        case 'Colquioc (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/colquioc_dvtqov.png';
            break;
        case 'Huachis (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022678/ccd/potencialidades/distritos/huachis_shdv4o.png';
            break;
        case 'Huallanca (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/huallanca_mt0bag.png';
            break;
        case 'Huarmey (Huarmey / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/huarmey_ij2grh.png';
            break;
        case 'Huayllacayán (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022680/ccd/potencialidades/distritos/huayllacayan_p8fkwb.png';
            break;
        case 'Llacllín (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/llacllin_cf4bvz.png';
            break;
        case 'Llata (Huamalíes / Huánuco)':
            document.getElementById("img-potencialidad").src=url+'v1654022681/ccd/potencialidades/distritos/llata_s1d0bv.png';
            break;
        case 'Marca (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022681/ccd/potencialidades/distritos/marca_dsylh1.png';
            break;
        case 'Pampas Chico (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022681/ccd/potencialidades/distritos/pampas_chico_vmmvql.png';
            break;
        case 'Paramonga (Barranca / Lima)':
            document.getElementById("img-potencialidad").src=url+'v1654022679/ccd/potencialidades/distritos/paramonga_zkaajz.png';
            break;
        case 'Pararín (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022680/ccd/potencialidades/distritos/pararin_coffnk.png';
            break;
        case 'Puños (Huamalíes / Huánuco)':
            document.getElementById("img-potencialidad").src=url+'v1654022677/ccd/potencialidades/distritos/punios_bjm0vt.png';
            break;
        case 'San Marcos (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022678/ccd/potencialidades/distritos/san_marcos_q8t4je.png';
            break;
        case 'San Pedro de Chaná (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1654022678/ccd/potencialidades/distritos/san_pedro_de_chana_mpihgb.png';
            break;
        case 'AIO':
            document.getElementById("img-potencialidad").src=url+'v1654021921/ccd/General-AOI_iyrrbu.png';
            break;
        default:
            document.getElementById("img-potencialidad").src='';
            break;
    }
});

//Función para mostrar los colores
function style(){ 
    return {
        fillColor: "#5499BC",
        weight: 2,
        opacity: 0.5,
        color: 'white',
        dashArray: '1',
        fillOpacity: 0.6
    };
}