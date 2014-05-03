@extends('searchpartial.default')
@section('content')


<div class="row">
	{{ Form::open(array('action' => 'BusinessesController@search')) }}
	
	<div class="large-4 columns">
		{{ Form::text('category','', [
						"placeholder" => "what?"]) }}
	</div>
	<div class="large-4 columns">
		{{ Form::text('location','', [
						"placeholder" => "where?"]) }}
	</div>
	<div class="large-4 columns">
		{{ Form::submit('Submit', ['class' => 'button radius tiny'])  }}
	</div>
	{{Form::close()}}
</div>
<div class="row" style="background:#e3e3e3">
	<div class="large-12 columns">
		<h3> List of Listings </h3>
			@foreach($businesses as $business)
				<p><strong>Business Name:</strong> {{$business->name}}</p>
				<?php $locations = explode(',', $business->address1); ?>
				<p><strong>Location:</strong> 	
				@foreach ($locations as $location)
						   {{'<br/>' . $location }}
				@endforeach
					
				</p>
				<p><strong> Categories:</strong> 	
					@foreach($business->categories as $category)
						{{$category->name . ' '}}
					@endforeach
				</p>
				<?php $keywords = explode(',',$business->address2);?>
				<p><strong> Keywords:</strong> 	
				@foreach ($keywords as $keyword)
						   {{'<br/>' . $keyword }}
				@endforeach
				</p>
				<hr/>
				<p><strong> Locations Served:</strong> 	
				<?php $locations = explode(',',$business->address3);?>
				@foreach ($locations as $location)
						   {{'<br/>' . $location }}
				@endforeach
				</p>
				<hr/>
			@endforeach
	</div>
</div>	
@stop