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
									<img width="500" height="302" src="{{ URL::asset('/images/companylogos/'.$businessinfo->logo) }}" class="attachment-post-thumbnail wp-post-image" alt="{{ $businessinfo->name }}-logo">
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