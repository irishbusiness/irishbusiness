<header class="section boxed">
	<div class="header-top-wrapper">
		<div class="zone-header-top zone clearfix">
			<div class="header-top-left container-8">
				<div class="user-links">
					<div class="login">
						<a href="{{ URL::to('login') }}" id="login-link" class="login-link">Client Login</a>
					</div>
				</div>
			</div>
			<div class="header-top-right container-16">
				<div class="social-links block">
					<a href="{{ URL::to('http://www.facebook.com') }}">
						<img src="images/facebook-icon.png" alt="" />
					</a>
					<a href="{{ URL::to('http://www.google.com') }}">
						<img src="images/google-icon.png" alt="" />
					</a>
					<a href="{{ URL::to('http://www.twitter.com') }}">
						<img src="images/twitter-icon.png" alt="" />
					</a>
					<a href="{{ URL::to('http://www.linkedin.com') }}">
						<img src="images/linkedin-icon.png" alt="" />
					</a>
					<a href="{{ URL::to('http://www.pinterest.com') }}">
						<img src="images/pinterest-icon.png" alt="" />
					</a>
					<a href="{{ URL::to('http://www.dribbble.com') }}">
						<img src="images/dribbble-icon.png" alt="" />
					</a>
				</div>
			</div>
		</div><!-- end of .zone-header-top -->
	</div><!-- end of .header-top-wrapper -->
	
	<div class="main-menu-wrapper">
		<div class="zone-main-menu zone clearfix">
			<div class="main-menu-container container-24">
			<div class="header-left container-7"><br>
                <a href="http://irishbusiness.ie">
               		<img src="http://irishbusiness.ie/wp-content/uploads/2014/01/IrishBusiness.png" alt="Home » IrishBusiness.ie">
                </a>
  			   </div>
				<div class="main-menu block">
					<ul id="sf-menu menu">
						<li class="empty neighbour-left">
							<div></div>
						</li>
						<li class="first active">
							<a href="{{ URL::to('/') }}">HOME</a>	
						</li>
						
						<li class="">
							<a href="{{ URL::to('blog') }}">BLOG</a>	
						</li>
						<li class="">
							<a href="{{ URL::to('contact-us') }}">CONTACT US</a>
						</li>
						<li class="last">
							<a href="{{ URL::to('register') }}">Register</a>
						</li>
						<li class="empty">
							<div></div>
						</li>
					</ul>
				</div>
			</div>
		</div><!-- end of .zone-main-menu -->
	</div><!-- end of .main-menu-wrapper -->
</header>
