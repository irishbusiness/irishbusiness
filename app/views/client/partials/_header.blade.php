			<header class="section header-2 boxed">

			<div class="header-top-wrapper">
				<div class="zone-header-top zone clearfix">

					<div class="header-top-left container-8">

						<div class="user-links">
							<div class="login">
								<a href="#" id="login-link" class="login-link">Login</a>
								
								<!-- <form id="login-form" class="login-form"> -->
								{{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
									<!-- <input class="text-input-grey" type="text" placeholder="Login"> -->
									{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
									<!-- <input class="text-input-grey" type="text" placeholder="Password"> -->
									{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
									<span id="errordiv" style="font-size:12px;color:red;display:block;margin-top:-10px;margin-bottom:5px">
									</span>
									<a href="#" class="password-restore">Forgot Password?</a>
									<input class="button-2-colorful" type="submit" value="Login">
									
								{{Form::close()}}
							</div>
						</div>

					</div>

					<div class="header-top-right container-16">

						<div class="social-links block">
							<a href="http://www.facebook.com">
								<img src="{{ URL::asset('images/facebook-icon.png') }}" alt="" />
							</a>
							<a href="http://www.google.com">
								<img src="{{ URL::asset('images/google-icon.png') }}" alt="" />
							</a>
							<a href="http://www.twitter.com">
								<img src="{{ URL::asset('images/twitter-icon.png') }}" alt="" />
							</a>
							<a href="http://www.linkedin.com">
								<img src="{{ URL::asset('images/linkedin-icon.png') }}" alt="" />
							</a>
							<a href="http://www.pinterest.com">
								<img src="{{ URL::asset('images/pinterest-icon.png') }}" alt="" />
							</a>
							<a href="http://www.dribbble.com">
								<img src="{{ URL::asset('images/dribbble-icon.png') }}" alt="" />
							</a>
						</div>

					</div>

				</div><!-- end of .zone-header-top -->
			</div><!-- end of .header-top-wrapper -->

			<div class="header-wrapper">
				<div class="zone-header zone clearfix">

					<div class="header-left container-4">

						<div class="logo block">
							<a href="index-header7.html">
								<img src="{{ URL::asset('images/logo-2.png') }}" alt="" />
							</a>
						</div>

					</div>

					<div class="header-right container-20">

						<div class="main-menu block">
							<ul id="sf-menu">
								<li class="empty neighbour-left">
									<div></div>
								</li>
								<li {{ (Request::is('/') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('/') }}">HOME</a>
								</li>
								<li {{ (Request::is('bloglist*') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('bloglist') }}">BLOG</a>
								</li>
								<li {{ (Request::is('contact-us*') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('contact-us')}}">CONTACT US</a>
								</li>
								<li {{ (Request::is('register*') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('register') }}">REGISTER</a>
								</li>
								<li class="empty">
									<div></div>
								</li>
							</ul>
						</div>
						</div>
					</div>
				</div><!-- end of .zone-header -->
			</div><!-- end of .header-wrapper -->
		</header>