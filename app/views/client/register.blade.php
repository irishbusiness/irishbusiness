@extends('client.default')

@section('content')
<div class="contact-us block">
	<div class="block-title">
		<h1>Register</h1>
	</div>
	<div class="comment-message">
		{{ Form::open(array( 'class' => 'comment-message-form')) }}
            <span class="text-colorful">Business Name</span><br>
	            {{ Form::text('business_name', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Name')) }}<br><br>
			<span class="text-colorful">Business Address</span><br>
				{{ Form::text('address1', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}
            <br>
            	{{ Form::text('address2', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}
            <br>
            	{{ Form::text('address3', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}
          	<br>
          		{{ Form::text('address4', null, array('class' => 'text-input-grey', 'placeholder' => 'Business Address *')) }}	
            <br><br>
            <span class="text-colorful">First Name</span><br>
            	{{ Form::text('first_name', null, array('class' => 'text-input-grey', 'placeholder' => 'First Name *')) }}
            <br><br>
            <span class="text-colorful">Last Name</span><br>
           		{{ Form::text('last_name', null, array('class' => 'text-input-grey', 'placeholder' => 'Last Name *')) }}
            <br><br>
            <span class="text-colorful">Phone</span><br>
            	{{ Form::text('phone', null, array('class' => 'text-input-grey', 'placeholder' => 'Phone *')) }}
            <br><br>
			<span class="text-colorful">Email</span><br>
            	{{ Form::text('email', null, array('class' => 'text-input-grey', 'placeholder' => 'Email *')) }}
            <br><br>
            <span class="text-colorful">Optional Coupon Code</span><br>
            	{{ Form::text('coupon', null, array('id' => 'coupon', 'maxlength' => '15', 'class' => 'text-input-grey', 'placeholder' => 'Optional Coupon code')) }}
            <!-- <input name="coupon" type="text" class="text-input-grey" placeholder="Optional Coupon Code" id="coupon" maxlength="15"> -->
            <span id="user-result"></span>
            <br>
            <br>		
            	{{ Form::submit('Submit', array('class' => 'button-2-colorful')) }}
        {{ Form::close() }}
        </form>
	</div>
</div>

<div class="separator"></div>

@stop