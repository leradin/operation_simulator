    
var mapStage = new L.Map('mapStage', 
    { layers: [Bmarvel],
      crs: L.CRS.EPSG4326, 
      center: [19.2, -96.1], 
      zoom: 6,
      attribution: 'Cesedam',
      attributionControl: false,
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
  zoom: 6,
  attributionControl: false,
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
    latLng = e.latlng;
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
var latLng = null;
var cabinConfigurationTemp = {};
var unitsSelectedsArray = [];
var computers = [];
var LIGHTS = ['LUZ DE DIA','LUZ DE BATALLA','SIN LUCES'];


form.validationEngine('attach', {
    promptPosition : "centerRight", 
    scroll: false,
    ajaxFormValidation: true,
    onBeforeAjaxFormValidation: beforeCall
});

function beforeCall(){
    isCreate = true;
    $('#div_for_inputs').append('<input type=hidden name='+itemLast.key+' id='+itemLast.key+' value='+form.serialize()+'&computers='+computers+'&unit_id='+cabinConfigurationTemp.unitId+' />');
    $("#fModal").modal('hide');
}

$('#button_config').on('click',function(){
    var computersTemp = [];   
    $.each($("button[name*='computers']"),function(index,button){
        if($(button).hasClass("active")){
            computers.push($(button).val());
            console.log(button.textContent);
            computersTemp.push(button.textContent); 
        }
    });

    try {
        cabinConfigurationTemp.cabinId = itemLast.key;
        cabinConfigurationTemp.cabinValue = itemLast.value;
        cabinConfigurationTemp.unitId = $('#unit_ids option:selected').val();
        cabinConfigurationTemp.unitName = $('#unit_ids option:selected').text();
        cabinConfigurationTemp.course = $('#course').val();
        cabinConfigurationTemp.speed = $('#speed').val();
        cabinConfigurationTemp.altitud = $('#altitude').val();
        cabinConfigurationTemp.lights = LIGHTS[$('input[name*=type_lights').val()];
        cabinConfigurationTemp.latLng = latLng;
        cabinConfigurationTemp.computers = computersTemp;

        var marker = new L.Marker(latLng, {draggable:false});
        mapStage.addLayer(marker);
        marker.bindPopup(messageFormat(cabinConfigurationTemp)).openPopup();

        cabinConfigurationTemp.marker = marker;

        $("#unit_ids option:selected").remove();

        var unit = {};
        unit.cabinId = itemLast.key;
        unit.cabinName = itemLast.value;
        unit.unitId = cabinConfigurationTemp.unitId;
        unit.unitName = cabinConfigurationTemp.unitName;
        unit.course = cabinConfigurationTemp.course;
        unit.speed = cabinConfigurationTemp.speed;
        unit.altitud = cabinConfigurationTemp.altitud;
        unit.latLng = cabinConfigurationTemp.latLng;
        unit.marker = marker;
        unitsSelectedsArray.push(unit);
    }catch(err) {
    }
    form.submit();
});

$('.modal').on('hidden.bs.modal',function(){
    if(!isCreate){
        $('#ms_stage').multiSelect('deselect', itemLast.key);
    }
    form[0].reset();
});

$('.modal').on('show.bs.modal',function(){
    isCreate = false;
    computers = [];
   
    var group = L.latLngBounds([[$("#northeast").val().split(",")[0], $("#northeast").val().split(",")[1]], [$("#southwest").val().split(",")[0], $("#southwest").val().split(",")[1]]]);
    mapModalStage.fitBounds(group);
    mapModalStage.setZoom(6);
    setTimeout(function(){  
        mapModalStage.invalidateSize();
    }, 1000); 
    //mapModalStage.setZoom(9);
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



/**
* Get computers and devices
*
*/
function getComputers(cabinId){
    $.ajax({
        type    : "GET",
        url     : "http://127.0.0.1:8000/catalog/cabin/"+cabinId,
        dataType: "json",
        data    : { id:cabinId },
        success : function(response) {
            $.each(response.computers,function(index,computer){
                var button = $("<button name='computers[]' id='computers' value="+computer.id+" class='btn btn-default active' title='Dirección IP :"+computer.ip_address+"\n Etiqueta : "+computer.label_arduino+"'><span class='icosg-screen'></span> "+computer.name+"</button>");
                $('#container_computers').append(button);
            });
        },
        error: function(e) {
            console.log(e.responseText);
        },
        beforeSend(jqXHR,settings){
            $('#container_computers').empty();
        }
    });
}

/**
*Devuelve los datos
*formateados
*/
function messageFormat(cabinConfigurationTemp){
    var message = "<b><center>"+cabinConfigurationTemp.cabinValue+"</center></b><br />"+
           "Unidad : <b>"+cabinConfigurationTemp.unitName+"</b><br />"+
           "Posición : <b>"+cabinConfigurationTemp.latLng+"</b><br />"+
           "Velocidad : <b>"+cabinConfigurationTemp.speed+unitMeasurement(cabinConfigurationTemp.unitName)+
           "</b> | Rumbo :  <b>"+cabinConfigurationTemp.course+"º</b><br />"+
           "Luces : <b>"+cabinConfigurationTemp.lights+"</b><br /><br />"+
           "<b><center>COMPUTADORAS</center></b><br />";
           var computer = "";
           $.each(cabinConfigurationTemp.computers,function(index,computerName){
                computer+= "<b>"+(index+1)+".-"+computerName+"</b><br />";
           });
    return message+computer;
}


/**
*Devuelve las unidad de medida en texto
*
*/
function unitMeasurement(unit){
    var numeral = unit.split("(");
    numeral = numeral[1].split("_");
    switch (numeral[0]) {
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