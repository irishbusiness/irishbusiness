			<div class="search-wrapper clearfix">
				<div class="zone-search zone clearfix">
					<div class="search-container container-24">
						<div class="search block">
							<form id="default-search" class="default-search clearfix">
								<input type="text" id="search-what" class="text-input-black input-text" placeholder="What are you looking for?" />
								<input type="text" class="text-input-black input-text" placeholder="Where are you looking for it?" />
								<select id="category-selector-default" name="category-default" tabindex="1">
									<option value="">- Select Category -</option>
									@foreach($categories as $category)
										<option value="{{ strtolower($category->name) }}">{{ ucwords($category->name) }}</option>
									@endforeach
								</select>
								<input type="submit" class="submit" value="search" name="submit" />
							</form>
						</div>
					</div>
				</div><!-- end of .zone-search -->
			</div><!-- end of .search-wrapper -->