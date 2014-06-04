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
							<?php $x=0; ?>
							@foreach($businesses as $business)
							<div class="company-listing clearfix">
								<a href="#" class="listing-image">
									<img src="{{ URL::asset($business->logo) }}" alt="" />
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
									<div class="listing-title">{{$business->name}}</div>
									<div class="listing-text">{{ $business->business_description }}</div>
									{{HTML::link('company/'. $business->slug . isEmpty($category) .  isEmpty($location), 'Read More',['class' => 'listing-read-more' ] ) }}

								</div>
							</div>
							<?php $x++; ?>
							@endforeach
							{{ $businesses->appends(array('category' => $category,'location' =>$location))->links() }}
						</div>

					</div><!-- end of .content-container -->

				</div><!-- end of .zone-content -->
				
			</div><!-- end of .content-wrapper -->
@stop