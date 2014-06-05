@extends("client.layouts.default")
@section('title')
	<title>{{ $businessinfo->name }}</title>
@stop
@section('actual-body-content')
<div class="company-content-wrapper">
	<div class="zone-company-content zone clearfix">
		<div id="company-inner-container" class="company-inner-container container-24">
			<!-- company tab -->
			@include('client.tabcontents.tabcontent-company')
			@include('client.tabcontents.tabcontent-coupon')
			@include('client.tabcontents.tabcontent-blog')
			@include('client.tabcontents.tabcontent-review')
		</div>
		<!-- end of .company-inner-container -->
	</div>
	<!-- end of .zone-company-content -->
</div>
@stop

@section('scripts')
	@include('client.tabcontents.tabcontent-scripts')
@stop


