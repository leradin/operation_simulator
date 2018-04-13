var map = new L.Map('map', { 
		//layers: [Bmarvel],
		crs: L.CRS.EPSG4326, 
	    center: [19.2, -96.1], 
	    zoom: 9,
	    zoomControl:true,
	    attributionControl: false,
	    attribution: 'Cesedam'
	});
//L.control.layers(baseLayersMapStage, overlaysMapStage).addTo(map);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

	/*map.dragging.disable();
	map.touchZoom.disable();
	map.doubleClickZoom.disable();
	map.scrollWheelZoom.disable();
	map.boxZoom.disable();
	map.keyboard.disable();*/
	
$('a[href="#modal_map"]').on('click',function(){
	/*setTimeout(function(){  
    	map.invalidateSize();
	}, 1000);*/

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
        url: 'http://127.0.0.1:8000/stage/'+idStage,
        dataType:'json',
        data:idStage,
        success: function( response ) {   
        	//console.log(response);
        	var group = new L.featureGroup();
            for( var i = 0; i < response.features.length; i ++){ 
        		var geoJson = L.geoJson(response.features[i]).addTo(map).bindPopup(messageFormat(response.features[i].properties,response.features[i].geometry));
        	 	geoJson.addTo(group);
        	 	//console.log(response.features[i].geometry);
            }
            setTimeout(function(){ 
            	map.fitBounds(group,{maxZoom: 6});
            	map.invalidateSize(); 
            },1000);
        }
    });
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


    

