					<div class="comments block">
						<div class="review-messages">
							<div id="company-tabs-review" class="company-tabs-content">
								<div class="blog block">
									<div class="block-title">
										<h1>Reviews</h1>
									</div>
									@if(count($reviews)>0)
										@foreach($reviews as $review)
											<div class="review last">
												<div class="review-author">
													<span class="author">{{ $review->name }}</span> - <span class="date">{{ date("F j, Y",strtotime($review->created_at))." at ".date("g:i a",strtotime($review->created_at)) }}</span>
												</div>
												<div class="rating-stars rated">
													<div class="star star-1 {{ ($review->rating == 1 ? 'current' : '') }} "></div>
													<div class="star star-2 {{ ($review->rating == 2 ? 'current' : '') }} "></div>
													<div class="star star-3 {{ ($review->rating == 3 ? 'current' : '') }} "></div>
													<div class="star star-4 {{ ($review->rating == 4 ? 'current' : '') }} "></div>
													<div class="star star-5 {{ ($review->rating == 5 ? 'current' : '') }} "></div>
												</div>
												<div class="review-text">
													{{ html_entity_decode(stripcslashes($review->description)) }}
												</div>
											</div>
										@endforeach
									@else

									@endif
								</div>
							</div>
						</div>
					</div>