var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(-34.397, 150.644)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);
  marker = new google.maps.Marker({
    map: map,
    draggable:true,
    position: {lat: 53.2705588, lng: -9.0566677}
  });

  codeAddress();

  google.maps.event.addListener(marker, 'drag', function() {
    console.log('Dragging...');
    
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    $('#latlng').val(marker.getPosition().toString());
    console.log(marker.getPosition().toString());
  });

}

function codeAddress() {
  var address = "{{$address}}";
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      marker.setPosition(results[0].geometry.location);
      $('#latlng').val(results[0].geometry.location);
    } else {
      map.setCenter({lat:53.270559, lng:-9.056668});
      marker.setPosition({lat:53.270559, lng:-9.056668});
      
    }
  });

  
}


google.maps.event.addDomListener(window, 'load', initialize);