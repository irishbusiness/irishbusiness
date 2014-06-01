					<div class="sidebar-container container-8">

						<div class="recently-added block">
							<div class="block-title">
								<h3>Recently Added</h3>
							</div>
							<ul class="entries-list">
								@foreach($recentlyaddedcompany as $recentcompany)
									<li class="clearfix">
										<a href="#" class="thumbnail">
											<img src="{{ URL::asset($recentcompany->logo) }}" alt="" />
										</a>
										<a href="#" class="entry-title">{{ html_entity_decode(stripcslashes($recentcompany->name)) }}</a>
										<div class="entry-excerpt">{{ Str::limit(html_entity_decode(stripcslashes($recentcompany->business_description)), 50) }}</div>
									</li>	
								@endforeach
							</ul>
							<!-- <div class="two-images-banner clearfix">
								<a href="#">
									<img src="{{ URL::asset('images/content/crayons.png') }}" alt="" />
								</a>
								<a href="#">
									<img src="{{ URL::asset('images/content/coins.png') }}" alt="" />
								</a>
							</div>
						</div> -->

						<div class="latest-news block">
							<div class="block-title">
								<h3>Latest News</h3>
							</div>
							<ul class="entries-list">
							@foreach($recentlyaddedblog as $recentblog)
								<li class="clearfix">
									<a href="#" class="thumbnail">
										<img src="{{ URL::asset($recentblog->blogheaderimage) }}" alt="" />
									</a>
									<a href="#" class="entry-title">{{ $recentblog->title }}</a>
									<div class="entry-excerpt">{{ Str::limit(strip_tags($recentblog->body) , 50) }}</div>
								</li>
							@endforeach
							</ul>
							<!-- <div class="one-image-banner">
								<a href="#">
									<img src="{{ URL::asset('images/content/handshake.png') }}" alt="" />
								</a>
							</div> -->
						</div>

					</div><!-- end of .sidebar-container -->