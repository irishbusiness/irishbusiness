<section class="section content boxed">

			<div class="search-wrapper clearfix">
				<div class="zone-search zone clearfix">

					<div class="search-container container-24">

						<div class="search block">
							<form id="default-search" class="default-search clearfix">
								<input type="text" id="search-what" class="text-input-black input-text" placeholder="What are you looking for?" />
								<input type="text" class="text-input-black input-text" placeholder="Where are you looking for it?" />
								<select id="category-selector-default" name="category-default" tabindex="1">
									<option value="">- Select Category -</option>
									<option value="airport">Airport</option>
									<option value="restaurant">Restaurant</option>
									<option value="shop">Shop</option>
									<option value="entertainment">Entertainment</option>
									<option value="realestate">Real Estate</option>
									<option value="sports">Sports</option>
									<option value="cars">Cars</option>
									<option value="education">Education</option>
									<option value="garden">Garden</option>
									<option value="mechanic">Mechanic</option>
									<option value="offices">Offices</option>
									<option value="advertising">Advertising</option>
									<option value="industry">Industry</option>
									<option value="postal">Postal</option>
									<option value="libraries">Libraries</option>
								</select>
								<input type="submit" class="submit" value="search" name="submit" />
							</form>
							<form id="advanced-search" class="advanced-search search-collapsed clearfix">
								<div class="clearfix">
									<label>Distance:</label>
									<div id="slider-distance" class="slider"></div>
									<div id="distance" class="slider-value"></div>
								</div>
								<div class="clearfix">
									<label>Rating:</label>
									<div id="slider-rating" class="slider"></div>
									<div id="rating" class="slider-value"></div>
								</div>
								<div class="clearfix">
									<label>Days Published:</label>
									<div id="slider-days-published" class="slider"></div>
									<div id="days-published" class="slider-value"></div>
								</div>
								<label>Location:</label>
								<div class="location-fields clearfix">
									<select id="country-selector-advanced" name="country-advanced" tabindex="1">
										<option value="">Country</option>
										<option value="airport">USA</option>
										<option value="restaurant">Canada</option>
										<option value="shop">England</option>
										<option value="entertainment">Italy</option>
										<option value="realestate">Poland</option>
										<option value="sports">Russia</option>
										<option value="cars">China</option>
										<option value="education">Japan</option>
										<option value="garden">Spain</option>
										<option value="mechanic">Switzerland</option>
										<option value="offices">Germany</option>
										<option value="advertising">India</option>
									</select>
									<input type="text" class="input-region text-input-black" placeholder="Region" />
									<input type="text" class="input-city text-input-black" placeholder="City" />
									<input type="text" class="input-zip-code text-input-black" placeholder="ZIP Code" />
									<input type="text" class="input-street-name text-input-black" placeholder="Street Name" />
									<input type="text" class="input-street-number text-input-black" placeholder="Street Number" />
								</div>
								<label>Industry:</label>
								<select id="category-selector-advanced" name="category-advanced" tabindex="1">
									<option value="">- Select -</option>
									<option value="airport">Airport</option>
									<option value="restaurant">Restaurant</option>
									<option value="shop">Shop</option>
									<option value="entertainment">Entertainment</option>
									<option value="realestate">Real Estate</option>
									<option value="sports">Sports</option>
									<option value="cars">Cars</option>
									<option value="education">Education</option>
									<option value="garden">Garden</option>
									<option value="mechanic">Mechanic</option>
									<option value="offices">Offices</option>
									<option value="advertising">Advertising</option>
									<option value="industry">Industry</option>
									<option value="postal">Postal</option>
									<option value="libraries">Libraries</option>
								</select>
								<div class="clearfix"></div>
								<div class="separator"></div>
								<input type="submit" class="submit" value="search" name="submit" />
							</form>
							<div class="advanced-search-control">
								<a href="#" id="advanced-search-button" class="advanced-search-button">Advanced Search</a>
							</div>
						</div>

					</div>

				</div><!-- end of .zone-search -->
			</div><!-- end of .search-wrapper -->

			<div class="map-wrapper">

				<div id="map" class="map"></div>

				<div class="hide-map-control">
					<a href="#" id="hide-map-button" class="hide-map-button map-expanded">Hide Map</a>
				</div>

			</div><!-- end of .map-wrapper -->

			<div class="industries-tabs-wrapper">
				<div class="zone-industries-tabs zone clearfix">

					<div class="industries-tabs-container container-24">

						<div id="industries-tabs" class="industries-tabs block">
							<ul class="clearfix">
								<li class="first active">
									<a href="#" id="airport" class="airport"></a>
								</li>
								<li class="">
									<a href="#" id="restaurant" class="restaurant"></a>
								</li>
								<li class="">
									<a href="#" id="shop" class="shop"></a>
								</li>
								<li class="">
									<a href="#" id="entertainment" class="entertainment"></a>
								</li>
								<li class="">
									<a href="#" id="realestate" class="realestate"></a>
								</li>
								<li class="">
									<a href="#" id="sports" class="sports"></a>
								</li>
								<li class="">
									<a href="#" id="cars" class="cars"></a>
								</li>
								<li class="">
									<a href="#" id="education" class="education"></a>
								</li>
								<li class="">
									<a href="#" id="garden" class="garden"></a>
								</li>
								<li class="">
									<a href="#" id="mechanic" class="mechanic"></a>
								</li>
								<li class="">
									<a href="#" id="offices" class="offices"></a>
								</li>
								<li class="">
									<a href="#" id="advertising" class="advertising"></a>
								</li>
								<li class="">
									<a href="#" id="industry" class="industry"></a>
								</li>
								<li class="">
									<a href="#" id="postal" class="postal"></a>
								</li>
								<li class="last">
									<a href="#" id="libraries" class="libraries"></a>
								</li>
							</ul>
						</div>

					</div>

				</div><!-- end of .zone-industries-tabs -->
			</div><!-- end of .industries-tabs-wrapper -->

			<div class="content-wrapper">
				<div class="zone-content equalize zone clearfix">

					<div class="content-container container-16">

						<div class="welcome block">
							<div class="block-title">
								<h1>Welcome</h1>
							</div>
							<div class="welcome-text">Welcome to GLOCAL, the best local directory that provides you with information coming from across the Globe.</div>
							<div class="welcome-globe clearfix">
								<img class="globe" src="images/globe.png" alt="" />
								<img class="globe-background" src="images/globe-background.png" alt="" />
								<a href="#" class="left edge top">RESTAURANTS</a>
								<a href="#" class="right edge top">MUSEUMS</a>
								<a href="#" class="left middle top">HOTELS</a>
								<a href="#" class="right middle top">SCHOOLS</a>
								<a href="#" class="left middle bottom">BARS & PUBS</a>
								<a href="#" class="right middle bottom">LIBRARIES</a>
								<a href="#" class="left edge bottom">SUPERMARKETS</a>
								<a href="#" class="right edge bottom">OFFICES</a>
							</div>
						</div>

						<div class="our-directory block">
							<div class="block-title">
								<h1>Our Directory</h1>
							</div>
							<form class="subscription-table">
								<div id="subscription-options">
									<div class="subscription-column">
										<div class="subscription-header">Step 1: <span class="text-colorful">Identify</span></div>
										<div class="subscription-body">
											You are a: <br />
											<div class="radio-buttons">
												<input type="radio" name="subscriber" value="advertiser" />Advertiser<br />
												<input type="radio" name="subscriber" value="local-business" />Local Business<br />
												<input type="radio" name="subscriber" value="global-business" />Global Business<br />
												<input type="radio" name="subscriber" value="other" />Other<br />
											</div>
										</div>
									</div>
									<div class="subscription-column">
										<div class="subscription-header">Step 2: <span class="text-colorful">Register</span></div>
										<div class="subscription-body">
											Login details: <br />
											<input type="text" class="text-input-grey" placeholder="Email" /><br />
											<input type="text" class="text-input-grey" placeholder="Password" /><br />
											<input type="text" class="text-input-grey" placeholder="Repeat Password" />
										</div>
									</div>
									<div class="subscription-column">
										<div class="subscription-header">Step 3: <span class="text-colorful">Subscribe</span></div>
										<div class="subscription-body">
											Choose Package: <br />
											<div class="radio-buttons">
												<input type="radio" name="subscription" value="silver" />Silver ($15/mo)<br />
												<input type="radio" name="subscription" value="gold" />Gold ($25/mo)<br />
												<input type="radio" name="subscription" value="platinum" />Platinum ($35/mo)
											</div>
										</div>
									</div>
								</div>
								<div class="subscription-footer">
									<div class="subscription-background">
										<div class="subscription-button-wrapper">
											<input type="submit" class="button-colorful" value="SUBSCRIBE" name="subscribe" />
										</div>
									</div>
								</div>
							</form>
						</div>

					</div><!-- end of .content-container -->

					<div class="sidebar-container container-8">

						<div class="recently-added block">
							<div class="block-title">
								<h3>Recently Added</h3>
							</div>
							<ul class="entries-list">
								<li class="clearfix">
									<a href="#" class="thumbnail">
										<img src="images/content/sky.png" alt="" />
									</a>
									<a href="#" class="entry-title">Company Name</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>
								<li class="clearfix">
									<a href="#" class="thumbnail">
										<img src="images/content/text.png" alt="" />
									</a>
									<a href="#" class="entry-title">Another Company</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>
							</ul>
							<div class="two-images-banner clearfix">
								<a href="#">
									<img src="images/content/crayons.png" alt="" />
								</a>
								<a href="#">
									<img src="images/content/coins.png" alt="" />
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
										<img src="images/content/coins.png" alt="" />
									</a>
									<a href="#" class="entry-title">Lorem Ipsum</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>
								<li class="clearfix">
									<a href="#" class="thumbnail">
										<img src="images/content/crayons.png" alt="" />
									</a>
									<a href="#" class="entry-title">Dolor Sit Amet</a>
									<div class="entry-excerpt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
								</li>
							</ul>
							<div class="one-image-banner">
								<a href="#">
									<img src="images/content/handshake.png" alt="" />
								</a>
							</div>
						</div>

					</div><!-- end of .sidebar-container -->

				</div><!-- end of .zone-content -->
			</div><!-- end of .content-wrapper -->

			<div class="partners-wrapper">
				<div class="zone-partners zone clearfix">

					<div class="partners-container container-24">

						<div class="partners block">
							<div class="block-title background-white">
								<h4>OUR PARTNERS</h4>
							</div>
							<a href="http://www.themeforest.net" class="partner">
								<img src="images/content/themeforest.png" alt="" />
							</a>
							<a href="http://www.activeden.net" class="partner">
								<img src="images/content/activeden.png" alt="" />
							</a>
							<a href="http://www.audiojungle.net" class="partner">
								<img src="images/content/audiojungle.png" alt="" />
							</a>
							<a href="http://www.graphicriver.net" class="partner">
								<img src="images/content/graphicriver.png" alt="" />
							</a>
							<a href="http://www.codecanyon.net" class="partner">
								<img src="images/content/codecanyon.png" alt="" />
							</a>
							<a href="http://www.3docean.net" class="partner">
								<img src="images/content/3docean.png" alt="" />
							</a>
							<a href="http://www.videohive.net" class="partner">
								<img src="images/content/videohive.png" alt="" />
							</a>
						</div>

					</div>

				</div><!-- end of .zone-partners -->
			</div><!-- end of .partners-wrapper -->

			<div class="interlayer"></div>
		</section>