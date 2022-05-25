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
            onEachFeature: function(feature, layer) {
                layer.bindPopup('<strong>Departamento: </strong>' + feature.properties.NOMBDEP.charAt(0).toUpperCase()+feature.properties.NOMBDEP.slice(1).toLowerCase()+ '</br>' + '<strong>Distrito: </strong>' + feature.properties.NOMBDIST.charAt(0).toUpperCase()+feature.properties.NOMBDIST.slice(1).toLowerCase());
            }
        }).addTo(map)
        map.fitBounds(geojsonlayer.getBounds())
    }
)

//Color por rango
function getColor(d) {
    /* return  d > 30000 ? '#FF7F7F':
            d > 10000 ? '#FAC090':
            d > 0     ? '#57CB8C':
                        '#ffffff'; */
    
    return  d == "PARARIN"              ? '#FF7F7F': //RED
            d == "LLACLLIN"             ? '#FF7F7F': //RED
            d == "MARCA"                ? '#FF7F7F': //RED
            d == "ANTONIO RAYMONDI"     ? '#FF7F7F': //RED
            d == "CAJACAY"              ? '#FF7F7F': //RED
            d == "HUAYLLACAYAN"         ? '#FF7F7F': //RED
            d == "PAMPAS CHICO"         ? '#FF7F7F': //RED
            d == "CATAC"                ? '#FF7F7F': //RED
            d == "AQUIA"                ? '#FF7F7F': //RED
            d == "HUALLANCA"            ? '#FF7F7F': //RED
            d == "LLATA"                ? '#FF7F7F': //RED
            d == "CHAVIN DE HUANTAR"    ? '#FF7F7F': //RED
            d == "PUÑOS"                ? '#FF7F7F': //RED
            d == "SAN PEDRO DE CHANA"   ? '#FF7F7F': //RED
            d == "HUACHIS"              ? '#FF7F7F': //RED
            d == "HUARMEY"              ? '#FAC090': //ORANGE
            d == "COLQUIOC"             ? '#FAC090': //ORANGE
            d == "CHIQUIAN"             ? '#FAC090': //ORANGE
            d == "SAN MARCOS"           ? '#FAC090': //ORANGE
            d == "PARAMONGA"            ? '#57CB8C': //GREEN
                                        '#ffffff';
}

//Función para mostrar los colores
function style(feature){ 
    return {
        /* fillColor: getColor(feature.properties.AREA_MINAM), */
        fillColor: getColor(feature.properties.NOMBDIST),
        weight: 2,
        opacity: 0.5,
        color: 'white',
        dashArray: '1',
        fillOpacity: 0.6
    };
}

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