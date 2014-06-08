        @if(isset($coupons))
        <div id="company-tabs-coupon" class="company-tabs-content">
            <a href="{{ URL::to('/business/'.$businessinfo->slug.'/settings/#company-tabs-coupon') }}" class="a-btn button-2-colorful add-coupon">Add new coupon</a>
            @foreach($coupons as $coupon)
			
				<div class="portfolio-container container-24">
					<img src="{{ URL::asset($coupon->name) }}" alt="coupon">

					<p>
					  <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::asset($coupon->name) }}" class="share facebook">
					    Share on Facebook
					  </a>
					</p>
					<p>
					  <a href="https://twitter.com/intent/tweet?url={{ URL::asset($coupon->name) }}&text=Deal+Voucher+Coupon&hashtags=Deal,Voucher,Coupon" class="share twitter">
					    Share on Twitter
					  </a>
					</p>
					<p>
					  <a href="https://plus.google.com/share?url={{ URL::asset($coupon->name) }}" class="share google">
					    Share on Google+
					  </a>
					</p>
					<p>
					  <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ URL::asset($coupon->name) }}&source=IrishBusiness.ie&title=Deal+Voucher+Coupon" class="share linkedin">
					    Share on LinkedIn
					  </a>
					</p>
                     <div class="separator"></div>
				</div>
			   
            @endforeach
            </div>
        @else
            <p>Nothing to show here...</p>
        @endif

			