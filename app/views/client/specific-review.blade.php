@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-container container-16">
		<div class="content-wrapper">
			<div class="zone-content equalize zone clearfix">
				<div class="content-container container-16">
					<h2><a href="{{ URL::to($branch->branchslug) }}">{{ decode($business->name) }}</a></h2>
					<div class="review last">
						<div class="review-author">
							<span class="author">{{ $review->name }}</span> - <span class="date">{{ date("F j, Y",strtotime($review->created_at))." at ".date("g:i a",strtotime($review->created_at)) }}</span>
						</div>
						<div class="rating-stars {{ ($review->rating > 0 ? 'rated' : '') }}">
							<div class="star star-1 {{ ($review->rating == 1 ? 'current' : '') }} "></div>
							<div class="star star-2 {{ ($review->rating == 2 ? 'current' : '') }} "></div>
							<div class="star star-3 {{ ($review->rating == 3 ? 'current' : '') }} "></div>
							<div class="star star-4 {{ ($review->rating == 4 ? 'current' : '') }} "></div>
							<div class="star star-5 {{ ($review->rating == 5 ? 'current' : '') }} "></div>
						</div>
						<div class="review-text">
							{{ decode($review->description) }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('sidebar')
	@include('client.partials._sidebar')
@stop