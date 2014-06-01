					<div class="sidebar-container container-8">

						<div class="recently-added block">
							<div class="block-title">
								<h3>Recently Added</h3>
							</div>
							<ul class="entries-list">
								@foreach($recentlyadded as $recent)
									<li class="clearfix">
									<a href="URL::action('TagsController@viewnotesbytags', array('tagname' => $tag->title )) }}" class="thumbnail">
										<img src="{{ URL::asset($recent->logo) }}" alt="" />
									</a>
									<a href="#" class="entry-title">Company Name</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>	
								@endforeach
							</ul>
							<div class="two-images-banner clearfix">
								<a href="#">
									<img src="{{ URL::asset('images/content/crayons.png') }}" alt="" />
								</a>
								<a href="#">
									<img src="{{ URL::asset('images/content/coins.png') }}" alt="" />
								</a>
							</div>
						</div>

						<div class="latest-news block">
							<div class="block-title">
								<h3>Latest News</h3>
							</div>
							<ul class="entries-list">
								<li class="clearfix">
									<a href="#" class="thumbnail">
										<img src="{{ URL::asset('images/content/coins.png') }}" alt="" />
									</a>
									<a href="#" class="entry-title">Lorem Ipsum</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>
								<li class="clearfix">
									<a href="#" class="thumbnail">
										<img src="{{ URL::asset('images/content/crayons.png') }}" alt="" />
									</a>
									<a href="#" class="entry-title">Dolor Sit Amet</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>
							</ul>
							<div class="one-image-banner">
								<a href="#">
									<img src="{{ URL::asset('images/content/handshake.png') }}" alt="" />
								</a>
							</div>
						</div>

					</div><!-- end of .sidebar-container -->