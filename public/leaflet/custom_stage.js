/* Main map */
var mapStage = new L.Map('mapStage', {
    layers: [Bmarvel],
    crs: L.CRS.EPSG4326, 
    center: new L.LatLng(19.2, -96.1), 
    zoom: 5 
});

//Layers main map
L.control.layers(baseLayersMapStage, overlaysMapStage).addTo(mapStage);              

// Select area main map
var areaSelect = L.areaSelect({width:200, height:250});
areaSelect.on("change", function() {
  boundsMapStage = this.getBounds();
  $("#southwest").val(boundsMapStage.getSouthWest().lat + ", " + boundsMapStage.getSouthWest().lng);
  $("#northeast").val(boundsMapStage.getNorthEast().lat + ", " + boundsMapStage.getNorthEast().lng);
});
//Add select area to main map
areaSelect.addTo(mapStage);
/*** End main map ****/

/* Cabin map */
var mapModalStage = new L.map('dvMdlMapStage',
{   layers: [Bmarvel2],
    crs: L.CRS.EPSG4326, 
    center: new L.LatLng(19.2, -96.1), 
    zoom: 5
});

//Layers cabin map
L.control.layers(baseLayersMapModal, overlaysMapModal).addTo(mapModalStage);              

// popup cabin map
var popupMapModalStage = L.popup();
mapModalStage.on('click', onMapModalClickStage);

// Onclick on cabin map
function onMapModalClickStage(e) {
    popupMapModalStage
        .setLatLng(e.latlng)
        .setContent(e.latlng.toString())
        .openOn(mapModalStage);
        console.log(e.latlng.lat+","+e.latlng.lng);
        console.log(dec2gms(e.latlng.lat,1).valor+" , "+dec2gms(e.latlng.lng,2).valor);
    $('#init_position').val(e.latlng.lat+","+e.latlng.lng);
    $('#init_position_').val(dec2gms(e.latlng.lat,1).valor+" , "+dec2gms(e.latlng.lng,2).valor);
    latLng = e.latlng;
    if(markerCabin != null){
        mapModalStage.removeLayer(markerCabin);
        mapModalStage.invalidateSize();
    }
    markerCabin = L.marker(e.latlng).addTo(mapModalStage);
    mapModalStage.invalidateSize();
}

// format coordinates on keyup input
$("#init_position,#init_position_track,#init_position_meterological_phenomenon").on("keyup",function(){
    var id = $(this).attr('id');
    console.log(id);
    switch(id){
        case 'init_position':
            $("#init_position_").val(dec2gms($(this).val().split(",")[0],1).valor+" , "+dec2gms($(this).val().split(",")[1],2).valor);
        break;

        case 'init_position_track':
            $("#init_position_track_").val(dec2gms($(this).val().split(",")[0],1).valor+" , "+dec2gms($(this).val().split(",")[1],2).valor);
        break;

        case 'init_position_meterological_phenomenon':
            $("#init_position_meterological_phenomenon_").val(dec2gms($(this).val().split(",")[0],1).valor+" , "+dec2gms($(this).val().split(",")[1],2).valor);
        break;
    }
});


$(".geopoint").live("change",function(){
    buildCoordinate(); 
});

