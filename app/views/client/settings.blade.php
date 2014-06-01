@extends("client.layouts.default")

@section("actual-body-content")
        <!-- general settings tab -->
            @include('client.companytabs.business_settings')

        <!-- blog_settings tab -->
            @include('client.companytabs.blog_settings')

        <!-- reviews tab -->
            @include('client.companytabs.coupons')<!-- this is temporarily the coupon tab -->

        <!-- reviews tab -->
        	@include('client.companytabs.reviews')
@stop

@section('scripts')
        <!-- the long scripts -->
            @include('client.companytabs.settings_scripts')
@stop