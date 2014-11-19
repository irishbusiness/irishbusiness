 <div id="company-tabs-coupon" class="company-tabs-content">
    <div class="portfolio-container container-24">
        @if( isOwner($branch->business->slug) || isAdmin() )

            <a href="javascript:void(0)" id="btn-add-coupon" class="a-btn button-2-colorful add-coupon">Add new coupon</a>
			    <div id="coupon-manage" class="invisible">
			        <div>
			            <a href="javascript:void(0)" id="upload-own-coupon">Upload your own coupon</a>
			        </div>
			        <div id="form-upload-coupon" style="display: none;">
			            {{ Form::open(array('action' => 'BusinessesController@save_coupon', 'files' => true )) }}
			                <div class="form-group">
			                    {{ Form::label("filecoupon", "Upload your coupon", ["class"=>"text-colorful"]) }}
			                    {{ Form::file('filecoupon', ["id"=>"btn-filecoupon-settings-logo"]) }}
			                    <div class="render-logo-preview">
			                        <img src="{{ URL::asset('/images/image-not-available.png') }}" id="img-render-filecoupon">
			                    </div>
			                </div>
			                <div class="form-group">
			                    {{ Form::hidden("b", $branch->business->id) }}
			                    {{ Form::hidden("br", $branch->id) }}
			                    <a href="javascript:void(0)" class="a-btn button-2-colorful" id="cancel-upload-own-coupon">Cancel</a>
			                    {{ Form::submit("Save", ["id"=>"btn-submit-own-coupon", "class"=>"button-2-colorful"]) }}
			                </div>
			            {{ Form::close() }}
			        </div>
			        <div id="coupon-generator">
			        	<div class="coupon-generator-handler">
			        		<div class="coupon-image-handler" id="coupon-image-handler">
			        			<div class="coupon-companylogo draggable resizable">
			        				<img src="{{ URL::asset($branch->business->logo) }}">
			        			</div>
			        			<p class="draggable" id="coupon_business_name">
			        				{{ decode($branch->business->name) }}
			        				<span class="coupon_removetxt" title="remove text">x</span>
			        			</p>
			        			<p class="draggable" id="coupon_business_address">
			        				{{ showAddressfull($branch->address) }}
			        				<span class="coupon_removetxt" title="remove text">x</span>
			        			</p>
			        			<p class="draggable" id="coupon_business_phone">
			        				{{ $branch->phone }}
			        				<span class="coupon_removetxt" title="remove text">x</span>
			        			</p>
			        			<p class="draggable" id="coupon_offer" title="Click to customize this text.">
			        				5% OFF<span class="coupon_removetxt" title="remove text">x</span>
			        			</p>
			        			<p class="draggable" title="Click to customize this text." id="coupon_fineprint">
			        				Coupon must be used in full at time of transaction. This is a one-time use coupon. 
			        				Attempting to duplicate or reuse a coupon is considered fraud.
			        				Cannot be combined with other offers.
			        				<span class="coupon_removetxt" title="remove text">x</span></p>
			        			</p>
			        			<p class="draggable" id="coupon_validityperiod">
			        				Coupon Offer Expires 
			        				<span class="coupon_removetxt" title="remove text">x</span></p>
			        			</p>
			        		</div>
			        	</div>
			        	<div class="add-text">
			        		<div class="coupon-inner-functions">
			        			<div class="form-group">
				        			<label>Add Text</label>
					        		<textarea id="add-text" class="autosize"></textarea>
					        		<input type="hidden" id="current_text_selected">	
					        		<a href="javascript:void(0);" id="btn_addtext">Add</a>
					        	</div>
					        	<div class="form-group">
					        		<label>Edit Text</label>
					        		<textarea id="edit-text" class="autosize"></textarea>
				        		</div>
				        		<div class="form-group">
				        			<label>Font Size</label>
					        		<select name="coupon_fontsize" id="coupon_fontsize">
				        			<?php 
				        				for ($x=1; $x < 150; $x++) { 
				        					if($x==20){
				        						echo '<option value="'.$x.'" selected>'.$x.'</option>';
				        					}else{
				        						echo '<option value="'.$x.'">'.$x.'</option>';
				        					}
				        				}
				        			?>
					        		</select>
					        	</div>
					        	<div class="form-group">
					        		<label>Font Style</label>
					        		<select id="coupon_fontstyle">
					        			<option value="normal">normal</option>
					        			<option value="italic">italic</option>
					        			<option value="oblique">oblique</option>
					        			<option value="bold">bold</option>
					        			<option value="bolder">bolder</option>
					        		</select>
					        	</div>
					        	<div class="form-group">
					        		<label>Font Color</label>
					        		<select id="coupon_fontcolor">
					        			<option value="aqua">aqua</option>
					        			<option value="black" selected>black</option>
					        			<option value="blue">blue</option>
					        			<option value="fuchsia">fuchsia</option>
					        			<option value="gray">gray</option>
					        			<option value="green">green</option>
					        			<option value="lime">lime</option>
					        			<option value="maroon">maroon</option>
					        			<option value="navy">navy</option>
					        			<option value="olive">olive</option>
					        			<option value="orange">orange</option>
					        			<option value="purple">purple</option>
					        			<option value="red">red</option>
					        			<option value="silver">silver</option>
					        			<option value="teal">teal</option>
					        			<option value="white">white</option>
					        			<option value="yellow">yellow</option>
					        		</select>
				        		</div>
				        		<div class="form-group">
				        			<label>Font Family</label>
					        		<select id="coupon_fontfamily">
					        			<option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
					        			<option value='"Arial Black", Gadget, sans-serif'>"Arial Black", Gadget, sans-serif</option>
					        			<option value='"Comic Sans MS", cursive, sans-serif'>"Comic Sans MS", cursive, sans-serif</option>
					        			<option value='"Courier New", Courier, monospace'>"Courier New", Courier, monospace</option>
					        			<option value="Georgia, serif">Georgia, serif</option>
					        			<option value="Impact, Charcoal, sans-serif">Impact, Charcoal, sans-serif</option>
					        			<option value='"Lucida Console", Monaco, monospace'>"Lucida Console", Monaco, monospace</option>
					        			<option value='"Lucida Sans Unicode", "Lucida Grande", sans-serif'>"Lucida Sans Unicode", "Lucida Grande", sans-serif</option>
					        			<option value='"Palatino Linotype", "Book Antiqua", Palatino, serif'>"Palatino Linotype", "Book Antiqua", Palatino, serif</option>
					        			<option value="Patua One">Patua One</option>
					        			<option value='"Times New Roman", Times, serif'>"Times New Roman", Times, serif</option>
					        			<option value="Tahoma, Geneva, sans-serif">Tahoma, Geneva, sans-serif</option>
					        			<option value='"Trebuchet MS", Helvetica, sans-serif'>"Trebuchet MS", Helvetica, sans-serif</option>
					        			<option value="Verdana, Geneva, sans-serif">Verdana, Geneva, sans-serif</option>
					        		</select>
					        	</div>
					        	<div class="form-group">
					        		<label>Expiry Date</label>
					        		<input type="text" name="expires_at" class="datepicker" readonly>
				        		</div>
				        		<div class="form-group">
				        			<label>Change Background Color</label>
					        		<p id="colorpickerHolder"></p>
				        		</div>			
				        		<div class="form-group">
				        			<button class="button-2-colorful" id="btn_coupon_save">Save</button>
				        		</div>
			        		</div>
			        		<br/>       		
			        	</div>
			        </div>
			    </div>
			    <br/>
		@endif
		@if(count($coupons))
			<div id="coupons-list" class="">
			<br/>
            @foreach($coupons as $coupon)
			
					<div class="coupon-row">
						@if( isOwner($branch->business->slug) || isAdmin() )
						 	<a href="javascript:void(0)" data-id="{{ $coupon->id }}" class="delete-coupon">Delete this coupon</a>
						@endif
						<img src="{{ URL::asset($coupon->name) }}" alt="coupon">

						<p>
						  <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::asset($coupon->name) }}" class="share facebook">
						    Share on Facebook
						  </a>
						</p>
						<p>
						  <a href="https://twitter.com/intent/tweet?url={{ URL::asset($coupon->name) }}" class="share twitter">
						    Share on Twitter
						  </a>
						</p>
						<p>
						  <a href="https://plus.google.com/share?url={{ URL::asset($coupon->name) }}" class="share google">
						    Share on Google+
						  </a>
						</p>
						<p>
						  <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ URL::asset($coupon->name) }}&source=IrishBusiness.ie" class="share linkedin">
						    Share on LinkedIn
						  </a>
						</p>
						<div class="separator"></div>
					</div>
			   
            @endforeach
            </div>
        @endif
	</div>
</div>
			