var markerCabin = null;
var markerTrack = null;
function buildCoordinate(){
    if(markerCabin != null){
        mapModalStage.removeLayer(markerCabin);
    }
    var gradePhi = $('#grade-phi').val();
    var minutePhi = $('#minute-phi').val();
    var secondPhi = $('#second-phi').val();
    var orientationPhi = $('#orientation-phi').val();
    var latitude = /*(orientationPhi == "s" ? "-":"")+*/gradePhi+"° "+minutePhi+"' "+secondPhi+"\" "+orientationPhi;

    var gradeLambda = $('#grade-lambda').val();
    var minuteLambda = $('#minute-lambda').val();
    var secondLambda = $('#second-lambda').val();
    var orientationLambda = $('#orientation-lambda').val();
    var longitude = /*(orientationLambda == "w" ? "-":"")+*/gradeLambda+"° "+minuteLambda+"' "+secondLambda+"\" "+orientationLambda;
    var point = new GeoPoint(longitude, latitude);
    
    var latlng;
    if($('#format_coordinates').val() == 2){
        $('#init_position').val(convertDMSToDD(latitude)+","+convertDMSToDD(longitude));//(point.getLatDec()+","+point.getLonDec());
        $('#init_position_').val(
            dec2gms(convertDMSToDD(latitude),1).valor+" , "+
            dec2gms(convertDMSToDD(longitude),2).valor
        );
        latlng = L.latLng(convertDMSToDD(latitude),convertDMSToDD(longitude));
    }else if($('#format_coordinates').val() == 0){

        $('#init_position').val(($('#orientation-phi2').val() == "s" ? "-":"")+$('#grade-phi2').val()+","+($('#orientation-lambda2').val() == "w" ? "-":"")+$('#grade-lambda2').val());//(point.getLatDec()+","+point.getLonDec());
        $('#init_position_').val(
            dec2gms((($('#orientation-phi2').val() == "s" ? "-":"")+$('#grade-phi2').val()),1).valor+" , "+
            dec2gms(($('#orientation-lambda2').val() == "w" ? "-":"")+$('#grade-lambda2').val(),2).valor
        );
        latlng = L.latLng(($('#orientation-phi2').val() == "s" ? "-":"")+$('#grade-phi2').val(),($('#orientation-lambda2').val() == "w" ? "-":"")+$('#grade-lambda2').val());
    }else if($('#format_coordinates').val() == 1){ // ddm
        var latitude = $('#grade-phi3').val()+"° "+$('#minute-phi3').val()+"' "+$('#orientation-phi3').val();
        var longitude = $('#grade-lambda3').val()+"° "+$('#minute-lambda3').val()+"' "+$('#orientation-lambda3').val();
        $('#init_position').val(convertDDMToDD(latitude)+","+convertDDMToDD(longitude));//(point.getLatDec()+","+point.getLonDec());
        $('#init_position_').val(
            dec2gms(convertDDMToDD(latitude),1).valor+" , "+
            dec2gms(convertDDMToDD(longitude),2).valor
        );
        latlng = L.latLng(convertDDMToDD(latitude),convertDDMToDD(longitude));
    }
    markerCabin = L.marker(latlng).addTo(mapModalStage);
    
}


/*mapModalStage.dragging.disable();
mapModalStage.touchZoom.disable();
mapModalStage.doubleClickZoom.disable();
mapModalStage.scrollWheelZoom.disable();*/

/* Map Track */
var mapModalTracks = new L.Map('map-tracks', {
    layers: [Bmarvel3],
    crs: L.CRS.EPSG4326, 
    center: new L.LatLng(19.2, -96.1), 
    zoom: 5 
});

L.control.layers(baseLayersMapModal2, overlaysMapModal2).addTo(mapModalTracks);
//L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mapModalTracks);

var popupMapModalTrack = L.popup();
mapModalTracks.on('click', onMapModalClickTrack);

function onMapModalClickTrack(e) {
    popupMapModalTrack
        .setLatLng(e.latlng)
        .setContent(e.latlng.toString())
        .openOn(mapModalTracks);
    $('#init_position_track').val(e.latlng.lat+","+e.latlng.lng);
    $('#init_position_track_').val(dec2gms(e.latlng.lat,1).valor+" , "+dec2gms(e.latlng.lng,2).valor);
    latLng = e.latlng;
    if(markerTrack != null){
        mapModalTracks.removeLayer(markerTrack);
        mapModalTracks.invalidateSize();
    }
    markerTrack = L.marker(e.latlng).addTo(mapModalTracks);
    mapModalTracks.invalidateSize();
}

