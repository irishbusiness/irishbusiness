@extends("client.layouts.default")
@section("linksfirst")
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
@stop
@section("actual-body-content")
<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
  <div class="portfolio-container container-24">

    <div class="blog-post block">
      <div class="block-title">
        <h1>Branch Map</h1>
      </div>
    </div>
    <p>(Please drag marker to the location of your business in the map.)
    <div id="map-canvas" style="height:500px"></div>
    <div id="current"></div>

    {{ Form::open(array('action' => ['BusinessesController@storeMap'])) }}

    <div class="form-group">
      {{ Form::hidden('latlng', '', ['id' => 'latlng']) }}
      {{ Form::hidden('slug', $slug, ['id' => 'latlng']) }}
      {{ Form::hidden('branch_id', $branch_id, ['id' => 'latlng']) }}
      {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
    </div>

    <div class="form-group align-right">
      {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
    </div>
    {{ Form::close() }}
  </div>
</div>
@stop

@section('scripts')

{{ HTML::script('scripts/get-map.js') }}


@stop