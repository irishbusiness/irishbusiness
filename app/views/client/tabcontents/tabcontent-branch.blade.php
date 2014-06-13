@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16 marginize-branch">
	
	<div class="companies-listings block">
		<div class="block-title tabindent">
			<h1>Branches</h1>
		</div>
		@if(Auth::user()->check())
			<a href="{{ URL::to('business/'.businessSlug().'/branch/add') }}" class="a-btn button-2-colorful add-coupon">Add new Branch</a><br>
		@endif
		<?php
		$x=0; 
		if(!isset($rating)){
			$rating = array(0);
		}
		?>
		@foreach($business->branches as $branch)
		<div class="company-listing clearfix tabindent">
			<a href="#" class="listing-image">
				<img src="{{ URL::asset($branch->business->logo) }}" alt="" />
			</a>
			<div class="listing-body">
				<div class="listing-rating top-14">
					<div class="rating-stars {{ (round($rating[$x]) > 0 ? 'rated' : '') }}">
						<div class="star star-1 {{ (round($rating[$x]) == 1 ? 'current' : '') }}"></div>
						<div class="star star-2 {{ (round($rating[$x]) == 2 ? 'current' : '') }}"></div>
						<div class="star star-3 {{ (round($rating[$x]) == 3 ? 'current' : '') }}"></div>
						<div class="star star-4 {{ (round($rating[$x]) == 4 ? 'current' : '') }}"></div>
						<div class="star star-5 {{ (round($rating[$x]) == 5 ? 'current' : '') }}"></div>
					</div>
				</div>
				<div class="listing-title">
					{{ HTML::link($branch->branchslug, decode($branch->business->name).' - '.showAddress($branch->address) ) }}</div>
					<div class="listing-text">{{ Str::limit(decode($branch->business->business_description), 255) }}</div>
					{{HTML::link($branch->branchslug, 'Read More',['class' => 'listing-read-more' ] ) }}
					@if(isOwner($branch->business->slug))
						{{HTML::link('edit/business/'. $branch->business->slug .'/'.$branch->id, 'Edit Branch',['class' => 'listing-read-more' ] ) }}
						{{HTML::link($branch->id.'/branch/delete', 'Delete Branch',['class' => 'listing-read-more', 'onclick' => 'return confirm("Are you sure you want to delete this branch?")' ] ) }}
					@endif
				</div>
			</div>
			<?php $x++; ?>
			@endforeach

		</div>

	</div><!-- end of .content-container -->
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop