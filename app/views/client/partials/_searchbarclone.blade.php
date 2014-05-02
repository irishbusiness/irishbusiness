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


			<div class="interlayer"></div>
		</section>