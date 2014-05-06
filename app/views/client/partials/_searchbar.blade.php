			<div class="search-wrapper clearfix">
				<div class="zone-search zone clearfix">
					<div class="search-container container-24">
						<div class="search block">
								{{ Form::open(array('action' => 'BusinessesController@search','id' =>'default-search', 'class' => 'default-search clearfix')) }}
								{{ Form::text('category',isResult(Session::get('category')), ["placeholder" => "What are you looking for?", 'id' => 'search-what', 'class' => 'text-input-black input-text']) }}
								{{ Form::text('location',isResult(Session::get('location')), ["placeholder" => "Where are you looking for it?", 'id' => 'search-what', 'class' => 'text-input-black input-text']) }}
							
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
						</div>
					</div>
				</div><!-- end of .zone-search -->
			</div><!-- end of .search-wrapper -->