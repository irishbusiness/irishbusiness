<div class="row">
	<div class="large-12 columns">
		@if($businesses->isEmpty())
			<h1> No Results Found! </h1>
		@else
			@foreach($businesses as $business)
				{{$business->name}}
				
			@endforeach
		@endif
	</div>
</div>