    <?php
    	if(is_null($imgheaderlogo)){
    		$imgheaderlogo = new \Illuminate\Support\Collection;
       	 	$imgheaderlogo->headerlogo = 'default.png';
    	}
    ?>
		<header class="section header-2 boxed">

			<div class="header-top-wrapper">
				<div class="zone-header-top zone clearfix">
					<div class="header-top-left container-8">
						<div class="user-links">
							<div class="login">
								<?php /*dd(Auth::salesperson()->user())*/ ?>
								@if(Auth::user()->check())
									<a href="#" id="login-link" class="login-link">Switch to Sales</a>
									{{Form::open(['action'=>'SessionsController@salesLogin', 'id' =>'login-form', 'class' => 'login-form'])}}
									{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
									{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
									<span id="errordiv" >
									</span>
									<a href="/password/remind" class="password-restore">Forgot Password?</a>
									<input class="button-2-colorful" type="submit" value="Login">
									{{Form::close()}}

								@elseif(Auth::salesperson()->check())
									@if(isClient(Auth::salesperson()->user()->email))

										<a href="#" id="login-link" class="login-link">Switch to Client</a>
										{{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
										{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
										{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
										<span id="errordiv" >
										</span>
										<a href="/password/remind" class="password-restore">Forgot Password?</a>
										<input class="button-2-colorful" type="submit" value="Login">
										{{Form::close()}}
									@endif
								@else
									<a href="#" id="login-link" class="login-link">Login</a>
									{{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
									{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
									{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
									<span id="errordiv" >
									</span>
									<a href="/password/remind" class="password-restore">Forgot Password?</a>
									<input class="button-2-colorful" type="submit" value="Login">
									{{Form::close()}}	
								@endif			
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
							<a href="#">
								<img class="header-logo-img" src="{{ URL::asset('/images/logo/header/'.$imgheaderlogo->headerlogo) }}" alt="" />

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
								<li {{ (Request::is('blog*') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('blog') }}">BLOG</a>
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