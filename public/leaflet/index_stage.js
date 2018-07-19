/* Constants */
const attribution = ' INIDETAM-SEMAR | CONACYT ';

var map =  new L.map('map',
{ //layers: [Bmarvel2],
  //crs: L.CRS.EPSG4326,
  //crs: L.CRS.EPSG3857,
  //center: [19.2, -96.1],
  //attributionControl: false,
    layers: [
        new L.TileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                attribution: attribution
            }
        )
    ],
    center: new L.LatLng(19.2, -96.1), 
    zoom: 5
});
//L.control.layers(baseLayersMapStage, overlaysMapStage).addTo(map);
//L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

var trackIcon = L.icon({
    iconUrl: '/leaflet/dist/images/marker_track.png',
    iconSize:     [36, 36], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
	/*map.dragging.disable();
	map.touchZoom.disable();
	map.doubleClickZoom.disable();
	map.scrollWheelZoom.disable();
	map.boxZoom.disable();
	map.keyboard.disable();*/
	
$('a[href="#modal_map"]').live('click',function(){
	setTimeout(function(){  
    	map.invalidateSize();
	}, 2000);

});
var LIGHTS = ['LUZ DE DIA','LUZ DE BATALLA','SIN LUCES'];

$('#table tbody tr ').on('click',function(){
	var position = table.fnGetPosition(this);
    var data = table.fnGetData(position);
    getCabinByStage(data[0]);
    $('#title_modal').text(data[1]);
});


function getCabinByStage(idStage){
	clearMap();
	$.ajax({
        type: 'GET',
        url: appUrl+'/stage/'+idStage,
        dataType:'json',
        data:idStage,
        success: function(response) {   
            drawOnMap(response.units,function(){
                drawOnMap(response.tracks,function(group){
                    drawOnMap(response.meteorologicalPhenomenons,function(){
                        setTimeout(function(){ 
                            map.fitBounds(group,{maxZoom: 6});
                            map.invalidateSize(); 
                        },3000);
                    });
                });
            });
        }
    });
}

function drawOnMap(objects,callback){
    var group = new L.featureGroup();
    for( var i = 0; i < objects.features.length; i ++){ 
        var type = objects.features[i].properties.type;
        var popupMessage = (type == 0) ? messageFormat(objects.features[i].properties,objects.features[i].geometry) : (type == 1) ? messageFormatTrack(objects.features[i].properties,objects.features[i].geometry) : messageFormatMeteorologicalPhenomenon(objects.features[i].properties,objects.features[i].geometry); 
        var geoJson = L.geoJson(objects.features[i],{
            style: function (feature) {
                return {color: feature.properties.color};
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup(feature.properties.name);
            },
            pointToLayer: function (feature, latlng) {
                if(feature.properties.type == 2){
                    return L.circleMarker(latlng,feature.properties.radius);
                }
                if(feature.properties.type == 1){
                    return L.marker(latlng,{draggable:false, icon: trackIcon });
                }

                if(feature.properties.type == 0){
                    return L.marker(latlng);
                }
            }
        })
        .addTo(map)
        .bindPopup(popupMessage);
        geoJson.addTo(group);
    }
    callback(group);
}



function clearMap(){
	map.eachLayer(function (layer) {
    	if(!layer.hasOwnProperty("_url")){
			map.removeLayer(layer);
    	}
	});
}

/**
*Devuelve los datos
*formateados
*/
function messageFormat(cabin,geometry){
    var message = "<b><center>"+cabin.name+"</center></b><br />"+
           "Unidad : <b>"+cabin.unitName.name+"</b><br />"+
           "Posición : <b>"+dec2gms(geometry.coordinates[1],2).valor+" , "+dec2gms(geometry.coordinates[0],2).valor+"</b><br />"+
           "Velocidad : <b>"+cabin.speed+unitMeasurement(cabin.unitName.numeral)+
           "</b> | Rumbo :  <b>"+cabin.course+"º</b><br />"+
           "Luces : <b>"+LIGHTS[cabin.lights]+"</b><br /><br />"+
           "<b><center>COMPUTADORAS</center></b><br />";
           var computer = "";
           $.each(cabin.computers,function(index,computerName){
                computer+= "<b>"+(index+1)+".-"+computerName.name+"</b><br />";
           });
    return message+computer;
}

function messageFormatTrack(track,geometry){
    var message = "<b><center>"+track.name+"</center></b><br />"+
           "Posición : <b>"+dec2gms(geometry.coordinates[1],2).valor+" , "+dec2gms(geometry.coordinates[0],2).valor+"</b><br />"+
           "Velocidad : <b>"+track.speed+
           "</b> | Rumbo :  <b>"+track.course+"º</b><br />";
    return message;
}

function messageFormatMeteorologicalPhenomenon(meteorologicalPhenomenon,geometry){
    var message = "<b><center>"+meteorologicalPhenomenon.name+"</center></b><br />"+
           "Posición : <b>"+dec2gms(geometry.coordinates[1],2).valor+" , "+dec2gms(geometry.coordinates[0],2).valor+"</b><br />"+
           "Radio : <b>"+meteorologicalPhenomenon.radius+" m</b><br />";
    return message;
}

/**
*Devuelve las unidad de medida en texto
*
*/
function unitMeasurement(numeral){
    switch (numeral) {
        case 'ANX':
            return " km/h";
            break;

        case 'IM':
            return " km/h";
            break;

        case 'VEH':
            return " km/h";
            break;

        default:
            return " kn/h"
    }
}

/**
* Convierte una coordenada en formato decimal a su correspondiente
* versión en formato grados-minutos-segundos.
*
* @param  Float   Valor real de la coordenada.
* @param  Int Tipo de la coordenada {Coordenada.LATITUD, Coordenada.LONGITUD}.
* @return Array   ['grados', 'minutos', 'segundos', 'direccion', 'valor'].
*/

function dec2gms(valor, tipo){
    grados    = Math.abs(parseInt(valor));
    minutos   = (Math.abs(valor) - grados) * 60;
    segundos  = minutos;
    minutos   = Math.abs(parseInt(minutos));
    segundos  = Math.round((segundos - minutos) * 60 * 1000000) / 1000000;
    signo     = (valor < 0) ? -1 : 1;   direccion = (tipo == 1) ?
                      ((signo > 0) ? 'N' : 'S') :
                ((signo > 0) ? 'E' : 'W');

    if(isNaN(direccion))
      grados = grados * signo;

    return {
        'grados'   : grados,
        'minutos'  : minutos,
        'segundos' : segundos,
        'direccion': direccion,
        'valor'    : grados + "\u00b0 " + minutos + "' "+ segundos +"' " + ((isNaN(direccion)) ? (' ' + direccion) : '')
    };
}


    

