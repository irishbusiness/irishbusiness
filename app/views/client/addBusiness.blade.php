@extends("client.layouts.default")

@section("actual-body-content")
	<div class="content-container container-16">
        <!-- general settings tab -->
        @include('client.companytabs.business_settings')
<<<<<<< HEAD
     </div>
=======
    </div>
>>>>>>> aecb61a6c9adfa26583d22a71bd9c3ed3950ecbe
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop

@section('scripts')
    <!-- the long scripts -->
        @include('client.companytabs.settings_scripts')
@stops
