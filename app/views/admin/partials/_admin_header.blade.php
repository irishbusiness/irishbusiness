 <?php
    if(is_null($recentsettings)){
    	$recentsettings = new \Illuminate\Support\Collection;
    	$recentsettings->headerlogo = 'default.png';
    }
?>
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
                                {{ HTML::image(URL::asset('/images/logo/header/'.$recentsettings->headerlogo), "", ["class"=>"header-logo-img"]) }}
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
									<a href="{{ URL::to('admin/settings/cancellations') }}">CLIENT MANAGEMENT</a>
									<ul>
										<li class="first last">
											<a href="{{ URL::to('admin/settings/cancellations') }}">MANAGE CANCELLATIONS</a>
										</li>
									</ul>
								</li>
								<li {{ (Request::is('admin/settings/general') ? ' class="first active"' : '') }}>
									<a href="{{ URL::to('admin/settings/general') }}">SETTINGS</a>
									<ul>
										<li class="first">
											<a href="{{ URL::to('admin/settings/general') }}">GENERAL</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin/settings/socialmedia') }}">SOCIAL MEDIA</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin/settings/payment-gateway') }}">PAYMENT GATEWAY</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin/settings/categories') }}">MANAGE CATEGORIES</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin/settings/regions') }}">MANAGE REGIONS</a>
										</li>
										<li class="">
											<a href="{{ URL::to('admin/settings/staff') }}">MANAGE STAFF</a>
										</li>
										<li class="last">
											<a href="{{ URL::to('admin/settings/blog') }}">MANAGE BLOG</a>
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