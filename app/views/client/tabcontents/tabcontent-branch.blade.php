<div id="company-tabs-branch" class="company-tabs-content">

	@if(Auth::user()->check())
	<a href="{{ URL::to('business/'.businessSlug().'/branch/add') }}" class="a-btn button-2-colorful add-coupon">Add new Branch</a><br>
	@endif

	<div class="companies-listings block">
		<div class="block-title tabindent">
			<h1>Branches</h1>
		</div>
		<?php
		$x=0; 
		if(!isset($rating)){
			$rating = array("");
		}
		?>
		@foreach($business->branches as $branch)
		<div class="company-listing clearfix tabindent">
			<a href="#" class="listing-image">
				<img src="{{ URL::asset($branch->business->logo) }}" alt="" />
			</a>
			<div class="listing-body">
				<div class="listing-rating">
					<div class="rating-stars {{ (round($rating[$x]) > 0 ? 'rated' : '') }}">
						<div class="star star-1 {{ (round($rating[$x]) == 1 ? 'current' : '') }}"></div>
						<div class="star star-2 {{ (round($rating[$x]) == 2 ? 'current' : '') }}"></div>
						<div class="star star-3 {{ (round($rating[$x]) == 3 ? 'current' : '') }}"></div>
						<div class="star star-4 {{ (round($rating[$x]) == 4 ? 'current' : '') }}"></div>
						<div class="star star-5 {{ (round($rating[$x]) == 5 ? 'current' : '') }}"></div>
					</div>
				</div>
				<div class="listing-title">
					{{ HTML::link('company/'. $branch->business->slug . '/' . $branch->id, decode($branch->business->name).' - '.showAddress($branch->address) ) }}</div>
					<div class="listing-text">{{ $branch->business->business_description }}</div>
					{{HTML::link('company/'. $branch->business->slug .'/'.$branch->id, 'Read More',['class' => 'listing-read-more' ] ) }}
				</div>
			</div>
			<?php $x++; ?>
			@endforeach

		</div>

	</div><!-- end of .content-container -->
	
</div>