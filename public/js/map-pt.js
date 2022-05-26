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
var marker1 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1653405268/ccd/marker_fe_jza7oo.png',
    iconSize: [25,35]
})

var marker2 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1652367551/ccd/marker1_hdqypn.png',
    iconSize: [25,35]
})

var marker3 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1652367551/ccd/marker2_weqa0n.png',
    iconSize: [25,35]
})

var marker4 = L.icon ({
    iconUrl: 'https://res.cloudinary.com/lvaldivia/image/upload/v1652367552/ccd/marker3_ekcmkc.png',
    iconSize: [30,45]
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
        mappt.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        mappt.flyTo(coords, 15);
    }
    
    //Cambiar imagen de potencialidad
    url = 'https://res.cloudinary.com/lvaldivia/image/upload/';
    switch (distr) {
        case 'Antonio Raymondi (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581394/ccd/potencialidades/antonio_raymondi_nhy0vm.png';
            break;
        case 'Aquia (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581396/ccd/potencialidades/aquia_xsxyk8.png';
            break;
        case 'Cajacay (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581394/ccd/potencialidades/cajacay_qgxlby.png';
            break;
        case 'Cátac (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581395/ccd/potencialidades/catac_ydr82r.png';
            break;
        case 'Chavín de Huántar (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581397/ccd/potencialidades/chavin_de_huantar_zkve0p.png';
            break;
        case 'Chiquián (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581396/ccd/potencialidades/chiquian_x5fq0l.png';
            break;
        case 'Colquioc (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581402/ccd/potencialidades/colquioc_odho1e.png';
            break;
        case 'Huachis (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581398/ccd/potencialidades/huachis_bxxdfw.png';
            break;
        case 'Huallanca (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581399/ccd/potencialidades/huallanca_tviayx.png';
            break;
        case 'Huarmey (Huarmey / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581400/ccd/potencialidades/huarmey_xedikr.png';
            break;
        case 'Huayllacayán (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581396/ccd/potencialidades/huayllacayan_wkmnl9.png';
            break;
        case 'Llacllín (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581401/ccd/potencialidades/llacllin_rvirrq.png';
            break;
        case 'Llata (Huamalíes / Huánuco)':
            document.getElementById("img-potencialidad").src=url+'v1653581397/ccd/potencialidades/llata_bpvxts.png';
            break;
        case 'Marca (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581396/ccd/potencialidades/marca_ahdpof.png';
            break;
        case 'Pampas Chico (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581396/ccd/potencialidades/pampas_chico_xaj4yv.png';
            break;
        case 'Paramonga (Barranca / Lima)':
            document.getElementById("img-potencialidad").src=url+'v1653581399/ccd/potencialidades/paramonga_otixtu.png';
            break;
        case 'Pararín (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581399/ccd/potencialidades/pararin_nvpxer.png';
            break;
        case 'Puños (Huamalíes / Huánuco)':
            document.getElementById("img-potencialidad").src=url+'v1653581397/ccd/potencialidades/punos_wcaywp.png';
            break;
        case 'San Marcos (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581399/ccd/potencialidades/san_marcos_yu0lxg.png';
            break;
        case 'San Pedro de Chaná (Huari / Áncash)':
            document.getElementById("img-potencialidad").src=url+'v1653581399/ccd/potencialidades/san_pedro_de_chana_qqjdit.png';
            break;
        case 'AIO':
            document.getElementById("img-potencialidad").src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/No_image_available_450_x_600.svg/450px-No_image_available_450_x_600.svg.png';
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