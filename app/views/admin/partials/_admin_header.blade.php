<!doctype html>
<html class="" lang="en"  ng-app="app">

	<head>

		<meta charset="utf-8">
		<title>Glocal</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />

		
		{{ HTML::style("css/flexslider.css") }}
		{{ HTML::style("css/flexslider.css") }}
		{{ HTML::style("css/jquery-ui-1.10.3.custom.min.css") }}
		{{ HTML::style("css/jquery-selectbox.css") }}
		{{ HTML::style("css/styles.css") }}
		{{ HTML::style("css/green.css") }}
		{{ HTML::style("css/header-7.css") }}
		{{ HTML::style("css/responsive-grid.css") }}
		{{ HTML::style("scripts/redactor.css") }}
		{{ HTML::style("css/xeditable.css") }}
		

        <!--[if lt IE 9]>
			<link rel="stylesheet" href="css/styles-ie8-and-down.css" />
		<![endif]-->

        <script type="text/javascript" src="scripts/jquery-1.10.2.min.js"></script>

        <style type="text/css">
            body .redactor_toolbar li a.redactor_btn_button1 {
                background: url(img/button1.png) no-repeat;
            }
        </style>

        <script type="text/javascript">

            function testButton(obj, event, key)
            {
                obj.execCommand('underline');
            }

            $(document).ready(
                function()
                {
                    var buttons = ['formatting', '|', 'bold', 'italic', '|', 'unorderedlist', 'orderedlist', 'outdent', 'indent', '|', 'image', 'video', 'file', 'link', '|', 'horizontalrule'];

                    $('#redactor').redactor({
                        focus: true,
                        buttons: buttons,
                        buttonsCustom: {
                            button1: {
                                title: 'Button',
                                callback: testButton
                            }
                        }
                    });
                }
            );
        </script>


	</head>

	<body>

			<header class="section header-2 boxed">

			<div class="header-top-wrapper">
				<div class="zone-header-top zone clearfix">

					<div class="header-top-left container-8">
					
						<div class="user-links">
						
						</div>

					</div>


					<div class="header-top-right container-16">

						<div class="social-links block">

						</div>

					</div>

				</div><!-- end of .zone-header-top -->
			</div><!-- end of .header-top-wrapper -->

			<div class="header-wrapper">
				<div class="zone-header zone clearfix">

					<div class="header-left container-4">

						<div class="logo block">
							<a href="#">
								<img src="images/logo-2.png" alt="" />
							</a>
						</div>

					</div>

					<div class="header-right container-20">

					

					<div class="main-menu block">
							<ul id="sf-menu">
								<li class="empty">
									<div></div>
								</li>
								<li {{ (Request::is('admin_manage_cancellations') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('admin_manage_cancellations') }}">CLIENT MANAGEMENT</a>
									<ul>
										<li class="first last">
											<a href="{{ URL::to('admin_manage_cancellations') }}">MANAGE CANCELLATIONS</a>
										</li>
									</ul>
								</li>
								<li {{ (Request::is('admin_settings_general') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('admin_settings_general') }}">SETTINGS</a>
									<ul>
										<li class="first">
											<a href="{{ URL::to('admin_settings_general') }}">GENERAL</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin_settings_socialmedia') }}">SOCIAL MEDIA</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin_payment_gateway') }}">PAYMENT GATEWAY</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin_manage_categories') }}">MANAGE CATEGORIES</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin_manage_regions') }}">MANAGE REGIONS</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin_manage_staff') }}">MANAGE STAFF</a>
										</li>
										<li class="last">
											<a href="{{ URL::to('admin_manage_blog') }}">MANAGE BLOG</a>
										</li>
									</ul>
								</li>
								<li class="">
									<a href="{{ URL::to('admin_change_password') }}">CHANGE PASSWORD</a>
								</li>
								<li class="neighbour-right">
									<a href="{{ URL::to('admin_logout') }}">LOGOUT</a>
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