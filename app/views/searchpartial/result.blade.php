<div class="row">
	<div class="large-12 columns">
		@if($businesses->isEmpty())
			<h1> No Results Found! </h1>
		@else
		<ul>
			@foreach($businesses as $business)
				<li> {{'<a href = "listing/' . $business->id . ((trim($category)!='') ? '/' . $category : '') .  ((trim($location)!='') ? '/' . $location : '' ) .'">' . $business->name . '</a>' }}</li>
				
			@endforeach
		</ul>
		@endif
	</div>
</div>