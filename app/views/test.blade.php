@extends("client.layouts.default")
@section("linksfirst")
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

@stop
@section("actual-body-content")
	 <div id="map-canvas" style="height:500px"></div>
	 <div id="current"></div>

{{ Form::open(array('action' => ['BusinessesController@testMap'])) }}
            
            <div class="form-group">
                {{ Form::hidden('latlng', '', [
                'id' => 'latlng']) }}
                {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
            </div>
            
            <div class="form-group align-right">
                {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
            </div>
            {{ Form::close() }}
 @stop

@section('scripts')
<script>
var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;
function initialize() {
	 geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 8,
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
  var address = 'Davao City';
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      marker.setPosition(results[0].geometry.location);
       
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });

  
}


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@stop