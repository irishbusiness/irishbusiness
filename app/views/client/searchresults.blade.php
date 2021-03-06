@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">	
	<div class="zone-content equalize zone clearfix">

		<div class="content-container container-16">

			<div class="companies-listings block" id="searchres">
				<div class="block-title" >
					<h1>Search Results</h1>
				</div>

				<?php
					$x=0; 
					if(!isset($rating)){
						$rating = array(0);
						$numOfReviews = array(0);
					}
				?>

				@if(!count($branches))
					<h3><span class="text-colorful">Sorry, </span>we can't find what you are looking for, please try other <span class="text-colorful">keywords.</span></h3>
				@endif

				@foreach($branches as $branch)
			
				<div class="company-listing clearfix">
					<a href="{{ URL::to($branch->branchslug) }}" class="listing-image">
						@if( ($branch->business->logo == "" || $branch->business->logo == "images/companylogos/sample_company.jpg") && $branch->business->profilebanner != "" )
							<img src="{{ ($branch->business->profilebanner == '') ? URL::asset('images/image-not-available.png') : URL::asset($branch->business->profilebanner) }}" alt="" />
						@else
							<img src="{{ ($branch->business->logo == '') ? URL::asset('images/image-not-available.png') : URL::asset($branch->business->logo) }}" alt="" />
						@endif
					</a>
					<div class="listing-body">
						<div class="listing-rating">
							<div class="rating-stars {{ (round($rating[$x]) > 0 ? 'rated' : '') }}">
								<div class="star star-1 {{ ( isset($rating[$x])? (round($rating[$x]) == 1 ? 'current' : '') : '') }}"></div>
								<div class="star star-2 {{ ( isset($rating[$x])? (round($rating[$x]) == 2 ? 'current' : '') : '') }}"></div>
								<div class="star star-3 {{ ( isset($rating[$x])? (round($rating[$x]) == 3 ? 'current' : '') : '') }}"></div>
								<div class="star star-4 {{ ( isset($rating[$x])? (round($rating[$x]) == 4 ? 'current' : '') : '') }}"></div>
								<div class="star star-5 {{ ( isset($rating[$x])? (round($rating[$x]) == 5 ? 'current' : '') : '') }}"></div>
							</div>
							<div class="num-reviews">
								{{ $numOfReviews[$x] > 0 ? $numOfReviews[$x] : 'no review yet' }}
								@if($numOfReviews[$x] != 0)
									{{ $numOfReviews[$x] > 1 ? 'reviews' : 'review' }}
								@endif
							</div>
						</div>
						<div class="listing-title">
							{{ HTML::link($branch->branchslug, decode($branch->name).' - '.showAddress($branch->address) ) }}
						</div>
						<div class="listing-text">
							{{ Str::limit( strip_tags(decode($branch->business_description)), 150) }}
						</div>
							{{HTML::link($branch->branchslug, 'Read More',['class' => 'listing-read-more' ] ) }}
					</div>
				</div>
				<?php $x++; ?>
				@endforeach

				{{ $branches->appends(array('category' => $category,'location' =>$location))->links() }}
			</div>

		</div><!-- end of .content-container -->

	</div><!--end of .zone-content-->
	
</div><!-- end of .content16 -->
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop

@scripts
	<script type="text/javascript">
		console.log("Search Results...");
	</script>
@stop

