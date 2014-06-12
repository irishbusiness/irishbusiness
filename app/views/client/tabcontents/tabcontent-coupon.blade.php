     <div id="company-tabs-coupon" class="company-tabs-content">
        <div class="portfolio-container container-24">
        @if(isOwner($branch->business->slug))
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
			                        <img src="" id="img-render-filecoupon">
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
			            <div class="preview" style="height: auto;">
			                <img src="{{ Request::root().'/'}}scripts/server-side.php" />
			            </div>
			                
			            <form id="realtime-form" action="{{ Request::root() }}/scripts/save-coupon.php" method="post">
			                <fieldset>
			                    <legend>Coupon Generator</legend>
			                    <ol>
			                        <li class="left">
			                            <fieldset>
			                                <ol>
			                                    <li>
			                                        <label for="company-name">Text 1:</label>
			                                        <input type="text" id="company-name" name="companyName" value="SALE UPTO 70% DISCOUNT" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="company-slogan">Text 2:</label>
			                                        <input type="text" id="company-slogan" name="companySlogan" value="GREAT SAVINGS!" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="business-address">Business address</label>
			                                        <textarea id="business-address" name="businessAddress" class="text-input-grey three-fourth" >{{str_toAddress($branch->address)}}</textarea>
			                                    </li>
			                                </ol>
			                            </fieldset>
			                        </li>
			                        <li class="right">
			                            <fieldset>
			                                <legend class="accessibility">Contact Information and Description</legend>
			                                <ol>
			                                    <li>
			                                        <label for="full-name">Company name:</label>
			                                        <input type="text" id="full-name" name="fullName" value="{{ decode($branch->business->name) }}" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="job-title">Company description</label>
			                                        <input type="text" id="job-title" name="jobTitle" value="{{ decode($branch->business->business_description) }}" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="primary-phone">Primary phone</label>
			                                        <input type="text" id="primary-phone" name="phoneOne" value="P: 954-555-1234" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="secondary-phone">Secondary phone</label>
			                                        <input type="text" id="secondary-phone" name="phoneTwo" value="P: 954-555-5678" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="email-address">Email address</label>
			                                        <input type="text" id="email-address" name="emailAddress" value="john@company.com" class="text-input-grey three-fourth" />
			                                    </li>
			                                    <li>
			                                        <label for="web-address">Web address</label>
			                                        <input type="text" id="web-address" name="siteUrl" value="{{ Request::root().'/company/'.$branch->business->slug.'/'.$branch->id }}" class="text-input-grey three-fourth" />
			                                    </li>
			                                </ol>
			                            </fieldset>
			                        </li> 
			                    </ol>
			                </fieldset>
			                <a id="savecoupon" href="javascript:void(0)" class="a-btn button-2-colorful">Submit</a>

			            </form>
			            <div id="link">
			                <input type="text" value="" id="resultsUrl" />
			            </div>
			        </div>
			    </div>
		@endif
		@if(count($coupons))
		<div id="show-hide-coupon-lists-div">
			<a href="javascript:void(0)" class="" id="show-hide-coupons-list">- Hide Coupons</a>
		</div>
			<div id="coupons-list" class="">
            @foreach($coupons as $coupon)
			
					<div class="coupon-row">
						@if(isOwner($branch->business->slug))
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
						  <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ URL::asset($coupon->name) }}&source=IrishBusiness.ie&title=Deal+Voucher+Coupon" class="share linkedin">
						    Share on LinkedIn
						  </a>
						</p>
						<div class="separator"></div>
					</div>
			   
            @endforeach
            </div>

        @else
            <p>Nothing to show here...</p>
        @endif
</div>
    </div>
         @section('scripts')
	        <script>
	        	$(document).on("click", ".delete-coupon", function(){
	        		var id = $(this).attr("data-id");
	        		var token = $("input[name='_token']").val();
	        		var c = confirm("Are you sure to delete this coupon?");
	        		if( c == true ){
	        			$.ajax({
	        				url: "/ajaxDeleteCoupon",       
							type: "post",
							data: { coupon: id, _token: token},
							beforeSend: function(){
								$(".delete-coupon[data-id='"+id+"']").text("Deleting...");
							}
	        			}).done(function(data){
	        				$(".delete-coupon[data-id='"+id+"']").text(data);
	        				$(".delete-coupon[data-id='"+id+"']").parent("div.coupon-row").fadeOut(function(){
	        					$(".delete-coupon[data-id='"+id+"']").remove();
	        				});
	        			});
	        		}
	        	});

	            $("#savecoupon").on("click", function(e){
	                e.preventDefault();

	                console.log($("#realtime-form").serialize());
	                var token = $("input[name='_token']").val();
	                $(this).text("Processing...");
	                $.ajax({
	                   type: "POST",
	                   url: "/ajaxSaveCoupon?_token="+token+"&b={{ $branch->business->id }}"+"&br={{ $branch->id }}",
	                   data: $("#realtime-form").serialize(), // serializes the form's elements.
	                   success: function(data)
	                   {	
	                   		$("#savecoupon").text("Submit");
	                      	location.reload();
	                   }
	                 });

	            });

	            $("#upload-own-coupon").click(function(e){
	                e.preventDefault();
					$(this).fadeOut();
					$("#coupon-generator").fadeOut();
                    $("#form-upload-coupon").fadeIn();
	            });

	            $(document).on("click", "#cancel-upload-own-coupon", function(){
                	$("#upload-own-coupon").fadeIn();
                	$("#coupon-generator").fadeIn();
                    $("#form-upload-coupon").fadeOut();
	            });

	            $(document).on("click", "#btn-add-coupon", function(){
	            	if( $("#coupon-manage").attr("class") == "invisible" ) {
	            		$(this).html("Close");
	            		$("#coupon-manage").fadeIn(function(){
	            			$("#coupon-manage").attr("class", "");
	            		});
	            	}else{
	            		$(this).html("Add new coupon");
	            		$("#coupon-manage").fadeOut(function(){
	            			$("#coupon-manage").attr("class", "invisible");
	            		});
	            	}
	            });

	            $(document).on("click", "#show-hide-coupons-list", function(){
	            	if($("#coupons-list").attr("class") == "invisible"){
	            		$(this).html("- Hide Coupons");
	            		$("#coupons-list").fadeIn(function(){
	            			$("#coupons-list").attr("class", "");
	            		});
	            	}else{
	            		$(this).html("+ Show Coupons");
	            		$("#coupons-list").fadeOut(function(){
	            			$("#coupons-list").attr("class", "invisible");
	            		});
	            	}
	            });
	        </script>
	    @stop

			