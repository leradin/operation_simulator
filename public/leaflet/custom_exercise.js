var currentObject = null;
var mapModalStage = L.map('map',
{
  layers: [Bmarvel],
  crs: L.CRS.EPSG4326,
  center: [19.2, -96.1],
  zoom: 6,
  attributionControl: false,
});

L.control.layers(baseLayersMapModal, overlaysMapModal).addTo(mapModalStage);

var popupMapModalStage = L.popup();
mapModalStage.on('click', onMapModalClickStage);

function onMapModalClickStage(e) {
   console.log(currentObject.id);
    popupMapModalStage
        .setLatLng(e.latlng)
        .setContent(e.latlng.toString())
        .openOn(mapModalStage);
    $('#'+currentObject.id).val(e.latlng.lat+" , "+e.latlng.lng);
}
 
mapModalStage.dragging.disable();
mapModalStage.touchZoom.disable();
mapModalStage.doubleClickZoom.disable();
mapModalStage.scrollWheelZoom.disable();

function openModalMap(obj){
  setTimeout(function(){  
    mapModalStage.invalidateSize();
  }, 3000);
  currentObject = obj;
  $('#fModal').modal('show'); 
}