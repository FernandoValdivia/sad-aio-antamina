var map = L.map('map-rsm');

L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
    attribution:'Centro para la Competitividad y el Desarrollo',
    minZoom: 1,
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
}).addTo(map);

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
            onEachFeature: function({properties}, layer) {
                layer.bindPopup(`<strong>Distrito: </strong> ${properties.NOMBDIST[0].toUpperCase()+properties.NOMBDIST.slice(1).toLowerCase()}`);
            }
        }).addTo(map)
        map.fitBounds(geojsonlayer.getBounds())
    }
)

//Función para mostrar los colores
function style(feature){ 
    return {
        fillColor: getColor(feature.properties.NOMBDIST),
        weight: 2,
        opacity: 0.5,
        color: 'white',
        dashArray: '1',
        fillOpacity: 0.41
    };
}

//FlyTo -> Filtro para moverse entre ubicaciones
document.body.onload = function() {
    var coords = document.getElementById('location').value.split(',');
    //Si el select es AIO muestra todo, sino muestra el seleccionado
    if (coords=="AIO") {
        map.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        map.flyTo(coords, 13);
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
    if (distr=="AIO") {
        document.getElementById('titulo').textContent='IDH distritos del '+distr;
    } else {
        document.getElementById('titulo').textContent='IDH de '+distr;
    }
    
    //Si el select es AIO muestra todo el mapa, sino muestra solo la zona seleccionada
    if (coords=="AIO") {
        map.flyTo([-9.979670961528786,-77.4041748046875], 9);
    } else {
        map.flyTo(coords, 13);
    }
});

//Leyenda AIO
var lengend = L.control({
    position: 'bottomright'
});

lengend.onAdd = function() {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML +=
        '<div class="legend">'+
        '<table>'+
            '<tbody>'+
                '<tr>'+
                    '<td><div class="square1"></div></td>'+
                    '<td><h6>Mayor Perú</h6></td>'+
                '</tr>'+
                '<tr>'+
                    '<td><div class="square2"></div></td>'+
                    '<td><h6>Entre Perú y AIO</h6></td>'+
                '</tr>'+
                '<tr>'+
                    '<td><div class="square3"></div></td>'+
                    '<td><h6>Menor AIO</h6></td>'+
                '</tr>'+
            '</tbody>'+
        '</table>'+
        '</div>';
    return div;
};

lengend.addTo(map);