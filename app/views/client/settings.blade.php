@extends("client.layouts.default")

@section("actual-body-content")
	<div class="blog-post block">
			<div class="block-title">
				<h1>General Settings</h1>
			</div>
		</div>

        <!-- general settings tab -->
            @include('client.companytabs.business_settings')

        <!-- blog_settings tab -->
            @include('client.companytabs.blog_settings')

        <!-- reviews tab -->
            @include('client.companytabs.reviews') <!-- this is temporarily the coupon tab -->
@stop

@section('scripts')
        <!-- the long scripts -->
            @include('client.companytabs.settings_scripts')
@stop