@extends("client.layouts.default")
@section("linksfirst")
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
@stop
@section("actual-body-content")
<!-- <div id="company-tabs-page" class="company-tabs-content" style="display: block;"> -->
	<div class="content-container container-24">

		<div class="blog-post block">
			<div class="block-title">
				<h1>Branch Map</h1>
			</div>
		    <div class="comments block">
				<p>(Please drag marker to the location of your business in the map.)
					<span class="text-coloful with-tooltip float-right" title="Make sure you're connected with internet.">
						<a href="javascript:void()" data-toggle="reload-page">Map not showing? Click to reload.</a>
					</span>
				</p>

				<div id="map-canvas" style="height:500px"></div>
				<div id="current"></div>

				{{ Form::open(array('action' => ['BusinessesController@storeMap'])) }}

				<div class="form-group">
					{{ Form::hidden('latlng', '', ['id' => 'latlng']) }}
					{{ Form::hidden('slug', decode($slug), ['id' => 'latlng']) }}
					{{ Form::hidden('branchSlug', $branch->branchslug) }}
					{{ Form::hidden('address', $branch->address,['id' => 'address'])}}
					{{ Form::hidden('origlatlng', $branch->latlng,['id' => 'origlatlng'])}}
					{{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
				</div>

				<div class="form-group align-right">
					@if($q == 1)
						<a href="{{ URL::previous() }}"><input type="button" value="Cancel" name="back" class="button-2-red"/></a>
					@endif
					{{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	@stop

	@section('scripts')

	{{ HTML::script('scripts/get-map.js') }}


	@stop