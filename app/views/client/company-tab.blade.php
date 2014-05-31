@extends("client.layouts.default")

@section('actual-body-content')
<div id="tab-nav" class="content-container container-24">
	<div class="company-tabs-wrapper">
	    <div class="zone-company-tabs zone clearfix">
	        <div class="company-tabs-container container-24">
	            <ul id="company-tabs-active" class="company-tabs">
	                <li class="active">
	                    <a class="company-tabs-page" href="#">COMPANY</a>
	                </li>
	                <li class="">
	                    <a class="company-tabs-coupon" href="#">COUPON</a>
	                </li>
	                <li class="">
	                    <a class="company-tabs-blog" href="#">BLOG</a>
	                </li>
	                <li class="">
	                    <a class="company-tabs-review" href="#">REVIEWS</a>
	                </li>
	            </ul>
	        </div>
	        <!-- end of .company-tabs-container -->
	    </div>
	    <!-- end of .zone-company-tabs -->
	</div>
</div>
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


