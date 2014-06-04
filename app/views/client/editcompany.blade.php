@extends("client.layouts.default")

@section("actual-body-content")
	<div id="company-tabs-page" class="company-tabs-content" style="display: block;">
	    <div class="portfolio-container container-24">

	        <div class="blog-post block">
	            <div class="block-title">
	                <h1>Edit Business</h1>
	            </div>
	        </div>
	        {{ Form::open(array('action' => ['BusinessesController@update', $businessinfo->id], 'files' => true)) }}
	        <div class="form-group">
	            {{ Form::label('businessname', 'Business Name', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('businessname', $businessinfo->name, [
	            "placeholder" => "your business", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address1', 'Business Address1', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address1', $addresses[0], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address2', 'Business Address2', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address2', $addresses[1], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address3', 'Business Address3', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address3', $addresses[2], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('address4', 'Business Address4', ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('address4', $addresses[3], [
	            "placeholder" => "address..", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::label('keywords', "Keywords (please separate keywords by a comma.)",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('keywords', $businessinfo->keywords, [
	            "placeholder" => "office, airplane, house", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('locations', "Locations Served (please separate keywords by a comma.)",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('locations', $businessinfo->locations, [
	            "placeholder" => "iraq, iran, new york", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('phone', "Phone",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('phone', $businessinfo->phone, [
	            "placeholder" => "Phone", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('website', "Website",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('website', $businessinfo->website, [
	            "placeholder" => "Website", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('email', "Email",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('email', $businessinfo->email, [
	            "placeholder" => "Email", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('logo', "Logo",
	            ["class"=>"text-colorful"]) }}<br/>
	            <br>
	            {{ Form::file('logo', ["id"=>"btn-business-settings-logo"]) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	            <div class="render-logo-preview">
	                <img src="{{ URL::asset('/'.$businessinfo->logo) }}" id="img-render-logo">
	            </div>
	        </div>
	        <div class="form-group">
	            {{ Form::label('business_description', "Business Description",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::textarea('business_description', $businessinfo->business_description, [
	            "placeholder" => "business_description", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>

	        <!-- profile description here must be a wysiwyg -->
	        <div class="form-group">
	            {{ Form::label('profile_description', "Profile Description",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::textarea('profile_description', $businessinfo->profile_description, ["id" => "redactor", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>

	        <div class="form-group">
	            {{ Form::label('mon_fri', "Monday - Friday Opening Hours",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('mon_fri', $businessinfo->mon_fri, [
	            "placeholder" => "Monday - Friday Opening Hours", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('sat', "Saturday Opening Hours",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('sat', $businessinfo->sat, [
	            "placeholder" => "Saturday Opening Hours", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::label('facebook', "Facebook Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('facebook', $businessinfo->facebook, [
	            "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('twitter', "Twitter Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('twitter', $businessinfo->twitter, [
	            "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group">
	            {{ Form::label('google', "Google Link",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('google', $businessinfo->google, [
	            "placeholder" => "Google Link", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::select('categories', $categories, "", ['id' => 'categories',
	            'class' => 'text-input-grey full']) }}
	        </div>
	        <div class="form-group">
	            <div class="showCategory">
	            	@for($x=0; $x<count($selected_categories); $x++)
	            		<span data-id="{{ $selected_categories[$x]["id"] }}" class="bs-btn btn-success category">{{ $selected_categories[$x]["name"] }}</span>
	            	@endfor
	            </div>
	        </div>

	        <div class="thin-separator"></div>
	        <div class="form-group">
	            {{ Form::label('businessurl', "Business URL (".Request::root()."/your-business-name)",
	            ["class"=>"text-colorful"]) }}<br/>
	            {{ Form::text('businessurl', $businessinfo->slug, [
	            "placeholder" => "your-business-name", "class"=>"text-input-grey full", 'required']) }}
	            {{$errors->first('businessname','<span class="error">:message</span>')}}
	        </div>
	        <div class="form-group align-right">
	            {{ Form::submit('Save',['class' => 'button-2-colorful'])  }}
	        </div>
	        {{ Form::close() }}
	    </div>
	</div>
@stop
@section('scripts')
        <!-- the long scripts -->
        @include('client.companytabs.settings_scripts')
@stop