<?php
	if(is_null($recentsettings)){
		$recentsettings = new \Illuminate\Support\Collection;
   	 	$recentsettings->footerlogo = 'default.png';
   	 	$recentsettings->footer_text = "";
	}
	if(!isset($socialmedia)){
        $socialmedia = new \Illuminate\Support\Collection;
        $socialmedia->pinterest = "";
        $socialmedia->dribbble = "";
        $socialmedia->facebook = "";
        $socialmedia->google = "";
        $socialmedia->twitter = "";
        $socialmedia->linkedin = "";
    }
?>

		<footer class="section boxed">

			<div class="footer-wrapper">
				<div class="zone-footer zone clearfix">

					<div class="footer-container container-24">

						<div class="website-short-description block">
							<img class="footer-logo-img" src="{{ URL::asset('/images/logo/footer/'.$recentsettings->footerlogo) }}" alt="" />
							<div class="description-text">
								<p>{{ $recentsettings->footer_text }}</p>
							</div>
						</div>

						<div class="twitter-feed block">
							<h3 class="title">Recent Tweets</h3>
							<div id="twitter-feed"></div>
						</div>

						<div class="recent-posts block">
							<h3 class="title">Recent Posts</h3>
							<ul>
							<?php $x = 1; ?>
							@foreach($recentlyaddedblog as $recentblog)
								<li class="{{ ($x == 1) ? 'first' : ($x == count($recentlyaddedblog) ? 'last' : '') }}">
									<a href="#" class="text-colorful">{{ stripcslashes($recentblog->title) }}</a>
								</li>
								<?php $x++; ?>
							@endforeach
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