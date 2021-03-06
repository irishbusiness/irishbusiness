<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
	    <div class="portfolio-container container-24">

	        <div class="blog-post block">
	            <div class="block-title">
	                <h1>Edit Business</h1>
	            </div>
	        </div>
	        {{ Form::open(array('action' => ['BusinessesController@update', $business->id], 'files' => true)) }}
	        <div class="form-group">
		        {{ Form::label('profilebanner', "Profile Banner",
		        ["class"=>"text-colorful"]) }}<br/>
		        <br>
		        {{ Form::file('profilebanner', ["id"=>"btn-business-settings-profilebanner"]) }}
		        {{$errors->first('profilebanner','<span class="alert alert-error block half">:message</span>')}}
		        <div class="render-logo-preview">
		            <img src="" id="img-render-profilebanner">
		        </div>
		    </div>
	        <div class="form-group">
	            {{ Form::label('name', 'Business Name', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('name', html_entity_decode(stripcslashes($business->name)), [
	            "placeholder" => "your business", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('name','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address1', $addresses[0], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('address1','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address2', $addresses[1], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('address2','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address3', $addresses[2], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('address3','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address4', $addresses[3], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('address4','<span class="alert alert-error block half">:message</span>')}}
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::label('keywords', "Keywords (please separate keywords by a comma.)",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('keywords', $business->keywords, [
	            "placeholder" => "office, airplane, house", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('keywords','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('locations', "Locations Served (please separate keywords by a comma.)",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('locations', $business->locations, [
	            "placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('phone', "Phone",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('phone', $business->phone, [
	            "placeholder" => "Phone", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('phone','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('website', "Website",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('website', $business->website, [
	            "placeholder" => "Website", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('website','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('email', "Email",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('email', $business->email, [
	            "placeholder" => "Email", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('email','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('logo', "Logo",
	            ["class"=>"text-colorful"]) }}<br/>
	            <br>
	            {{ Form::file('logo', ["id"=>"btn-business-settings-logo"]) }}
	            {{$errors->first('logo','<span class="alert alert-error block half">:message</span>')}}
	            <div class="render-logo-preview">
	                <img src="{{ URL::asset('/'.$business->logo) }}" id="img-render-logo">
	            </div>
	        </div>
	        <div class="form-group">
	            {{ Form::label('business_description', "Business Description",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::textarea('business_description', html_entity_decode(stripcslashes($business->business_description)), [
	            "placeholder" => "business_description", "class"=>"text-input-grey comment-message-main full", 'required']) }}
	            {{$errors->first('business_description','<span class="alert alert-error block half">:message</span>')}}
	        </div>

	        <!-- profile description here must be a wysiwyg -->
	        <div class="form-group">
	            {{ Form::label('profile_description', "Profile Description",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::textarea('profile_description', html_entity_decode(stripcslashes($business->profile_description)), ["id" => "redactor", 'required']) }}
	            {{$errors->first('profile_description','<span class="alert alert-error block half">:message</span>')}}
	        </div>

	        <div class="form-group">
	            {{ Form::label('mon_fri', "Opening Hours",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::textarea('mon_fri', $business->mon_fri, [
	            "placeholder" => "Opening Hours", "class"=>"text-input-grey full", "id"=>"redactor", 'required']) }}
	            {{$errors->first('mon_fri','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::hidden('sat', $business->sat, [
	            "placeholder" => "Saturday Opening Hours", "class"=>"text-input-grey full", 'readonly']) }}
	            {{$errors->first('sat','<span class="alert alert-error block half">:message</span>')}}
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::label('facebook', "Facebook Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('facebook', $business->facebook, [
	            "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('facebook','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('twitter', "Twitter Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('twitter', $business->twitter, [
	            "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('twitter','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('google', "Google Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('google', $business->google, [
	            "placeholder" => "Google Link", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('google','<span class="alert alert-error block half">:message</span>')}}
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::select('categories', $categories, "", ['id' => 'categories',
	            'class' => 'text-input-grey full']) }}
	        </div>
	        <div class="form-group">
	            <div class="showCategory">
	            	@for($x=0; $x<count($selected_categories); $x++)
	            		<span data-id="{{ $selected_categories[$x]['id'] }}" class="bs-btn btn-success category">
	            			{{ $selected_categories[$x]["name"] }}
	            			<span class="remove" data-id="{{ $selected_categories[$x]['id'] }}" data-text="{{ $selected_categories[$x]['name'] }}" title="remove this category">x</span>
	            		</span>
	            	@endfor
	            </div>
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::label('slug', "Business URL (".Request::root()."/your-business-name)",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('slug', $business->slug, [
	            "placeholder" => "your-business-name", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('slug','<span class="alert alert-error block half">:message</span>')}}
	        </div>
	        <div class="form-group align-right">
	            {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
	        </div>
	        {{ Form::close() }}
	    </div>
	</div>
@section('scripts')
	<script type="text/javascript">
		$(function(){
	        $(document).on('change','#categories',function()
	        {	
	        	var id = 0;
	            id = {{ $business->id }};
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
	            id = {{ $business->id }};
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
	    });
	</script>
@stop