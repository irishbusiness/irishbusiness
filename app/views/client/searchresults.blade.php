@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-wrapper">
				<div class="zone-content equalize zone clearfix">

					<div class="content-container container-16">

						<div class="companies-listings block">
							<div class="block-title">
								<h1>Search Results</h1>
							</div>
							<!-- <div class="pagination">
								<div class="pagination-buttons">
									<a href="#" class="current-page">1</a>
									<a href="#">2</a>
									<a href="#">3</a>
								</div>
							</div> -->
							@foreach($businesses as $business)
							<div class="company-listing clearfix">
								<a href="#" class="listing-image">
									<img src="{{ URL::asset($business->logo) }}" alt="" />
								</a>
								<div class="listing-body">
									<!-- <div class="listing-rating">Rating: 99%</div> -->
									<div class="listing-rating">
									<div class="rating-stars rated">
											<div class="star star-1"></div>
											<div class="star star-2"></div>
											<div class="star star-3"></div>
											<div class="star star-4"></div>
											<div class="star star-5 current"></div>
									</div>
									</div>
									<div class="listing-title">{{$business->name}}</div>
									<div class="listing-text">{{ $business->business_description }}</div>
									{{HTML::link('company/'. $business->slug . isEmpty($category) .  isEmpty($location), 'Read More',['class' => 'listing-read-more' ] ) }}

								</div>
							</div>
							@endforeach
							{{ $businesses->appends(array('category' => $category,'location' =>$location))->links() }}
						</div>

					</div><!-- end of .content-container -->

				</div><!-- end of .zone-content -->
				
			</div><!-- end of .content-wrapper -->
@stop