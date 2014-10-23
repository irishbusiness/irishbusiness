@extends('client.layouts.default')

@section('slider')
	@include('client.partials._slider')
@stop

@section('actual-body-content')
<div class="content-container container-16">
	<!-- <br> -->
	<div class="videoWrapper">
		<iframe style="width:650px; height=393px; frameborder=0;" src="http://www.youtube.com/embed/k8GJ1vRRSPI?vq=hd720&amp;rel=0&amp;autohide=2&amp;modestbranding=1" allowfullscreen></iframe>
	</div>
	<div class="entries-list">
		<div class="separator"></div>
		<!-- <div><h3>Recently <span class="text-colorful">Added</span></h3></div><br/> -->
		@foreach($recentlyaddedcompany as $recentcompany)
			@if(!empty($recentcompany->branches->first()->id))
				<!-- <div class="content-container container-10">
					<a href="{{ URL::to($recentcompany->branches->first()->branchslug) }}" class="thumbnail">
						@if( ($recentcompany->logo == "" || $recentcompany->logo == "images/companylogos/sample_company.jpg") && $recentcompany->profilebanner != "" )
							<img src="{{ ($recentcompany->profilebanner == '') ? URL::asset('images/image-not-available.png') : URL::asset($recentcompany->profilebanner) }}" alt="" />
						@else
							<img src="{{ ($recentcompany->logo == '') ? URL::asset('images/image-not-available.png') : URL::asset($recentcompany->logo) }}" alt="" />
						@endif
					</a>
					<a href="{{ URL::to($recentcompany->branches->first()->branchslug) }}" class="entry-title">
						{{ decode($recentcompany->name) }}
					</a>
					<div class="entry-excerpt">
						{{ decode( Str::limit( $recentcompany->business_description ), 50) }}
					</div>
				</div> -->
			@endif	
		@endforeach
	</div>
</div>
	
	<!-- end of .content-container -->
<!-- </div> -->
@stop


@section('sidebar')
	@include('client.partials._sidebar')
@stop