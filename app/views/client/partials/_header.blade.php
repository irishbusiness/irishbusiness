<!doctype html>
<html class="" lang="en">

	<head>

		<meta charset="utf-8">
		<title>Glocal</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="css/flexslider.css" />
		<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="css/jquery-selectbox.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<link id="theme-color" rel="stylesheet" href="css/green.css" />
		<link rel="stylesheet" href="css/header-7.css" />
		<link rel="stylesheet" href="css/responsive-grid.css" />
		<link rel="stylesheet" href="css/responsive.css" />

		<!--[if lt IE 9]>
			<link rel="stylesheet" href="css/styles-ie8-and-down.css" />
		<![endif]-->



	</head>

	<body>

			<header class="section header-2 boxed">

			<div class="header-top-wrapper">
				<div class="zone-header-top zone clearfix">

					<div class="header-top-left container-8">

						<div class="user-links">
							<div class="login">
								<a href="#" id="login-link" class="login-link">Login</a>
								<form id="login-form" class="login-form">
									<input class="text-input-grey" type="text" placeholder="Login">
									<input class="text-input-grey" type="text" placeholder="Password">
									<a href="#" class="password-restore">Forgot Password?</a>
									<input class="button-2-colorful" type="submit" value="Login">
								</form>
							</div>
						</div>

					</div>

					<div class="header-top-right container-16">

						<div class="social-links block">
							<a href="http://www.facebook.com">
								<img src="images/facebook-icon.png" alt="" />
							</a>
							<a href="http://www.google.com">
								<img src="images/google-icon.png" alt="" />
							</a>
							<a href="http://www.twitter.com">
								<img src="images/twitter-icon.png" alt="" />
							</a>
							<a href="http://www.linkedin.com">
								<img src="images/linkedin-icon.png" alt="" />
							</a>
							<a href="http://www.pinterest.com">
								<img src="images/pinterest-icon.png" alt="" />
							</a>
							<a href="http://www.dribbble.com">
								<img src="images/dribbble-icon.png" alt="" />
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
								<img src="images/logo-2.png" alt="" />
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

				</div><!-- end of .zone-header -->
			</div><!-- end of .header-wrapper -->

		</header>