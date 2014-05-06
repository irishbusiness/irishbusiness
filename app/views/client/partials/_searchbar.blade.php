			<div class="search-wrapper clearfix">
				<div class="zone-search zone clearfix">
					<div class="search-container container-24">
						<div class="search block">
								{{ Form::open(array('action' => 'BusinessesController@search','id' =>'default-search', 'class' => 'default-search clearfix')) }}
								{{ Form::text('category',isResult(Session::get('category')), ["placeholder" => "What are you looking for?", 'id' => 'search-what', 'class' => 'text-input-black input-text']) }}
								{{ Form::text('location',isResult(Session::get('location')), ["placeholder" => "Where are you looking for it?", 'id' => 'search-what', 'class' => 'text-input-black input-text']) }}
							
								<select id="category-selector-default" name="category-default" tabindex="1">
									<option   value="">- Select Category -</option>
									<option {{isSelected("airport",$selected)}} value="airport">Airport</option>
									<option {{isSelected("restaurant",$selected)}} value="restaurant">Restaurant</option>
									<option {{isSelected("shop",$selected)}} value="shop">Shop</option>
									<option {{isSelected("entertainment",$selected)}} value="entertainment">Entertainment</option>
									<option {{isSelected("realestate",$selected)}} value="realestate">Real Estate</option>
									<option {{isSelected("sports",$selected)}} value="sports">Sports</option>
									<option {{isSelected("cars",$selected)}}value="cars">Cars</option>
									<option {{isSelected("education",$selected)}} value="education">Education</option>
									<option {{isSelected("garden",$selected)}} value="garden">Garden</option>
									<option {{isSelected("mechanic",$selected)}}value="mechanic">Mechanic</option>
									<option {{isSelected("offices",$selected)}} value="offices">Offices</option>
									<option {{isSelected("advertising",$selected)}} value="advertising">Advertising</option>
									<option {{isSelected("industry",$selected)}} value="industry">Industry</option>
									<option {{isSelected("postal",$selected)}} value="postal">Postal</option>
									<option {{isSelected("libraries",$selected)}} value="libraries">Libraries</option>
								</select>
								<input type="submit" class="submit" value="search" name="submit" />
							</form>
						</div>
					</div>
				</div><!-- end of .zone-search -->
			</div><!-- end of .search-wrapper -->