@extends('searchpartial.default')
@section('content')

<?php
	/*$business5 = Business::whereRaw('name', 'like', '%%')->where('address1', 'like', '%strets%')->where('address1', 'like', '%45%')*/
	$business5 = Business::whereRaw("name like '%%' and address1 like '%stret%' and address1 like '%45%'")->whereHas('categories', function($q)
	{
	    $q->where('name', 'like', '%sex%');
	    //$q->whereRaw("name like '%more%' and name like '%sex%'");
	     
	})->get();

?>
@foreach ($business5 as $bus)
	{{$bus->name}}
@endforeach

<div class="row">
	{{ Form::open(array('action' => 'BusinessesController@search')) }}
	<div class="large-3 columns">
		{{ Form::text('name','', [
						"placeholder" => "businessname"]) }}
	</div>
	<div class="large-3 columns">
		{{ Form::text('location','', [
						"placeholder" => "location"]) }}
	</div>
	<div class="large-3 columns">
		{{ Form::text('category','', [
						"placeholder" => "category"]) }}
	</div>
	<div class="large-3 columns">
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
				<hr/>
			@endforeach
	</div>
</div>	
@stop