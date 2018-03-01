//Direcciones de los servicios de mapas
var wwserver =  "http://192.168.202.10:2003/wms?";
var geoserver = "http://192.168.202.10:2000/geoserver/gwc/service/wms?";
//Inician la declaracion de capas Base
    var Bmarvel = L.tileLayer.wms(wwserver,  {
        layers: 'bmng200405',
        format: 'image/jpeg',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    
    var wwsesat = L.tileLayer.wms(wwserver, {
        layers: 'wwsesat',
        format: 'image/jpeg',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var msvea = L.tileLayer.wms(wwserver, {
        layers: 'msvea',
        format: 'image/jpeg',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
      
    var InegiO = L.tileLayer.wms(wwserver, {
        layers: 'b50',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    //Inicia la declaracion de Overlayers   
    var evismar = L.tileLayer.wms(geoserver, {
        layers: 'SM:evismar',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var waterareas = L.tileLayer.wms(geoserver, {
        layers: 'SM:waterareas',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var admin_borders = L.tileLayer.wms(geoserver, {
        layers: 'SM:admin_borders',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var buildings = L.tileLayer.wms(geoserver, {
        layers: 'SM:buildings',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var hl_roads = L.tileLayer.wms(geoserver, {
        layers: 'SM:hl_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var residential = L.tileLayer.wms(geoserver, {
        layers: 'SM:residential',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var tertiary_roads = L.tileLayer.wms(geoserver, {
        layers: 'SM:tertiary_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var railways = L.tileLayer.wms(geoserver, {
        layers: 'SM:railways',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var secondary_roads = L.tileLayer.wms(geoserver, {
        layers: 'SM:secondary_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var primary_roads = L.tileLayer.wms(geoserver, {
        layers: 'SM:primary_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var motorway = L.tileLayer.wms(geoserver, {
        layers: 'SM:motorway',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var track = L.tileLayer.wms(geoserver, {
        layers: 'SM:track',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var direction_arrows = L.tileLayer.wms(geoserver, {
        layers: 'SM:direction_arrows',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var landuse = L.tileLayer.wms(geoserver, {
        layers: 'SM:landuse',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var structure = L.tileLayer.wms(geoserver, {
        layers: 'SM:structure',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var points = L.tileLayer.wms(geoserver, {
        layers: 'SM:points',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var placenames = L.tileLayer.wms(geoserver, {
        layers: 'SM:placenames',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var airports = L.tileLayer.wms(geoserver, {
        layers: 'SM:airports',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var maneuver = L.tileLayer.wms(geoserver, {
        layers: 'SM:maneuver',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var airways = L.tileLayer.wms(geoserver, {
        layers: 'SM:airways',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var ground = L.tileLayer.wms(geoserver, {
        layers: 'SM:ground',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
  
    var aerial = L.tileLayer.wms(geoserver, {
        layers: 'SM:aerial' ,
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var maritime = L.tileLayer.wms(geoserver, {
        layers: 'SM:maritime' ,
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var terrestrial = L.tileLayer.wms(geoserver, {
        layers: 'SM:terrestrial' ,
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    // Capas para mapa venatana emergente
     var Bmarvel2 = L.tileLayer.wms(wwserver,  {
        layers: 'bmng200405',
        format: 'image/jpeg',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    
    var wwsesat2 = L.tileLayer.wms(wwserver, {
        layers: 'wwsesat',
        format: 'image/jpeg',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var msvea2 = L.tileLayer.wms(wwserver, {
        layers: 'msvea',
        format: 'image/jpeg',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
      
    var InegiO2 = L.tileLayer.wms(wwserver, {
        layers: 'b50',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    //Inicia la declaracion de Overlayers   
    var evismar2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:evismar',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var waterareas2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:waterareas',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var admin_borders2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:admin_borders',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var buildings2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:buildings',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var hl_roads2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:hl_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var residential2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:residential',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var tertiary_roads2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:tertiary_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var railways2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:railways',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var secondary_roads2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:secondary_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var primary_roads2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:primary_roads',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var motorway2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:motorway',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var track2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:track',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var direction_arrows2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:direction_arrows',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var landuse2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:landuse',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var structure2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:structure',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var points2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:points',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var placenames2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:placenames',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var airports2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:airports',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var maneuver2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:maneuver',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var airways2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:airways',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var ground2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:ground',
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
  
    var aerial2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:aerial' ,
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var maritime2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:maritime' ,
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });
    var terrestrial2 = L.tileLayer.wms(geoserver, {
        layers: 'SM:terrestrial' ,
        format: 'image/png',
        transparent: true,
        version: '1.1',
        attribution: "OSM,MKZ"
    });

    var baseLayersMapStage = {
      "Blue Marvel": Bmarvel,
      "Landsat i 7": wwsesat,
      "MS Virtual Earth": msvea,
      "Inegi Ortofotos": InegiO     
    };
  
    var overlaysMapStage = {
      "Evismar": evismar,
      "Agua": waterareas,
      "Fronteras": admin_borders,
      "Edifcios": buildings,
      "Carreteras": hl_roads,
      "Patios de maniobra": maneuver,
      "Calles de Colonias": residential,
      "Caminos de tercer orden": tertiary_roads,
      "Vias de tren": railways,
      "Caminos secundarios": secondary_roads,
      "Caminos primarios": primary_roads,
      "Caminos en general": motorway,
      "Caminos peatonales": track,
      "Sentido de las calles": direction_arrows,
      "Uso de Suelo": landuse,
      "Estructuras": structure,
      "Puntos de interes": points,
      "Aeropuertos": airports,
      "Aerovias": airways,            
      "Nombres de lugares": placenames,
      "Datos Aereos": aerial,
      "Datos Maritimos": maritime,
      "Datos Terrestres": terrestrial,
      "Datos de Terreno": ground
      };

      var baseLayersMapModal = {
        "Blue Marvel": Bmarvel2,
        "Landsat i 7": wwsesat2,
        "MS Virtual Earth": msvea2,
        "Inegi Ortofotos": InegiO2     
      };

      var overlaysMapModal = {
      "Evismar": evismar2,
      "Agua": waterareas2,
      "Fronteras": admin_borders2,
      "Edifcios": buildings2,
      "Carreteras": hl_roads2,
      "Patios de maniobra": maneuver2,
      "Calles de Colonias": residential2,
      "Caminos de tercer orden": tertiary_roads2,
      "Vias de tren": railways2,
      "Caminos secundarios": secondary_roads2,
      "Caminos primarios": primary_roads2,
      "Caminos en general": motorway2,
      "Caminos peatonales": track2,
      "Sentido de las calles": direction_arrows2,
      "Uso de Suelo": landuse2,
      "Estructuras": structure2,
      "Puntos de interes": points2,
      "Aeropuertos": airports2,
      "Aerovias": airways2,            
      "Nombres de lugares": placenames2,
      "Datos Aereos": aerial2,
      "Datos Maritimos": maritime2,
      "Datos Terrestres": terrestrial2,
      "Datos de Terreno": ground2
      };
    
var mapStage = new L.Map('mapStage', 
    { layers: [Bmarvel],
      crs: L.CRS.EPSG4326, 
      center: [19.2, -96.1], 
      zoom: 6,
      attribution: 'Cesedam'
    });
L.control.layers(baseLayersMapStage, overlaysMapStage).addTo(mapStage);

// Select area map
var areaSelect = L.areaSelect({width:200, height:250});
areaSelect.on("change", function() {
  boundsMapStage = this.getBounds();
  $("#southwest").val(boundsMapStage.getSouthWest().lat + ", " + boundsMapStage.getSouthWest().lng);
  $("#northeast").val(boundsMapStage.getNorthEast().lat + ", " + boundsMapStage.getNorthEast().lng);
  //$("#southwestP").val(dec2gms(boundsMapStage.getSouthWest().lat,1).valor + ", " + dec2gms(boundsMapStage.getSouthWest().lng,0).valor);
  //$("#northeastP").val(dec2gms(boundsMapStage.getNorthEast().lat,1).valor + ", " + dec2gms(boundsMapStage.getNorthEast().lng,0).valor);
});
areaSelect.addTo(mapStage);

var mapModalStage = L.map('dvMdlMapStage',
{layers: [Bmarvel2],
  crs: L.CRS.EPSG4326,
  center: [19.2, -96.1],
  zoom: 6
});

L.control.layers(baseLayersMapModal, overlaysMapModal).addTo(mapModalStage);

var popupMapModalStage = L.popup();
mapModalStage.on('click', onMapModalClickStage);

function onMapModalClickStage(e) {
    popupMapModalStage
        .setLatLng(e.latlng)
        .setContent(e.latlng.toString())
        .openOn(mapModalStage);
    $('#init_position').val(e.latlng.lat+","+e.latlng.lng);
    $('#init_position_').val(dec2gms(e.latlng.lat,1).valor+" , "+dec2gms(e.latlng.lng,2).valor);
}

mapModalStage.dragging.disable();
mapModalStage.touchZoom.disable();
mapModalStage.doubleClickZoom.disable();
mapModalStage.scrollWheelZoom.disable();

setTimeout(function(){  
    mapStage.invalidateSize();
    mapModalStage.invalidateSize();
}, 3000);

var form = $('#form_modal_stage');
let isCreate = false;

form.validationEngine('attach', {
    promptPosition : "centerRight", 
    scroll: false,
    ajaxFormValidation: true,
    onBeforeAjaxFormValidation: beforeCall
});

function beforeCall(){
    isCreate = true;
    $('#div_for_inputs').append('<input type=hidden name='+itemLast.key+' id='+itemLast.key+' value='+form.serialize()+' />');
    $("#fModal").modal('hide');
    
}

$('#button_config').on('click',function(){
    form.submit();
});

$('.modal').on('hidden.bs.modal',function(){
    if(!isCreate){
        $('#ms_stage').multiSelect('deselect', itemLast.key);
    }
    form[0].reset();
});

$('.modal').on('shown.bs.modal',function(){
    isCreate = false;
    mapModalStage.invalidateSize(); 
    var group = L.latLngBounds([[$("#northeast").val().split(",")[0], $("#northeast").val().split(",")[1]], [$("#southwest").val().split(",")[0], $("#southwest").val().split(",")[1]]]);
    mapModalStage.fitBounds(group);
    mapModalStage.setZoom(9);
});




/**
*Devuelve los datos 
*Course
*Speed
*Altitud
*Init Position
*/
function buildSerialize(){
    return $('#course').val()+','+$('#speed').val()+','+$('#altitude').val();
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