<div id="company-tabs-page" class="company-tabs-content">
	<div class="edit-company">
		@if( isOwner($branch->business->slug) || isAdmin() )
			<!-- <a id="editbusiness-link" href="#{{ Request::root().'/edit/business/'.$branch->business->slug.'/'.$branch->branchslug }}">
				Edit your business
			</a> | 
			<a href="javascript:void(0)" title="Delete this business" id="btn-delete-business">Delete business</a> -->
		@endif
	</div>
	<div class="sidebar-container container-8 show" id="tabs-sidebar">
		<div class="company-page-map">
			<div class="company-page-map-container">
				<div id="company-page-map">
				
				</div>
			</div>
		</div>
		<div class="contact-details company-page-block">
			<div class="block-title">
				<h3>Contact Details</h3>
			</div>
			<table class="company-address">
				<tbody>
					<tr class="detail">
						<td class="detail-label"> Name </td>
						<td class="detail">
							{{ decode($branch->business->name) }}
						</td>
					</tr>
					<tr class="detail">
						<td class="detail-label">
							Full Address
						</td>
						<td class="detail">
							{{ showAddressfull($branch->address) }}
							
						</td>
					</tr>
					<tr class="detail">
						<td class="detail-label"> Phone </td>
						<td class="detail"> {{ $branch->phone }} </td>
					</tr>
					<tr class="detail">
						<td class="detail-label"> Website </td>
						<td class="detail">
							<a href="{{ filter_var($business->website, FILTER_VALIDATE_URL)? $branch->website : 'http://'.$branch->website }}" class="text-green" target="_blank">{{ $branch->website }}</a>
						</td>
					</tr>
					<tr class="detail">
						<td class="detail-label"> E-mail </td>
						<td class="detail">
							<a href="mailto:{{ $branch->email }}" class="text-green">{{ $branch->email }}</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="opening-hours company-page-block">
			<div class="block-title">
				<h3>Opening Hours</h3>
			</div>
			<table>
				<tbody>
					<tr class="detail">
						<td class="detail opening-hours" colspan="2">{{ WeekDaystoStrong(decode($branch->mon_fri)) }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="share-this company-page-block">
			<div class="block-title">
				<h3>Share This Listing</h3>
			</div>
			<ul>
				<li><a href="#" class="facebook" onclick="share_FB();"></a></li>
				<li><a href="#" class="twitter" onclick="share_TW();"></a></li>
				<li><a href="#" class="google" onclick="share_GP();"></a></li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="latest-news block">
			<div class="one-image-banner">
				<a href="#">
				<img src="{{ URL::asset('/images/sidebar_banner.png') }}" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- end of .company-sidebar-container -->

	<div class="company-content-container container-16 margin-18">
		<div class="company-tabs-single-company block">
		<div class="block-title">
			<h1>{{ decode($branch->business->name) }}</h1>
		</div>
			@if(!$branch->business->profilebanner == "")
				<div class="photo">
				<div class="company-photo-container profile-description-img-thumbnail">
					<img src="{{ URL::asset($branch->business->profilebanner) }}">
				</div>
				</div>
			@endif
			<!-- <div class="company-info clearfix">
				<div class="company-info-social">
					<div class="compnay-photo">
						<img width="500" height="302" src="{{ URL::asset($branch->business->logo) }}" class="attachment-post-thumbnail wp-post-image" alt="{{ $branch->business->name }}-logo">
					</div>
					@if(!is_null(trim($branch->facebook)))
					<a href="{{ $branch->facebook }}" class="facebook" target="_blank"></a>
					@endif
					@if(!is_null(trim($branch->facebook)))
					<a href="{{ $branch->twitter }}" class="twitter" target="_blank"></a>
					@endif
					@if(!is_null(trim($branch->facebook)))
					<a href="{{ $branch->google }}" class="google" target="_blank"></a>
					@endif
				</div> -->
				<!-- <div class="company-info-description">
					{{ html_entity_decode(stripcslashes($branch->business->business_description)) }}
				</div> -->
			<!-- </div> -->
		</div>
		<div class="separator"></div>
		<div class="profile-description company-page-center-block">
			<h2>Profile Description</h2>
			<div class="block-content">
				{{ decode($branch->business->business_description) }}
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="separator"></div>
		<div class="range-of-services company-page-center-block">
			<div class="divkeywords">
				<h2>Keywords</h2>
			</div>
			<div class="block-content">
				<ul>
					<?php 
						$keywords = $branch->business->keywords;
						$arr = explode(",", $keywords);
						foreach ($arr as $keyword) {
							if( trim($keyword) != "" ){
								echo "<li>".$keyword."</li>";
							}
						}
					?>
				</ul>
				<div class="clear">
				</div>
			</div>
		</div>
		<div class="thin-separator"></div>
		<div class="range-of-services company-page-center-block">
			<div class="divlocations">
				<h2>Locations Served</h2>
			</div>
			<div class="block-content">
				<ul>
					<?php 
						$locations = $branch->locations;
						$arr = explode(",", $locations);
						foreach ($arr as $location) {
							if( trim($location) != "" ){
								echo "<li>".$location."</li>";
							}
						}
					?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<div class="separator"></div>
		<div class="comment-message block">
			<div id="uou-stars-system" class="rating-system" data-post-id="362">
				<div class="comment-respond">
					<h3 class="comment-reply-title" id="reply-title"><span class="comment-message-title your-rating">Your <span class="text-green">Rating</span></span></h3>
					<div class="rating-send">
						@if (Auth::user()->guest())
							{{ Form::open(array('action' => array('ReviewsController@store', $branch->business->id), "id"=>"form-review", 'method'=>'post')) }}
							<div class="rating-inputs">
								<div class="rating-details">
									<div class="detail">
										{{ Form::text("rating-name", "", ["id"=>"rating-name", "placeholder"=>"Name", "class"=>"text-input-grey one fourth", "required"=>"required"]) }}
									</div><br/>
									<div class="detail">
										{{ Form::email("rating-email", "", ["id"=>"rating-email", "placeholder"=>"Email (this will not be published)", "class"=>"text-input-grey one fourth", "required"=>"required"]) }}
									</div>
									<div class="detail">
										{{ Form::textarea("rating-description", "", ["id"=>"rating-description", "rows"=>"8", "cols"=>"45", 
											"placeholder"=>"Description", "class"=>"text-input-grey comment-message-main one-fourth", "required"=>"required"]) }}
									</div>
									<div class="detail">
					                    {{ Form::label('captcha', "What is the capital of Ireland?", ["class" => "text-colorful"]) }}
					                    {{ Form::text('captcha', '', ["required"=>"required", "class"=>"text-input-grey",
					                        "placeholder"=>"What is the capital of Ireland?", "title" => "Prove to us you're not a robot."]) }}
					                    {{$errors->first('captcha','<span id="errorcaptcha" class="alert-error2">:message</span>')}}
					                </div><br/>
									{{ Form::hidden("br", $branch->branchslug) }}
									{{ Form::input("submit", "submit", "Send rating", ["class"=>"send-rating button-2-green", "id"=>"btn-submit-rating"]) }}
								</div>
								<div class="ratings">
									<div class="rating clearfix already" data-rating-id="1" data-rated-value="0"><div class="rating-title">Rating</div>
										<div class="stars clearfix">
											<div class="rating-stars star" data-rated="false" data-star-id="1"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="2"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="3"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="4"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="5"></div>
										</div>
									</div>
								</div>
							</div>
							{{ Form::input("hidden", "rating", "", ["id"=>"fi-rating"]) }}
							{{ Form::close() }}
						@elseif(!isOwner($branch->business->slug))
							{{ Form::open(array('action' => array('ReviewsController@store', $branch->business->id), "id"=>"form-review", 'method'=>'post')) }}
							<div class="rating-inputs">
								<div class="rating-details">
									<div class="detail">
										{{ Form::text("rating-name", "", ["id"=>"rating-name", "placeholder"=>"Name", "class"=>"text-input-grey one fourth", "required"=>"required"]) }}
									</div>
									<div class="detail">
										{{ Form::textarea("rating-description", "", ["id"=>"rating-description", "rows"=>"8", "cols"=>"45", 
											"placeholder"=>"Description", "class"=>"text-input-grey comment-message-main one-fourth", "required"=>"required"]) }}
									</div>
									<div class="detail">
					                    {{ Form::label('captcha', "What is the capital of Ireland?", ["class" => "text-colorful"]) }}
					                    {{ Form::text('captcha', '', ["required"=>"required", "class"=>"text-input-grey",
					                        "placeholder"=>"What is the capital of Ireland?", "title" => "Prove to us you're not a robot."]) }}
					                    {{$errors->first('captcha','<span id="errorcaptcha" class="alert-error2">:message</span>')}}
					                </div><br/>
									{{ Form::hidden("br", $branch->branchslug) }}
									{{ Form::input("submit", "submit", "Send rating", ["class"=>"send-rating button-2-green", "id"=>"btn-submit-rating"]) }}
								</div>
								<div class="ratings">
									<div class="rating clearfix already" data-rating-id="1" data-rated-value="0"><div class="rating-title">Rating</div>
										<div class="stars clearfix">
											<div class="rating-stars star" data-rated="false" data-star-id="1"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="2"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="3"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="4"></div>
											<div class="rating-stars star" data-rated="false" data-star-id="5"></div>
										</div>
									</div>
								</div>
							</div>
							{{ Form::input("hidden", "rating", "", ["id"=>"fi-rating"]) }}
							{{ Form::close() }}
						@else
							@if(count($reviews)>0)
								<a href="javascript:void(0)" class="a-btn button-2-colorful" id="linkReview">View Reviews</a>
							@else
								<h3>No Reviews</h3>
							@endif
						@endif
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of .company-content-container -->

@section('scripts')
	<script>
		$("#form-review").on("submit", function(e){
			var self = $(this);
			// e.preventDefault();
			var btnsubmit = $("#btn-submit-rating");
			disable(btnsubmit);

			var des = $.trim($("#rating-description").val());
			var name = $.trim($("#rating-name").val());

			var max = 2;

			if( $("#rating-email").length > 0 ){
				max = 3;
				var email = $.trim($("#rating-email").val());
			}	

			var validate = 0;
			if( des != "" && des != null && des != undefined ){
				validate++;
			}else{
				alert("Please provide a description.");
				enable(btnsubmit);
			}

			// console.log(validate);

			if( name != "" && name != null && name != undefined ){
				validate++;
			}else{
				alert("Please provide your name.");
				enable(btnsubmit);
			}

			// console.log(validate);

			if(  max === 3 ){
				if( email != "" && email != null && email != undefined ){
					validate++;
				}else{
					alert("Please provide your email.");
					enable(btnsubmit);
				}
			}

			// console.log("max="+max);
			// console.log("v="+validate);
			if( validate === max ){
				self.submit();
				// return true;
			}else{
				e.preventDefault();
				// return false;
				e.preventDefault();
				enable(btnsubmit);
			}

		});

		function disable(el){
			$(el).attr("disabled", "disabled");
		}

		function enable(el){
			$(el).removeAttr("disabled");
		}

		$(document).on("click", "#btn-delete-business", function(){
			var id = "{{ $branch->business->id }}";
			var token = $("input[name='_token']").val();
			var c = confirm("Are you sure you want to delete this business?");
			if( c == true ){
				var c2 = confirm("Are you really sure? This action can not be undone.");
				if( c2 == true ){
					$.ajax({
						url: "/ajaxDeleteBusiness",
						type: "post",
						data: {id: id, _token: token}
					}).done(function(data){
						if(data == "false"){
							console.log("Unable to delete this time.");
						}else{
							console.log("Business has been successfully deleted.");
							alert("Business has been successfully deleted.");
							window.location = "{{ Request::root() }}";
						}
					});
				}
			}
		});

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