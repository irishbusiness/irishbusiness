@extends("client.layouts.default")

@section("actual-body-content")
	<div class="content-container container-16">
        <!-- general settings tab -->
        @include('client.companytabs.business_settings')
     
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop

@section('scripts')
        <!-- the long scripts -->
            @include('client.companytabs.settings_scripts')
@stop