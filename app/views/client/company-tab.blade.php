@extends("client.layouts.default")

@section('actual-body-content')



<div class="company-tabs-wrapper">
	<div class="zone-company-tabs zone clearfix">
		<div class="company-tabs-container container-24">
			<ul id="company-tabs-active" class="company-tabs">
				<li class="active">
					<a class="company-tabs-page" href="#">BUSINESS</a>
				</li>
				@if(count($blogs) || isOwner($branch->business->slug) || isAdmin() )
				<li class="">
					<a class="company-tabs-blog" href="#">BLOG</a>
				</li>
				@endif
				@if( (count($coupons)>0 && !isOwner($branch->business->slug)) || isOwner($branch->business->slug) || isAdmin()  )
				<li class="">
					<a class="company-tabs-coupon" href="#">COUPON</a>
				</li>
				@endif

				<?php $review_count= 0; $all_reviews = 0; ?>
				@foreach($reviews as $review)
					<?php $all_reviews++; ?>
					@if(!$review->trashed())
						<?php $review_count++; ?>
					@endif
				@endforeach


				@if( $review_count>0 || (isOwner($branch->business->slug) || isAdmin() ) )
				<li class="">
					<a class="company-tabs-review" href="javascript:void(0)">REVIEWS</a>
				</li>
				@endif

				@if( count($photos)>0 || (isOwner($branch->business->slug) || isAdmin() ) )
				<li class="">
					<a class="company-tabs-photogallery" href="javascript:void(0)">GALLERY</a>
				</li>
				@endif
				<a href="javascript:void(0);" class="tab-link">
					<li style="float:right;">
						<span class="phone">Call</span>
						<span>{{ substr($branch->phone, 0, 3)." ".substr($branch->phone, 3, strlen($branch->phone)) }}</span>
					</li>
				</a>
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

			@if(count($blogs) || isOwner($branch->business->slug) || isAdmin() )                  
				<!-- blog tab -->
				@include('client.tabcontents.tabcontent-blog')
			@endif

			@include('client.tabcontents.tabcontent-review')


			@if(count($coupons) || isOwner($branch->business->slug) || isAdmin() )               
				<!-- coupon tab -->
				@include('client.tabcontents.tabcontent-coupon-latest')
			@endif

			@if(count($photos) || isOwner($branch->business->slug) || isAdmin() )               
				<!-- gallery tab -->
				@include('client.tabcontents.tabcontent-photogallery')
			@endif

			@if( isAdmin() || isOwner($branch->business->slug) )
				<!-- settings tab -->
				@include( 'client.tabcontents.tabcontent-settings' )
			@endif
		</div>
		<!-- end of .company-inner-container -->
	</div>
	<!-- end of .zone-company-content -->
</div>
@stop
	@section('linksfirst')
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	@stop

	@section('scripts2')
		<script>
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
					origlatlng = origlatlng.split(",");
					lat = parseFloat(origlatlng[0].trim());
					lng = parseFloat(origlatlng[1].trim());
				}
				else
				{
					lat = 53.270559;
					lng = -9.056668;
				}

				var mapOptions = {
					zoom: 15,
					center: new google.maps.LatLng(lat,lng)
				};
				map = new google.maps.Map(document.getElementById('company-page-map'),
					mapOptions);

				marker = new google.maps.Marker({
					map: map,
					draggable:false,
					position: {lat:lat, lng:lng}
				});

				document.getElementById('get-direction').href="https://maps.google.com?saddr=Current+Location&daddr="+lat+","+lng;

			}



			google.maps.event.addDomListener(window, 'load', initialize);

		</script>
	@include('client.tabcontents.tabcontent-scripts')
	@stop


