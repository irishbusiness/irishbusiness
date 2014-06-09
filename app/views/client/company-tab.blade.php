@extends("client.layouts.default")

@section('actual-body-content')
  <title>{{ $title }}</title>
					<div class="company-tabs-wrapper">
                        <div class="zone-company-tabs zone clearfix">
                            <div class="company-tabs-container container-24">
                                <ul id="company-tabs-active" class="company-tabs">
                                    <li class="active">
                                        <a class="company-tabs-page" href="#">BUSINESS</a>
                                    </li>
                                    <li class="">
                                        <a class="company-tabs-blog" href="#">BLOG</a>
                                    </li>
                                    <li class="">
                                        <a class="company-tabs-coupon" href="#">COUPON</a>
                                    </li>
                                    @if(isset($reviews) && !is_null($reviews))
                                        @if(count($reviews))
                                        <li class="">
                                            <a class="company-tabs-review" href="#">REVIEWS</a>
                                        </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                            <!-- end of .company-tabs-container -->
                        </div>
                        <!-- end of .zone-company-tabs -->
                    </div>
					<div class="company-content-wrapper">
						<div class="zone-company-content zone clearfix">
							<div id="company-inner-container" class="company-inner-container container-24">
								<!-- company tab -->
								@include('client.tabcontents.tabcontent-company')

                <!-- blog tab -->
                @include('client.tabcontents.tabcontent-blog')
							
                <!-- coupon tab -->
                @include('client.tabcontents.tabcontent-coupon')

                <!-- reviews tab -->
                @include('client.tabcontents.tabcontent-review')

              </div>
							<!-- end of .company-inner-container -->
						</div>
						<!-- end of .zone-company-content -->
					</div>
@stop
@section('linksfirst')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
@stop
@section('scripts')
	@include('client.tabcontents.tabcontent-scripts')
    <script>
        var geocoder;
var map;
var infowindow = new google.maps.InfoWindow();
var marker;
var lat;
var lng;
function initialize() {
  var origlatlng = "{{$branch->latlng}}";
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
  map = new google.maps.Map(document.getElementById('company-page-map'),
    mapOptions);
    marker = new google.maps.Marker({
    map: map,
    draggable:true,
    position: {lat:lat, lng:lng}
  });

  
  google.maps.event.addListener(marker, 'drag', function() {
    console.log('Dragging...');
    
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    $('#latlng').val(marker.getPosition().toString());
    console.log(marker.getPosition().toString());
  });



  
}


google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop


