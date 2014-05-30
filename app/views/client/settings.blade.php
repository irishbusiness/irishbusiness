@extends("client.layouts.default")

@section("actual-body-content")

        <!-- general settings tab -->
            @include('client.companytabs.business_settings')

        <!-- reviews tab -->
            @include('client.companytabs.reviews') <!-- this is temporarily the coupon tab -->
@stop

@section('scripts')
        <!-- the long scripts -->
            @include('client.companytabs.settings_scripts')
@stop