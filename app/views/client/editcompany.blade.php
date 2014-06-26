@extends("client.layouts.default")

@section("actual-body-content")
	<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
	    <div class="portfolio-container container-24">

	        <div class="blog-post block">
	            <div class="block-title">
	                <h1>Edit Business</h1>
	            </div>
	        </div>
	        {{ Form::open(array('action' => ['BusinessesController@update', $branch->business->slug, $branch->id], 'files' => true)) }}
		   
		    <div class="thin-separator"></div>
		    <div id="update-business-settings" class="">  
			     <div class="form-group">
			        {{ Form::label('profilebanner', "Profile Banner",
			        ["class"=>"text-colorful"]) }}<br/>
			        <br>
			        {{ Form::file('profilebanner', ["id"=>"btn-business-settings-profilebanner"]) }}
			        {{$errors->first('profilebanner','<span class="alert alert-error block half">:message</span>')}}
			        <div class="render-logo-preview">
			            <img src="{{ isset($businessinfo->profilebanner) ? '/'.$businessinfo->profilebanner : '' }}" id="img-render-profilebanner">
			        </div>
			    </div>
		        <div class="form-group">
		            {{ Form::label('name', 'Business Name', ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('name', decode($businessinfo->name), [
		            	"placeholder" => "your business", "class"=>"text-input-grey full", 'required']) }}
		            {{$errors->first('name','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('logo', "Logo",
		            ["class"=>"text-colorful"]) }}<br/>
		            <br>
		            {{ Form::file('logo', ["id"=>"btn-business-settings-logo"]) }}
		            {{$errors->first('logo','<span class="alert alert-error block half">:message</span>')}}
		            <div class="render-logo-preview">
		                <img src="{{ URL::asset('/'.$businessinfo->logo) }}" id="img-render-logo">
		            </div>
		        </div>

		        <div class="thin-separator"></div>
		        <div class="form-group">
		            {{ Form::select('categories', $categories, "", ['id' => 'categories',
		            'class' => 'text-input-grey full']) }}
		        </div>
		        <div class="form-group">
		            <div class="showCategory">
		            	@foreach($selected_categories as $key => $val)
		            		<span data-id="{{ $val['id'] }}" class="bs-btn btn-success category">
		            			{{ $val["name"] }}
		            			<span class="remove" data-id="{{ $val['id'] }}" data-text="{{ $val['name'] }}" title="remove this category">x</span>
		            		</span>
		            	@endforeach
		            </div>
		        </div>

		        <div class="thin-separator"></div>
		        <div class="form-group">
		            {{ Form::hidden('slug', $businessinfo->slug, [
		            "placeholder" => "your-business-name", "class"=>"text-input-grey full", 'required']) }}
		            {{$errors->first('slug','<span class="alert alert-error block half">:message</span>')}}
		        </div>

		        <div class="thin-separator"></div>
		        <div class="form-group">
		            {{ Form::label('keywords', "Keywords (please separate keywords by a comma.)",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('keywords', $businessinfo->keywords, [
		            	"placeholder" => "office, airplane, house", "class"=>"text-input-grey full", 'required']) }}
		            {{$errors->first('keywords','<span class="alert alert-error block half">:message</span>')}}
		        </div>

		        <div class="form-group">
		            {{ Form::label('business_description', "Business Description",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::textarea('business_description', 
		            	str_replace("\\r\\n", "<br>", stripcslashes(html_entity_decode($businessinfo->business_description))), 
		            	["placeholder" => "business_description", "class"=>"text-input-grey comment-message-main full", 'required']) }}
		            {{$errors->first('business_description','<span class="alert alert-error block half">:message</span>')}}
		        </div>

		        <!-- profile description here must be a wysiwyg -->
		        <div class="form-group">
		            {{ Form::label('profile_description', "Profile Description",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::textarea('profile_description', 
		            	str_replace("\\r\\n", "<br>", html_entity_decode(stripcslashes($businessinfo->profile_description))), 
		            	["id" => "redactor", 'required']) }}
		            {{$errors->first('profile_description','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		    </div>
		   	<div class="form-group">
		   		
	        </div>
	         <div class="thin-separator"></div>

			
	        <div id="update-branches-settings" class="">
		        <div class="form-group">
		            {{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('address1', $addresses[0], [
		           		"placeholder" => "address..", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('address1','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('address2', (isset($addresses[1])? $addresses[1]: ''), ["placeholder" => "address..", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('address2','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('address3', (isset($addresses[2])? $addresses[2]:''), ["placeholder" => "address..", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('address3','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('address4', (isset($addresses[3])? $addresses[3]:''), [
		            	"placeholder" => "address..", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('address4','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('locations', "Locations Served (please separate keywords by a comma.)",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('locations', $branch->locations, [
		            	"placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full", 'required']) }}
		            {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('phone', "Phone",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('phone', $branch->phone, [
		            	"placeholder" => "Phone", "class"=>"text-input-grey full", 'required']) }}
		            {{$errors->first('phone','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('website', "Website",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('website', $branch->website, [
		            	"placeholder" => "Website", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('website','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('email', "Email",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('email', $branch->email, [
		            	"placeholder" => "Email", "class"=>"text-input-grey full", 'required']) }}
		            {{$errors->first('email','<span class="alert alert-error block half">:message</span>')}}
		        </div>

		        <div class="form-group">
		            {{ Form::label('mon_fri', "Opening Hours",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::textarea('mon_fri', decode($branch->mon_fri), [
		            	"placeholder" => "Monday - Friday Opening Hours", "class"=>"text-input-grey half redactor", 'required']) }}
		            {{$errors->first('mon_fri','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::hidden('sat', $branch->sat, [
		            "placeholder" => "Saturday Opening Hours", "class"=>"text-input-grey full", "readonly"]) }}
		            {{$errors->first('sat','<span class="alert alert-error block half">:message</span>')}}
		        </div>

		        <div class="thin-separator"></div>
		        <div class="form-group">
		            {{ Form::label('facebook', "Facebook Link",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('facebook', $branch->facebook, [
		            "placeholder" => "Facebook Link", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('facebook','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('twitter', "Twitter Link",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('twitter', $branch->twitter, [
		            "placeholder" => "Twitter Link", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('twitter','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		        <div class="form-group">
		            {{ Form::label('google', "Google Link",
		            ["class"=>"text-colorful"]) }}<br/>
		            {{ Form::text('google', $branch->google, [
		            "placeholder" => "Google Link", "class"=>"text-input-grey full"]) }}
		            {{$errors->first('google','<span class="alert alert-error block half">:message</span>')}}
		        </div>
		    </div>
	        <div class="form-group align-right">
	            {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
	        </div>
	        {{ Form::close() }}
	    </div>
	</div>
@stop
@section('scripts')
	<script type="text/javascript">
		$(function(){
	        $(document).on('change','#categories',function()
	        {	
	        	var id = 0;
	            id = {{ $businessinfo->id }};
	            var category = $('#categories').val();
	            var name = $("#categories option:selected").text();
	            console.log(name);
	            var token = $('input[name="_token"]').val();
	            if (category>0)
	            {

	                $.ajax(
                    {
                        url: "/ajaxUpdateCategoryAdd",
                        type: "post",
                        data: { category: category, _token: token, bid: id, name: name}

                    })
                    .done(function(data)
                    {
                    	console.log(data);
                        $('.showCategory').append('<span class="bs-btn btn-success category" data-id="'+category+'"> '+ name +
                            '<span class="remove" data-id="'+category+'" data-text="'+name+'" title="remove this category">x</span></span>');
                        $('#categories').find('option:selected').remove();
                    })
	            }
	        });

	        $(document).on('click', '.remove', function(){
	            var category = $(this).attr("data-id");
	            var id = 0;
	            id = {{ $businessinfo->id }};
	            var token = $('input[name="_token"]').val();
	            $('#categories').append('<option value="'+category+'">'+$(this).attr('data-text')+'</option>');
	            var c =false;
	            c = confirm("Are you sure? You are about to remove this category from your business.");
				if( c == true ){

		            $.ajax({
		                url:"/ajaxUpdateCategoryRemove",
		                type: "post",
		                data: { category: category, _token: token, bid: id }
		            })
	                .done(function(data){
	                	console.log(data);
	                    $("span[data-id='"+category+"']").fadeOut(function(){
	                        $("span[data-id='"+category+"']").remove();
	                    });
	                })
	            }
	        });

	        $(document).on("click", "#show_hide_business_settings", function(){
	        	if( $("#update-business-settings").attr("class") == "invisible" ){
	        		$(this).html("- Hide Business Main Settings");

	        		$("#update-business-settings").fadeIn(500, function(){
	        			$("#update-business-settings").attr("class", "");
	        		});
	        	}else{
	        		$(this).html("+ Show Business Main Settings");
	        		$("#update-business-settings").fadeOut(500, function(){
	        			$("#update-business-settings").attr("class", "invisible");
	        		});
	        	}
	        });

	        $(document).on("click", "#show_hide_branch_settings", function(){
	        	if( $("#update-branches-settings").attr("class") == "" ){
	        			$(this).html("+ Show Branch Settings");
	        		$("#update-branches-settings").fadeOut(500, function(){
	        			$("#update-branches-settings").attr("class", "invisible");
	        		});
	        		
	        	}else{
	        			$(this).html("- Hide Branch Settings");
	        		$("#update-branches-settings").fadeIn(500, function(){
	        			$("#update-branches-settings").attr("class", "");
	        		});
	        		
	        	}
	        });
	    });
	</script>
@stop