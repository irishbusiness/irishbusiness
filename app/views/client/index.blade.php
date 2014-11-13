@extends('client.layouts.default')

@section('slider')
	@include('client.partials._slider')
@stop

@section('actual-body-content')
<div class="content-container container-16">
	<!-- <br> -->
	<div class="videoWrapper">
		<iframe style="height=393px; frameborder=0;" src="http://www.youtube.com/embed/k8GJ1vRRSPI?vq=hd720&amp;rel=0&amp;autohide=2&amp;modestbranding=1" allowfullscreen></iframe>
	</div>

	
</div>

<!-- end of .content-container -->
@stop


@section('sidebar')
	@include('client.partials._sidebar')
@stop