$(".geopoint_track").on("change",function(){
    buildCoordinateTrack();  
});
function buildCoordinateTrack(){
    if(markerTrack != null){
        mapModalTracks.removeLayer(markerTrack);
    }
    var gradePhi = $('#grade-phi_track').val();
    var minutePhi = $('#minute-phi_track').val();
    var secondPhi = $('#second-phi_track').val();
    var orientationPhi = $('#orientation-phi_track').val();
    var latitude = /*(orientationPhi == "s" ? "-":"")+*/gradePhi+"° "+minutePhi+"' "+secondPhi+"\" "+orientationPhi;

    var gradeLambda = $('#grade-lambda_track').val();
    var minuteLambda = $('#minute-lambda_track').val();
    var secondLambda = $('#second-lambda_track').val();
    var orientationLambda = $('#orientation-lambda_track').val();
    var longitude = /*(orientationLambda == "w" ? "-":"")+*/gradeLambda+"° "+minuteLambda+"' "+secondLambda+"\" "+orientationLambda;
    var point = new GeoPoint(longitude, latitude);
    
 
    var latlng;
    if($('#format_coordinates_track').val() == 2){
        $('#init_position_track').val(convertDMSToDD(latitude)+","+convertDMSToDD(longitude));//(point.getLatDec()+","+point.getLonDec());
        $('#init_position_track_').val(
            dec2gms(convertDMSToDD(latitude),1).valor+" , "+
            dec2gms(convertDMSToDD(longitude),2).valor
        );
        latlng = L.latLng(convertDMSToDD(latitude),convertDMSToDD(longitude));
    }else if($('#format_coordinates_track').val() == 0){
        $('#init_position_track').val(($('#orientation-phi2_track').val() == "s" ? "-":"")+$('#grade-phi2_track').val()+","+($('#orientation-lambda2_track').val() == "w" ? "-":"")+$('#grade-lambda2_track').val());//(point.getLatDec()+","+point.getLonDec());
        $('#init_position_track_').val(
            dec2gms((($('#orientation-phi2_track').val() == "s" ? "-":"")+$('#grade-phi2_track').val()),1).valor+" , "+
            dec2gms(($('#orientation-lambda2_track').val() == "w" ? "-":"")+$('#grade-lambda2_track').val(),2).valor
        );
        latlng = L.latLng(($('#orientation-phi2_track').val() == "s" ? "-":"")+$('#grade-phi2_track').val(),($('#orientation-lambda2_track').val() == "w" ? "-":"")+$('#grade-lambda2_track').val());
    }else if($('#format_coordinates_track').val() == 1){ // ddm
        var latitude = $('#grade-phi3_track').val()+"° "+$('#minute-phi3_track').val()+"' "+$('#orientation-phi3_track').val();
        var longitude = $('#grade-lambda3_track').val()+"° "+$('#minute-lambda3_track').val()+"' "+$('#orientation-lambda3_track').val();
        $('#init_position_track').val(convertDDMToDD(latitude)+","+convertDDMToDD(longitude));//(point.getLatDec()+","+point.getLonDec());
        $('#init_position_track_').val(
            dec2gms(convertDDMToDD(latitude),1).valor+" , "+
            dec2gms(convertDDMToDD(longitude),2).valor
        );
        latlng = L.latLng(convertDDMToDD(latitude),convertDDMToDD(longitude));
    }
    console.log(markerTrack);
    markerTrack = L.marker(latlng).addTo(mapModalTracks);
    
}


/*mapModalTracks.dragging.disable();
mapModalTracks.touchZoom.disable();
mapModalTracks.doubleClickZoom.disable();
mapModalTracks.scrollWheelZoom.disable();*/

/* Map Meterological Phenomenon */
var mapModalMeterologicalPhenomenon = L.map('map-meterological-phenomenon',
{ layers: [Bmarvel4],
  crs: L.CRS.EPSG4326,
  center: [19.2, -96.1],
  zoom: 6,
  attributionControl: false,
});

L.control.layers(baseLayersMapModal3, overlaysMapModal3).addTo(mapModalMeterologicalPhenomenon);
//L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(mapModalMeterologicalPhenomenon);


var popupMapModalMeterologicalPhenomenon = L.popup();
mapModalMeterologicalPhenomenon.on('click', onMapModalClickMeterologicalPhenomenon);

function onMapModalClickMeterologicalPhenomenon(e) {
    popupMapModalMeterologicalPhenomenon
        .setLatLng(e.latlng)
        .setContent(e.latlng.toString())
        .openOn(mapModalMeterologicalPhenomenon);
    $('#init_position_meterological_phenomenon').val(e.latlng.lat+","+e.latlng.lng);
    $('#init_position_meterological_phenomenon_').val(dec2gms(e.latlng.lat,1).valor+" , "+dec2gms(e.latlng.lng,2).valor);
    latLng = e.latlng;
}

