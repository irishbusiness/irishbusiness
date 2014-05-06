@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-wrapper">
				<div class="zone-content equalize zone clearfix">

					<div class="content-container container-16">

						<div class="companies-listings block">
							<div class="block-title">
								<h1>Search Results</h1>
							</div>
							<div class="pagination">
								<div class="pagination-buttons">
									<a href="#" class="current-page">1</a>
									<a href="#">2</a>
									<a href="#">3</a>
								</div>
							</div>
							@foreach($businesses as $business)
							<div class="company-listing clearfix">
								<a href="#" class="listing-image">
									<img src="images/content/crayons.png" alt="" />
								</a>
								<div class="listing-body">
									<div class="listing-rating">Rating: 99%</div>
									<div class="listing-title">{{$business->name}}</div>
									<div class="listing-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.</div>
									<a href="#" class="listing-read-more">Read More</a>
								</div>
							</div>
							@endforeach
							<div class="pagination">
								<div class="pagination-buttons">
									<a href="#" class="current-page">1</a>
									<a href="#">2</a>
									<a href="#">3</a>
								</div>
							</div>
						</div>

					</div><!-- end of .content-container -->

				</div><!-- end of .zone-content -->
				
			</div><!-- end of .content-wrapper -->
@stop