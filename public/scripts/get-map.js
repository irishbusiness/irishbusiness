var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;
var lat;
var lng;
function initialize() {
  var origlatlng =  $('#origlatlng').val();
  if(origlatlng!='')
  {
    origlatlng = origlatlng.replace(/[()]/g, '');
    console.log(origlatlng);
    origlatlng = origlatlng.split(",");
    lat = parseFloat(origlatlng[0].trim());
    lng = parseFloat(origlatlng[1].trim());
  }
  else
  {
    lat = 53.270559;
    lng = -9.056668;
  }

  geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(lat,lng)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);
    marker = new google.maps.Marker({
    map: map,
    draggable:true,
    position: {lat:lat, lng:lng}
  });

  if(origlatlng=='')
  {
    console.log('hhahaha');
      codeAddress();
  }
  google.maps.event.addListener(marker, 'drag', function() {
    console.log('Dragging...');
    
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    $('#latlng').val(marker.getPosition().toString());
    console.log(marker.getPosition().toString());
  });

} 

function codeAddress() {
  var address = $('#address').val();
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      marker.setPosition(results[0].geometry.location);
      $('#latlng').val(results[0].geometry.location);
    
    } else {
      map.setCenter({lat:lat, lng:lng});
      marker.setPosition({lat:lat, lng:lng});
      console.log('geolocation failed.');
 
      
    }
  });

  
}


google.maps.event.addDomListener(window, 'load', initialize);