//$('input[type=radio][name=format_coordinates]').change(function() {
$('#format_coordinates').change(function() {
    if($(this).val() == 0){
        $('#dd').show();
        $('#ddm').hide();
        $('#dms').hide();
    }
    if($(this).val() == 1){
        $('#dd').hide();
        $('#ddm').show();
        $('#dms').hide();
    }
    if($(this).val() == 2){
        $('#dd').hide();
        $('#ddm').hide();
        $('#dms').show();
    }
});
$('#format_coordinates_track').change(function() {
    if($(this).val() == 0){
        $('#dd_track').show();
        $('#ddm_track').hide();
        $('#dms_track').hide();
    }
    if($(this).val() == 1){
        $('#dd_track').hide();
        $('#ddm_track').show();
        $('#dms_track').hide();
    }
    if($(this).val() == 2){
        $('#dd_track').hide();
        $('#ddm_track').hide();
        $('#dms_track').show();
    }
});

$('.btn-success').live('click',function(){
    $(this).removeClass('btn-success').addClass('btn-danger');
});

$('.btn-danger').live('click',function(){
    $(this).removeClass('btn-danger').addClass('btn-success');
});
$('#dd,#ddm,#dms').hide();
//$('#ddm').hide();
//$('#dms').hide();
$('#dms_track,#dds_track,#dd_track').hide();
//$('#dds_track').hide();
//$('#dd_track').hide();
/*mapModalMeterologicalPhenomenon.dragging.disable();
mapModalMeterologicalPhenomenon.touchZoom.disable();
mapModalMeterologicalPhenomenon.doubleClickZoom.disable();
mapModalMeterologicalPhenomenon.scrollWheelZoom.disable();*/

setTimeout(function(){  
    mapStage.invalidateSize();
    mapModalStage.invalidateSize();
    mapModalTracks.invalidateSize();
    mapModalMeterologicalPhenomenon.invalidateSize();
}, 3000);

var form = $('#form_modal_stage');
var formTrack = $('#form_modal_track');
var formMeterologicalPhenomenon = $('#form_modal_meterological_phenomenon');
let isCreate = false;
var latLng = null;
var cabinConfigurationTemp = {};
var temp = {};
var unitsSelectedsArray = [];
var tracksSelectedsArray = [];
var computers = [];
var LIGHTS = ['LUZ DE DIA','LUZ DE BATALLA','SIN LUCES'];
var isMeterologicalPhenomenon  = false;
var isConfigureCabin = true;


form.validationEngine('attach', {
    promptPosition : "centerRight", 
    scroll: false,
    ajaxFormValidation: true,
    onBeforeAjaxFormValidation: beforeCall
});

formTrack.validationEngine('attach', {
    promptPosition : "centerRight", 
    scroll: false,
    ajaxFormValidation: true,
    onBeforeAjaxFormValidation: beforeCallTrack
});

formMeterologicalPhenomenon.validationEngine('attach', {
    promptPosition : "centerRight", 
    scroll: false,
    ajaxFormValidation: true,
    onBeforeAjaxFormValidation: beforeCallMeterologicalPhenomenon
});

function beforeCall(){
    isCreate = true;
    $('#div_for_inputs').append('<input type=hidden name='+itemLast.key+' id='+itemLast.key+' value='+form.serialize()+'&computers='+computers+'&unit_id='+cabinConfigurationTemp.unitId+' />');
    $("#fModal").modal('hide');
    document.getElementById("form_modal_stage").reset();
    latLng = null;

}

function beforeCallTrack(){
    isCreate = true;
    $('#div_for_inputs').append('<input type=hidden name=t'+itemTrackLast.key+' id=t'+itemTrackLast.key+' value='+formTrack.serialize()+'&type='+temp.typeId+' />');
    $("#tModal").modal('hide');
    document.getElementById("form_modal_track").reset();
    latLng = null;
}

