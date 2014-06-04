<?php
	if(is_null($imgfooterlogo)){
		$imgfooterlogo = new \Illuminate\Support\Collection;
   	 	$imgfooterlogo->footerlogo = 'default.png';
	}
?>

		<footer class="section boxed">

			<div class="footer-wrapper">
				<div class="zone-footer zone clearfix">

					<div class="footer-container container-24">

						<div class="website-short-description block">
							<img class="footer-logo-img" src="{{ URL::asset('/images/logo/footer/'.$imgfooterlogo->footerlogo) }}" alt="" />
							<div class="description-text">
								Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. Etiam sit amet lectus quis est congue mollis.
							</div>
						</div>

						<div class="twitter-feed block">
							<h3 class="title">Recent Tweets</h3>
							<div id="twitter-feed"></div>
						</div>

						<div class="recent-posts block">
							<h3 class="title">Recent Posts</h3>
							<ul>
								<li class="first">
									<a href="#" class="text-colorful">Lorem ipsum dolor sit amet</a>
								</li>
								<li>
									<a href="#" class="text-colorful">Proin nibh augue suscipit</a>
								</li>
								<li>
									<a href="#" class="text-colorful">Cras vel lorem</a>
								</li>
								<li class="last">
									<a href="#" class="text-colorful">Quisque semper justo at risus</a>
								</li>
							</ul>
						</div>

						<div class="flickr-feed block">
							<h3 class="title">Flickr Feed</h3>
							<div id="flickr-feed"></div>
						</div>

					</div>

				</div><!-- end of .zone-footer -->
			</div><!-- end of .footer-wrapper -->

			<div class="copyright-wrapper">
				<div class="zone-copyright zone clearfix">

					<div class="copyright-left-container container-12">

						<div class="copyright block">&copy; 2014 IrishBusiness.ie. All Rights Reserved.</div>

					</div>

					<div class="copyright-right-container container-12">

						<div class="social-links block">
							@if($socialmedia->facebook != '')
		    					<a href="{{ $socialmedia->facebook }}">
		    						<img src="{{ URL::asset('images/facebook-icon.png') }}" alt="" />
		    					</a>
		                    @endif
		                    @if($socialmedia->google != '')
		    					<a href="{{ $socialmedia->google }}">
		    						<img src="{{ URL::asset('images/google-icon.png') }}" alt="" />
		    					</a>
		                    @endif
		                    @if($socialmedia->twitter != '')
		    					<a href="{{ $socialmedia->twitter }}">
		    						<img src="{{ URL::asset('images/twitter-icon.png') }}" alt="" />
		    					</a>
		                    @endif
		                    @if($socialmedia->linkedin != '')
		    					<a href="{{ $socialmedia->linkedin }}">
		    						<img src="{{ URL::asset('images/linkedin-icon.png') }}" alt="" />
		    					</a>
		                    @endif
		                    @if($socialmedia->pinterest != '')
		    					<a href="{{ $socialmedia->pinterest }}">
		    						<img src="{{ URL::asset('images/pinterest-icon.png') }}" alt="" />
		    					</a>
		                    @endif
		                    @if($socialmedia->dribbble != '')
		    					<a href="{{ $socialmedia->dribbble }}">
		    						<img src="{{ URL::asset('images/dribbble-icon.png') }}" alt="" />
		    					</a>
		                    @endif
						</div>

					</div>

				</div><!-- end of .zone-copyright -->
			</div><!-- end of .copyright-wrapper -->

		</footer>