<div id="company-tabs-review" class="company-tabs-content">
		<div class="portfolio-container container-24">

		<div class="comments block">
			<div class="review-messages">
				<div class="blog block">
					@if(count($reviews))
						<div class="block-title">
							<h1>Reviews</h1>
						</div>
						@foreach($reviews as $review)
							@if((isOwner($branch->business->slug) && $review->trashed()) || !$review->trashed())
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
										<div class="social-sharer">
											<a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('business-reviews/'.$branch->branchslug.'/'.$review->id) }}" class="share facebook" title="Share on Facebook">
												<span class="facebook"></span>
											</a>
											<a href="https://twitter.com/intent/tweet?url={{ URL::to('business-reviews/'.$branch->branchslug.'/'.$review->id) }}" class="share twitter" title="Share on Twitter">
												<span class="twitter"></span>
											</a>
											<a href="https://plus.google.com/share?url={{ URL::to('business-reviews/'.$branch->branchslug.'/'.$review->id) }}" class="share google" title="Share on Google Plus">
												<span class="google"></span>
											</a>
											<a href="http://www.linkedin.com/shareArticle?mini=true&url={{ URL::to('business-reviews/'.$branch->branchslug.'/'.$review->id) }}&source=IrishBusiness.ie" class="share linkedin" title="Share on LinkedIn">
												<span class="linkedin"></span>
											</a>
										</div>
									</div>
								</div>
							@endif
							@if(isOwner($branch->business->slug))
								@if($review->trashed())
									<a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="approveReview($(this))" id="{{ $review->id.'-approve' }}" data-id="{{ $review->id }}" style="display:">Approve</a>
									<a href="javascript:void(0)" class="bs-btn btn-danger btn-edit-category" onclick="disapproveReview($(this))" id="{{ $review->id.'-disapprove' }}" data-id="{{ $review->id }}" style="display:none;">Disapprove</a>											
								@else
									<a href="javascript:void(0)" class="bs-btn btn-danger btn-edit-category" onclick="disapproveReview($(this))" id="{{ $review->id.'-disapprove'}}" data-id="{{ $review->id }}" style="display:">Disapprove</a>											
									<a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="approveReview($(this))" id="{{ $review->id.'-approve'}}" data-id="{{ $review->id }}" style="display:none">Approve</a>
								@endif
							@endif
						@endforeach
					@else
						<div class="comment-message-title">
							<span class="text-colorful">No Reviews Yet</span>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
	<script type="text/javascript">
		$(window).ready(function(){

		// create social networking pop-ups
		  (function() {
		    
			var Config = {
		      Link: "a.share",
		      Width: 500,
		      Height: 500
			}
		        ;
		  
		  // add handler links
		  var slink = document.querySelectorAll(Config.Link);
		  for (var a = 0; a < slink.length; a++) {
		    slink[a].onclick = PopupHandler;
		  }
		  
		  // create popup
		  function PopupHandler(e) {
		    
		    e = (e ? e : window.event);
		    var t = (e.target ? e.target : e.srcElement);
		    
		    // popup position
		    var
		        px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
		        py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
		    
		    // open popup
		    var popup = window.open(t.href, "social", "width="+Config.Width+",height="+Config.Height+",left="+px+",top="+py+",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
		    if (popup) {
		      popup.focus();
		      if (e.preventDefault) e.preventDefault();
		      e.returnValue = false;
		    }
		    
		    return !!popup;
		  }
		  
		}
		 ());
	});
	</script>
@stop