function beforeCallMeterologicalPhenomenon(){
    createMeteorologicalPhenomenon($('#init_position_meterological_phenomenon').val(),$('#radio').val());
    $('#div_for_inputs').append('<input type=hidden name=meterological_phenomenon id=meterological_phenomenon value='+formMeterologicalPhenomenon.serialize()+' />');
    $("#mModal").modal('hide');
}

function createMeteorologicalPhenomenon(coordinate,radius){
    var latlng = L.latLng(coordinate.split(",")[0],coordinate.split(",")[1]);
    var circle = L.circle(latlng,(radius*1000)).bindPopup("Fenomeno Meterologico con radio de "+radius+" KM").addTo(mapStage);
}

$('#button_config').on('click',function(){
    var computersTemp = [];   
    $.each($("button[name*='computers']"),function(index,button){
        if($(button).hasClass("active")){
            computers.push($(button).val());
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
        cabinConfigurationTemp.lights = LIGHTS[$('input[name=type_lights]:checked').val()];
        cabinConfigurationTemp.latLng = (latLng) ? latLng : $('#init_position_').val();
        cabinConfigurationTemp.computers = computersTemp;
        latLng = (latLng) ? latLng : $('#init_position').val();
        var marker = null;
        console.log(latLng);
        console.log(typeof latLng === 'object');
        if(typeof latLng === 'object'){
            marker = new L.Marker(latLng,{draggable:false});
        }else{
            marker = new L.Marker(L.latLng(latLng.split(",")[0],latLng.split(",")[1]), {draggable:false});
        }
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
        console.log(err);
    }
    form.submit();
});

$('#button_config_track').on('click',function(){
    try {
        temp.trackId = itemTrackLast.key;
        temp.trackValue = itemTrackLast.value;
        temp.typeId = $('#types option:selected').val();
        temp.typeName = $('#types option:selected').text();
        temp.course = $('#course').val();
        temp.speed = $('#speed').val();
        temp.altitud = $('#altitude').val();
        temp.latLng = (latLng) ? latLng : $('#init_position_track_').val();

        var greenIcon = L.icon({
            iconUrl: '/leaflet/dist/images/marker_track.png',
            iconSize:     [36, 36], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        latLng = (latLng) ? latLng : $('#init_position_track').val();
        var marker = null;
        console.log(latLng);
        console.log(typeof latLng === 'object');
        if(typeof latLng === 'object'){
            marker = new L.Marker(latLng,{draggable:false,icon: greenIcon});
        }else{
            marker = new L.Marker(L.latLng(latLng.split(",")[0],latLng.split(",")[1]), {draggable:false,icon: greenIcon});
        }
        //mapStage.addLayer(marker);
        //marker.bindPopup(messageFormat(cabinConfigurationTemp)).openPopup();


        //var marker = new L.Marker(latLng, {draggable:false, icon: greenIcon });
        mapStage.addLayer(marker);
        marker.bindPopup(messageFormatTrack(temp)).openPopup();

        temp.marker = marker;

        $('#types').find('option:first').attr('selected', 'selected').parent('select');

        var track = {};
        track.trackId = itemTrackLast.key;
        track.trackName = itemTrackLast.value;
        track.course = temp.course;
        track.speed = temp.speed;
        track.altitud = temp.altitud;
        track.latLng = temp.latLng;
        track.marker = marker;
        tracksSelectedsArray.push(track);
    }catch(err){

    }
    formTrack.submit();
});

$('#ms_track').live('change', function() {
    var selected = $(this).find('option:selected', this);
    var results = [];

    selected.each(function() {
        results.push($(this).data('sidc'));
    });
    $('#track-sidc').attr('src',appUrl+'storage/symbology2525c/'+results[0]+'.png');


    console.log(results);
});

$('#button_config_meterological_phenomenon').on('click',function(){
    formMeterologicalPhenomenon.submit();
});

$('.modal').on('hidden.bs.modal',function(){
    try{
        if(!isCreate){
            if(isMeterologicalPhenomenon){
                if(isConfigureCabin){
                    $('#ms_stage').multiSelect('deselect', itemLast.key);

                }else{
                    $('#ms_track').multiSelect('deselect', itemTrackLast.key);
                }
            }
            form[0].reset();
            formTrack[0].reset();
        }
        formMeterologicalPhenomenon[0].reset();
        if(markerCabin != null){
            mapModalStage.removeLayer(markerCabin);
            mapModalStage.invalidateSize();
        }
        if(markerTrack != null){
            mapModalTracks.removeLayer(markerTrack);
            mapModalTracks.invalidateSize();
        }
    }catch(err){

    }
});

$('.modal').on('show.bs.modal',function(){
    // dispatch event change for format coordinates
    $("#format_coordinates,#format_coordinates_track").trigger("change");

    isCreate = false;
    computers = [];
   
    var group = L.latLngBounds([[$("#northeast").val().split(",")[0], $("#northeast").val().split(",")[1]], [$("#southwest").val().split(",")[0], $("#southwest").val().split(",")[1]]]);
    mapModalStage.fitBounds(group);
    mapModalStage.setZoom(6);
    mapModalTracks.fitBounds(group);
    mapModalTracks.setZoom(6);
    mapModalMeterologicalPhenomenon.fitBounds(group);
    mapModalMeterologicalPhenomenon.setZoom(6);
    setTimeout(function(){  
        mapModalStage.invalidateSize();
        mapModalTracks.invalidateSize();
        mapModalMeterologicalPhenomenon.invalidateSize();
    }, 1000); 
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function validateCoordinate(field){
    var re = /^([-+]?)([\d]{1,2})(((\.)(\d+)(,)))(\s*)(([-+]?)([\d]{1,3})((\.)(\d+))?)$/;
    if(!re.test(field.val())){
        return "El formato de la coordenada es invalido";
    }
}



/**
* Get computers and devices
*
*/
function getComputers(cabinId){
    $.ajax({
        type    : "GET",
        url     : appUrl+"catalog/cabin/"+cabinId,
        dataType: "json",
        data    : { id:cabinId },
        success : function(response) {
            $.each(response.computers,function(index,computer){
                var button = $("<button name='computers[]' id='computers' value="+computer.id+" class='btn btn-success active'  title='Dirección IP :"+computer.ip_address+"\n Etiqueta : "+computer.label_arduino+"'><span class='icosg-screen'></span> "+computer.name+"</button>");
                //var button = $("<div class=checkbox><label><input name='computers[]' id='computers' type=checkbox value="+computer.id+" title='Dirección IP :"+computer.ip_address+"\n Etiqueta : "+computer.label_arduino+"' checked>"+computer.name+"</label></div>"); 
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
*Devuelve los datos
*formateados track
*/
function messageFormatTrack(temp){
    var message = "<b><center>"+temp.trackValue+"</center></b><br />"+
           "Posición : <b>"+temp.latLng+"</b><br />"+
           "Velocidad : <b>"+temp.speed+" kts"+
           "</b> | Rumbo :  <b>"+temp.course+"º</b><br />";
    return message;
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


function convertDMSToDD(dms) {
    console.log("DMS"+dms);
     let parts = dms.split(/[^\d+(\,\d+)\d+(\.\d+)?\w]+/);
     let degrees = parseFloat(parts[0]);
     let minutes = parseFloat(parts[1]);
     let seconds = parseFloat(parts[2].replace(',','.'));
     let direction = parts[3];

     console.log('degrees: '+degrees)
     console.log('minutes: '+minutes)
     console.log('seconds: '+seconds)
     console.log('direction: '+direction)

     let dd = degrees + minutes / 60 + seconds / (60 * 60);

     if (direction == 's' || direction == 'w') {
       dd = dd * -1;
     } // Don't do anything for N or E
     return dd;
}

function convertDDMToDD(ddm) {
    console.log("DDM"+ddm);
    let parts = ddm.split(/[^\d+(\,\d+)\d+(\.\d+)?\w]+/);
    console.log(parts);
    let degrees = parseFloat(parts[0]);
    let minutes = parseFloat(parts[1].replace(',','.'));
    //let seconds = parseFloat(parts[2].replace(',','.'));
    let direction = parts[2];

     console.log('degrees: '+degrees)
     console.log('minutes: '+minutes)
     console.log('direction: '+direction)

     let dd = degrees + minutes / 60;

     if (direction == 's' || direction == 'w') {
       dd = dd * -1;
     } // Don't do anything for N or E
     return dd;
}