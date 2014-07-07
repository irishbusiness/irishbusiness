			<div class="search-wrapper clearfix">
				<div class="zone-search zone clearfix">
					<div class="search-container container-24">
						<div class="search block">
								{{ Form::open(array('action' => 'BusinessesController@search','id' =>'default-search', 'class' => 'default-search clearfix', 'method' => 'get')) }}
								{{ Form::text('category',isResult(Session::get('category')), ["placeholder" => "What are you looking for?", 'id' => 'search-what', 'class' => 'text-input-black input-text']) }}
								{{ Form::text('location',isResult(Session::get('location')), ["placeholder" => "Where are you looking for it?", 'id' => 'search-what', 'class' => 'text-input-black input-text']) }}
							
								<select id="category-selector-default" name="category-default" tabindex="1">
									<option   value="">- Select Category -</option>
									@foreach($header_categories as $header_category)
										<!-- <option value="{{ strtolower($header_category->name) }}" {{isSelected("strtolower($header_category->name)",$selected)}}>{{ ucwords($header_category->name) }}</option> -->
									@endforeach
								</select>
								<input type="submit" class="submit" value="search" name="submit" />
							</form>
						</div>
					</div>
				</div><!-- end of .zone-search -->
			</div><!-- end of .search-wrapper -->