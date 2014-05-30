@extends("client.layouts.default")

@section('actual-body-content')
<div id="tab-nav" class="content-container container-24">
	<div class="company-tabs-wrapper">
	    <div class="zone-company-tabs zone clearfix">
	        <div class="company-tabs-container container-24">
	            <ul id="company-tabs-active" class="company-tabs">
	                <li class="active">
	                    <a class="company-tabs-page" href="#">COMPANY</a>
	                </li>
	                <li class="">
	                    <a class="company-tabs-custom" href="#">COUPON</a>
	                </li>
	            </ul>
	        </div>
	        <!-- end of .company-tabs-container -->
	    </div>
	    <!-- end of .zone-company-tabs -->
	</div>
</div>
<div class="company-content-wrapper">
	<div class="zone-company-content zone clearfix">
		<div id="company-inner-container" class="company-inner-container container-24">
			<div id="company-tabs-page" class="company-tabs-content">
				<div class="sidebar-container container-8 show">
					<div class="company-page-map">
						<div class="company-page-map-container">
							<div id="company-page-map">
								<img src="{{ URL::asset('images/temporary_map.jpg') }}">
							</div>
						</div>
					</div>
					<div class="contact-details company-page-block">
						<div class="block-title">
							<h3>Contact Details</h3>
						</div>
						<table class="company-address">
							<tbody>
								<tr class="detail">
									<td class="detail-label"> Name </td>
									<td class="detail">
										{{ $businessinfo->name }}
									</td>
								</tr>
								<tr class="detail">
									<td class="detail-label">
										Full Address
									</td>
									<td class="detail">
										{{ $businessinfo->address }}
									</td>
								</tr>
								<tr class="detail">
									<td class="detail-label"> Phone </td>
									<td class="detail"> {{ $businessinfo->phone }} </td>
								</tr>
								<tr class="detail">
									<td class="detail-label"> Website </td>
									<td class="detail">
										<a href="{{ $businessinfo->website }}" class="text-green">{{ $businessinfo->website }}</a>
									</td>
								</tr>
								<tr class="detail">
									<td class="detail-label"> E-mail </td>
									<td class="detail">
										<a href="mailto:{{ $businessinfo->email }}" class="text-green">{{ $businessinfo->email }}</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="opening-hours company-page-block">
						<div class="block-title">
							<h3>Opening Hours</h3>
						</div>
						<table>
							<tbody>
								<tr class="detail">
									<td class="detail-label padding-left-19">Mon-Friday</td>
									<td class="detail">{{ $businessinfo->mon_fri }}</td>
								</tr>
								<tr class="detail">
									<td class="detail-label padding-left-19">Saturday: </td>
									<td class="detail">{{ $businessinfo->sat }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="share-this company-page-block">
						<div class="block-title">
							<h3>Share This Listing</h3>
						</div>
						<ul>
							<li><a href="#" class="facebook" onclick="share_FB();"></a></li>
							<li><a href="#" class="twitter" onclick="share_TW();"></a></li>
							<li><a href="#" class="google" onclick="share_GP();"></a></li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="latest-news block">
						<div class="one-image-banner">
							<a href="#">
							<img src="{{ URL::asset('/images/sidebar_banner.png') }}" alt="">
							</a>
						</div>
					</div>
				</div>
				<!-- end of .company-sidebar-container -->
				<div class="company-content-container container-16 margin-18">
					<div class="company-tabs-single-company block">
						<h1>{{ $businessinfo->name }}</h1>
						<div class="company-info clearfix">
							<div class="company-info-social">
								<div class="compnay-photo">
									<img width="500" height="302" src="http://irishbusiness.ie/wp-content/uploads/2013/09/novatel-logo.jpg" class="attachment-post-thumbnail wp-post-image" alt="novatel-logo">
								</div>
								<a href="{{ $businessinfo->facebook }}" class="facebook" target="_blank"></a>
								<a href="{{ $businessinfo->twitter }}" class="twitter" target="_blank"></a>
								<a href="{{ $businessinfo->google }}" class="google" target="_blank"></a>
							</div>
							<div class="company-info-description">
								{{ $businessinfo->business_description }}
							</div>
						</div>
					</div>
					<div class="separator"></div>
					<div class="profile-description company-page-center-block">
						<h2>Profile Description</h2>
						<div class="block-content">
							{{ $businessinfo->profile_description }}
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="separator"></div>
					<div class="range-of-services company-page-center-block">
						<div class="divkeywords">
							<h2>Keywords</h2>
						</div>
						<div class="block-content">
							<ul>
								<?php 
									$keywords = $businessinfo->keywords;
									$arr = explode(",", $keywords);
									foreach ($arr as $keyword) {
										echo "<li>".$keyword."</li>";
									}
								?>
							</ul>
							<div class="clear">
							</div>
						</div>
					</div>
					<div class="separator"></div>
					<div class="range-of-services company-page-center-block">
						<div class="divlocations">
							<h2>Locations Serviced</h2>
						</div>
						<div class="block-content">
							<ul>
								<?php 
									$locations = $businessinfo->locations;
									$arr = explode(",", $locations);
									foreach ($arr as $location) {
										echo "<li>".$location."</li>";
									}
								?>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					<div class="separator"></div>
					<div class="comment-message block">
						<div id="uou-stars-system" class="rating-system" data-post-id="362">
							<div id="get_homeurl" data-homeurl="http://irishbusiness.ie/wp-content/themes/glocal">
							</div>
							<div class="comment-respond">
								<h3 class="comment-reply-title" id="reply-title"><span class="comment-message-title your-rating">Your <span class="text-green">Rating</span></span></h3>
								<div class="rating-send">
									<div class="message error" style="display: none;">
										<div class="notification-error">
											<div class="notification-inner">
												Please complete the required fields
											</div>
										</div>
									</div>
									<div class="message success" style="display: none;">
										<div class="notification-success">
											<div class="notification-inner">
												Rating has been successfully sent
											</div>
										</div>
									</div>
									<div class="rating-ipnuts">
										<div class="rating-details">
											<div class="detail">
												<input id="rating-name" name="rating-name" type="text" placeholder="Name" class="text-input-grey one-fourth">
											</div>
											<div class="detail">
												<textarea id="rating-description" name="rating-description" rows="8" cols="45" placeholder="Description" class="text-input-grey comment-message-main one-fourth"></textarea>
											</div>
											<button class="send-rating button-2-green">Send rating</button>
										</div>
									</div>
									<div class="clearfix">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of .company-content-container -->
			<div id="company-tabs-custom" class="company-tabs-content" style="display: none;">
				<div class="portfolio-container container-24">
					<img src="{{ URL::asset('/images/coupons/novatel_coupon.png') }}" alt="coupon">

					<p>
					  <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::asset('/images/coupons/novatel_coupon.png') }}" class="share facebook">
					    Share on Facebook
					  </a>
					</p>
					<p>
					  <a href="https://twitter.com/intent/tweet?url=http://irishbusiness.ie/_clients/_share/coupon.png&text=Deal+Voucher+Coupon&hashtags=Deal,Voucher,Coupon" class="share twitter">
					    Share on Twitter
					  </a>
					</p>
					<p>
					  <a href="https://plus.google.com/share?url={{ URL::asset('/images/coupons/novatel_coupon.png') }}" class="share google">
					    Share on Google+
					  </a>
					</p>
					<p>
					  <a href="http://www.linkedin.com/shareArticle?mini=true&url=http://irishbusiness.ie/_clients/_share/coupon.png&source=IrishBusiness.ie&title=Deal+Voucher+Coupon" class="share linkedin">
					    Share on LinkedIn
					  </a>
					</p>
				</div>
			</div>
		</div>
		<!-- end of .company-inner-container -->
	</div>
	<!-- end of .zone-company-content -->
</div>
@stop

@section('scripts')
	<script>
		$(window).load(function(){
			$(".sidebar-container:last").remove();
			$(".show").show();
			$(".content-container.container-16").css("minHeight", "");
			$(".content-container.container-16").removeAttr("style");
			
			$(".company-tabs").on("click", function(){
				$(".content-container.container-16").css("minHeight", "");
				$(".content-container.container-16").removeAttr("style");
			});

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


