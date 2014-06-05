@extends("client.layouts.default")
@section("title")
    <title>Settings</title>
@stop
@section("actual-body-content")
        @if(Session::has('flash_message'))
            <h4>{{Session::get('flash_message')}}</h4>
        @endif
        <!-- general settings tab -->
            @include('client.companytabs.business_settings')

        <!-- blog_settings tab -->
            @include('client.companytabs.blog_settings')

        <!-- reviews tab -->
        	@include('client.companytabs.reviews')

        <!-- reviews tab -->
            @include('client.companytabs.coupons')
@stop

@section('scripts')
        <!-- the long scripts -->
            @include('client.companytabs.settings_scripts')
@stop