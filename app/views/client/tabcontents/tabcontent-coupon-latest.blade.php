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
			        		<div class="coupon-image-handler"></div>
			        	</div>
			        	<div class="add-text">
			        		<label>Canvas</label>
			        		<input type="text" id="coupon_canvas_width" value="278" maxlength="3" size="2" placeholder="width">
			        		x
			        		<input type="text" id="coupon_canvas_height" value="368" maxlength="3" size="2" placeholder="height">
			        		<br/>
			        		<label>Add Text</label>
			        		<input type="text" id="add-text">
			        		<a href="javascript:void(0);" class="a-btn button-2-colorful" id="btn_addtext">Add</a>
			        		<br/>
			        		<label>Change Background Color</label>
			        		<p id="colorpickerHolder"></p>			        		
			        	</div>
			        </div>
			    </div>
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
			