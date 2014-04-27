@extends('client.default')

@section('content')
<div class="contact-us block">
	<div class="block-title">
		<h1>Login</h1>
	</div>
	<div class="comment-message">
			{{ Form::open(array('class' => 'comment-message-form')) }}                                                
				<span class="text-colorful">Email</span>
				<br>
					{{ Form::text('email', null, array('class' => 'text-input-grey', 'placeholder' => 'Email *')) }}<br><br>
				<span class="text-colorful">Password</span><br>
					{{ Form::password('password', array('class' => 'text-input-grey', 'placeholder' => '*****')) }}
				<br><br>
				<a href="{{ URL::to('forgot-password') }}">Forgot your password?</a>
				<br><br>
					{{ Form::submit('Submit', array('class' => 'button-2-colorful')) }}
			{{ Form::close() }}
	
	</div>
</div>

<div class="separator"></div>

@stop