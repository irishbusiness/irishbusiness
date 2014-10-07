<div id="company-tabs-settings" class="company-tabs-content">
    <div class="portfolio-container container-24">	
		{{ Form::open(array('action' => ['BusinessesController@update', $branch->business->slug, $branch->branchslug], 'files' => true, 'id' => 'frm-business-settings')) }}		   
		<div id="update-business-settings" class="">  
		     <div class="form-group">
		        {{ Form::label('profilebanner', "Profile Banner",
		        ["class"=>"text-colorful"]) }}<br/>
		        <br>
		        {{ Form::file('profilebanner', ["id"=>"btn-business-settings-profilebanner"]) }}
		        {{$errors->first('profilebanner','<span class="alert alert-error block half">:message</span>')}}
		        <div class="render-logo-preview">
		            <img src="{{ isset($businessinfo->profilebanner) && $businessinfo->profilebanner != '' ? '/'.$businessinfo->profilebanner : '/images/image-not-available.png' }}" id="img-render-profilebanner">
		        </div>
		    </div>
		    <div class="form-group">
		        {{ Form::label('name', 'Business Name', ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('name', decode($businessinfo->name), [
		        	"placeholder" => "your business", "class"=>"text-input-grey full-width", 'required']) }}
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
		     	{{ Form::label('categories', "Categories",
		        ["class"=>"text-colorful"]) }}<br/>
		    	{{ Form::text('categories', '', ["id" => "categories_autocomplete", 
		    		'class' => 'text-input-grey half-width select']) }}
		    	<button class="button-2-colorful" type="button" id="btn_add_this_category">Add</button>
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

		    <div class="form-group">
		        {{ Form::hidden('slug', $businessinfo->slug, [
		        "placeholder" => "your-business-name", "class"=>"text-input-grey full-width", 'required']) }}
		        {{$errors->first('slug','<span class="alert alert-error block half">:message</span>')}}
		    </div>

		    <div class="thin-separator"></div>
		    <div class="form-group">	
		        {{ Form::hidden('keywords', $businessinfo->keywords, [
		        	"placeholder" => "office, airplane, house", "class"=>"text-input-grey full-width", 'required']) }}
		        {{$errors->first('keywords','<span class="alert alert-error block half">:message</span>') }}

		        <a href="javascript:void(0)" data-rel="#edit-keywords-dialog" rel="dialog" class="text-colorful" title="Click to edit your business Keywords">(?) Keywords</a>
				
				<div id="edit-keywords-dialog" title="Edit your keywords" class="invisible">
					<div class="form-group">
						{{ Form::text('edit-keywords', $businessinfo->keywords, 
						["placeholder" => "office, airplane, house", "id"=>"edit-keywords", "class"=>"text-input-grey full-width", 'required']) }}<br/><br/>
						{{ Form::hidden('old-branchslug', $branch->branchslug, ["id"=>"old-branchslug"]) }}
						<a href="javascript:void(0);" class="a-btn button-2-colorful" data-rel="save-keywords-from-dialog">Save</a>
						<span id="update-keywords-notifier"></span>
					</div>
				</div>

		        <div id="edit-business-keywords" class="block-content">
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

		    <div class="form-group">
		        {{ Form::label('business_description', "Profile Description",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::textarea('business_description', decode($businessinfo->business_description), 
		        	["placeholder" => "business_description", "class"=>"text-input-grey comment-message-main full redactor", 'required']) }}
		        {{$errors->first('business_description','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		</div>
			<div class="form-group">
				
		</div>
		 <div class="thin-separator"></div>


		<div id="update-branches-settings" class="">
		    <div class="form-group">
		        {{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('address1', $addresses[0], [
		       		"placeholder" => "address..", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('address1','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('address2', (isset($addresses[1])? $addresses[1]: ''), ["placeholder" => "address..", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('address2','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('address3', (isset($addresses[2])? $addresses[2]:''), ["placeholder" => "address..", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('address3','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('address4', (isset($addresses[3])? $addresses[3]:''), [
		        	"placeholder" => "address..", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('address4','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('locations', "Locations Served (please separate keywords by a comma.)",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('locations', $branch->locations, [
		        	"placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full-width", 'required']) }}
		        {{$errors->first('locations','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('phone', "Phone",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('phone', $branch->phone, [
		        	"placeholder" => "Phone", "class"=>"text-input-grey full-width", 'required']) }}
		        {{$errors->first('phone','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('website', "Website",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('website', $branch->website, [
		        	"placeholder" => "Website", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('website','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('email', "Email",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('email', $branch->email, [
		        	"placeholder" => "Email", "class"=>"text-input-grey full-width", 'required']) }}
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
		        "placeholder" => "Saturday Opening Hours", "class"=>"text-input-grey full-width", "readonly"]) }}
		        {{$errors->first('sat','<span class="alert alert-error block half">:message</span>')}}
		    </div>

		    <div class="thin-separator"></div>
		    <div class="form-group">
		        {{ Form::label('facebook', "Facebook Link",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('facebook', $branch->facebook, [
		        "placeholder" => "Facebook Link", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('facebook','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('twitter', "Twitter Link",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('twitter', $branch->twitter, [
		        "placeholder" => "Twitter Link", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('twitter','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
		        {{ Form::label('google', "Google Link",
		        ["class"=>"text-colorful"]) }}<br/>
		        {{ Form::text('google', $branch->google, [
		        "placeholder" => "Google Link", "class"=>"text-input-grey full-width"]) }}
		        {{$errors->first('google','<span class="alert alert-error block half">:message</span>')}}
		    </div>
		    <div class="form-group">
	            {{ Form::label('google', "LinkedIn Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('linkedin', $branch->linkedin, [
	            "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full"]) }}
	            {{$errors->first('linkedin','<span class="alert alert-error block half">:message</span>')}}
	        </div>
		</div>
		<div class="form-group align-right">
		    {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
		</div>
		{{ Form::close() }}
	</div>
</div>