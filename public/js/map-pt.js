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
    iconUrl: '/img/markers/marker_fe.png',
    iconSize: [25,35]
})
// Short Term
var marker2 = L.icon ({
    iconUrl: '/img/markers/marker1.png',
    iconSize: [25,35]
})
// Mediano Plazo
var marker3 = L.icon ({
    iconUrl: '/img/markers/marker2.png',
    iconSize: [25,35]
})
// Largo Plazo
var marker4 = L.icon ({
    iconUrl: '/img/markers/marker3.png',
    iconSize: [25,35]
})

//Filtro para moverse entre ubicaciones
document.body.onload = function() {
    var coords = document.getElementById('location').value.split(',');
    //Si el select es AIO muestra todo, sino muestra el seleccionado
    if (coords=="AIO") {
        mappt.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        mappt.flyTo(coords, 13);
    }
    document.getElementById('select').value=coords[2];
}

document.getElementById('select-location').addEventListener('change', function(e){
    let coords = e.target.value.split(',');
    
    //Obtener el dato (texto) del filtro seleccionado
    var select = document.getElementById("location"), //El <select>
    value = select.value, //El valor seleccionado
    distr = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
    
    //Cambiar título dinámicamente
    document.getElementById('titulo').textContent='Cadenas productivas en '+distr;
    
    //Cambiar imagen de potencialidad
    switch (distr) {
        case 'Antonio Raymondi (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/antonio_raymondi.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/antonio_raymondi.png';
            break;
        case 'Aquia (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/aquia.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/aquia.png';
            break;
        case 'Cajacay (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/cajacay.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/cajacay.png';
            break;
        case 'Cátac (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/catac.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/catac.png';
            break;
        case 'Chavín de Huántar (Huari / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/chavin_de_huantar.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/chavin_de_huantar.png';
            break;
        case 'Chiquián (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/chiquian.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/chiquian.png';
            break;
        case 'Colquioc (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/colquioc.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/colquioc.png';
            break;
        case 'Huachis (Huari / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/huachis.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/huachis.png';
            break;
        case 'Huallanca (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/huallanca.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/huallanca.png';
            break;
        case 'Huarmey (Huarmey / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/huarmey.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/huarmey.png';
            break;
        case 'Huayllacayán (Bolognesi / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/huayllacayan.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/huayllacayan.png';
            break;
        case 'Llacllín (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/llacllin.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/llacllin.png';
            break;
        case 'Llata (Huamalíes / Huánuco)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/llata.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/llata.png';
            break;
        case 'Marca (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/marca.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/marca.png';
            break;
        case 'Pampas Chico (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/pampas_chico.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/pampas_chico.png';
            break;
        case 'Paramonga (Barranca / Lima)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/paramonga.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/paramonga.png';
            break;
        case 'Pararín (Recuay / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/pararin.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/pararin.png';
            break;
        case 'Puños (Huamalíes / Huánuco)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/punios.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/punios.png';
            break;
        case 'San Marcos (Huari / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/san_marcos.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/san_marcos.png';
            break;
        case 'San Pedro de Chaná (Huari / Áncash)':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/san_pedro_de_chana.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/san_pedro_de_chana.png';
            break;
        case 'AIO':
            document.getElementById("img-potencialidad").src='/img/potencialidad/distrito/General-AIO.png';
            document.getElementById("potencialidad-modal").src='/img/potencialidad/distrito/General-AIO.png';
            break;
        default:
            document.getElementById("img-potencialidad").src='';
            document.getElementById("potencialidad-modal").src='';
            break;
    }

    //Si el select es AIO muestra todo el mapa, sino muestra solo la zona seleccionada
    if (coords=="AIO") {
        // Cambiar Clase de grid para que ocupe 4 columnas la imagen completa del AIO
        document.querySelector('.gridpt-3').classList.replace('gridpt-3','gridpt-3-aio')
        // Ocultar el mapa de los Marcadores para mostrar imagen completa
        document.querySelector('.gridpt-4').style.display = 'none';
        // Mover la visualización al total del AIO
        mappt.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        // Mover la visualización a las coordenadas seleccionadas
        mappt.flyTo(coords, 15);
        // Mostrar la imagen de la potencialidad seleccionada con su Clase grid normal
        document.querySelector('.gridpt-3-aio').classList.replace('gridpt-3-aio','gridpt-3')
        // Mostrar el mapa con los Marcadores
        document.querySelector('.gridpt-4').style.display = 'block';
    }
});

//Función para mostrar los colores
function style(){ 
    return {
        fillColor: false,
        weight: 2,
        opacity: 0.1,
        color: '#FFFFFF00',
        dashArray: '1',
        fillOpacity: 0.6
    };
}