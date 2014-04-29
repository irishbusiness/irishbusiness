@extends('client.default')

@section('content')
<div class="contact-us block">
	<div class="block-title">
		<h1>Settings</h1>
	</div>
	<div class="comment-message">
		{{ Form::open(array( 'class' => 'comment-message-form')) }}
            <span class="text-colorful">Business Name</span><br>
	            {{ Form::text('business_name', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Name')) }}<br><br>
			<span class="text-colorful">Business Address</span><br>
				{{ Form::text('address1', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}
            <br><br>
            	{{ Form::text('address2', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}
            <br><br>
            	{{ Form::text('address3', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}
          	<br><br>
          		{{ Form::text('address4', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}	
            <br><br>
            <span class="text-colorful">First Name</span><br>
            	{{ Form::text('first_name', null, array('class' => 'text-input-grey', 'placeholder' => 'First Name *')) }}
            <br><br>
            <span class="text-colorful">Last Name</span><br>
           		{{ Form::text('last_name', null, array('class' => 'text-input-grey', 'placeholder' => 'Last Name *')) }}
            <br><br>
            <span class="text-colorful">Logo:</span><br>
                <img src="images/default_avatar.png" height="200" width="230">
            <br><br>
                {{ Form::file('logo') }}
            <br><br>
                <div>
                    <img src="images/default_avatar.png" height="50" width="50">
                </div>
            <br><br>
                <span class="text-colorful">Project Description</span><br>
                    {{ Form::textarea('projDescription', null, array('class' => 'text-input-grey', 'placeholder' => 'Project Description *')) }}
            <br><br>
                <span class="text-colorful">Youtube Links:</span><br>
                    {{ Form::textarea('youtubeLinks', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Main Keywords:</span><br>
                    {{ Form::textarea('mainKeywords', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Extra Keywords:</span><br>
                    {{ Form::textarea('extraKeywords', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Area Serviced:</span><br>
                    {{ Form::textarea('areaServiced', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Website:</span><br>
                    {{ Form::textarea('website', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Opening Hours:</span><br>
                    {{ Form::textarea('openingHours', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Business Catrgories:</span><br>
                    {{ Form::textarea('businessCategories', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Facebook Account:</span><br>
                    {{ Form::textarea('facebookAccount', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">twitter_account:</span><br>
                    {{ Form::textarea('twitterAccount', null, array('class' => 'text-input-grey')) }}
             <br><br>
                <span class="text-colorful">Google+ Account:</span><br>
                    {{ Form::textarea('googleAccount', null, array('class' => 'text-input-grey')) }}
             <br><br>

            	{{ Form::submit('Submit', array('class' => 'button-2-colorful')) }}
        {{ Form::close() }}
        </form>
	</div>
</div>

<div class="separator"></div>

@stop