var mapp = L.map('mapproy');

L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
    attribution:'Centro para la Competitividad y el Desarrollo',
    minZoom: 1,
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
}).addTo(mapp);

//Diseño del iconos
var marker1 = L.icon ({
    iconUrl: '/img/markers/marker_fe.png',
    iconSize: [25,35]
})

var marker2 = L.icon ({
    iconUrl: '/img/markers/marker1.png',
    iconSize: [25,35]
})

var marker3 = L.icon ({
    iconUrl: '/img/markers/marker2.png',
    iconSize: [25,35]
})

var marker4 = L.icon ({
    iconUrl: '/img/markers/marker3.png',
    iconSize: [25,35]
})

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
        }).addTo(mapp)
        mapp.fitBounds(geojsonlayer.getBounds())
    }
)

//Función para mostrar los colores
function style(_feature){ 
    return {
        fillColor: "#5499BC",
        weight: 2,
        opacity: 0.5,
        color: 'white',
        dashArray: '1',
        fillOpacity: 0.6
    };
}

//FlyTO -> Filtro para moverse entre ubicaciones
document.body.onload = function() {
    var coords = document.getElementById('location').value.split(',');
    //Si el select es AIO muestra todo, sino muestra el seleccionado
    if (coords=="AIO") {
        mapp.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        mapp.flyTo(coords, 13);
    }
    document.getElementById('select').value=coords[2];
}

document.getElementById('select-location').addEventListener('change', function(e){
    let coords = e.target.value.split(',');
    
    //Si el select es AIO muestra todo, sino muestra el seleccionado
    if (coords=="AIO") {
        mapp.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        mapp.flyTo(coords, 13);
    }
    document.getElementById('select-location').value=coords[2];
});

//Leyenda proyectos
var lengend = L.control({ position: 'bottomleft' });

lengend.onAdd = function() {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML +=
        '<div class="legendp">'+
        '<table>'+
            '<tbody>'+
                '<tr>'+
                    '<td><img class="img-fluid" src="/img/markers/marker1.png"></td>'+
                    '<td><h6>Corto Plazo</h6></td>'+
                '</tr>'+
                '<tr>'+
                    '<td><img class="img-fluid" src="/img/markers/marker2.png"></td>'+
                    '<td><h6>Mediano Plazo</h6></td>'+
                '</tr>'+
                '<tr>'+
                    '<td><img class="img-fluid" src="/img/markers/marker3.png"></td>'+
                    '<td><h6>Largo Plazo</h6></td>'+
                '</tr>'+
            '</tbody>'+
        '</table>'+
        '</div>';
    return div;
};

lengend.addTo(mapp);