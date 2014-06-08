@extends("client.layouts.default")

@section("actual-body-content")
        @if(Session::has('flash_message'))
            <h4>{{Session::get('flash_message')}}</h4>
        @endif

        <!-- general settings tab -->
        @include('client.companytabs.business_settings')
     
@stop

@section('scripts')
        <!-- the long scripts -->
            @include('client.companytabs.settings_scripts')
@stop