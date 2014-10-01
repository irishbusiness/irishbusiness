@extends('searchpartial.default')
@section('content')
<div class="row ">
	<div class=" colorbg large-6 columns  large-offset-3">
		<div class="row center">
			<div class="large-12-columns">
				<h1 > Register </h1>
			</div>

		</div>
			<hr />
			{{ Form::open(array('action' => 'UsersController@store')) }}
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('firstname', 'Firstname') }}
					{{ Form::text('firstname','', [
						"placeholder" => "John"]) }}
					{{$errors->first('firstname','<span class="error">:message</span>')}}
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('lastname', 'Lastname') }}
					{{ Form::text('lastname','', [
						"placeholder" => "Doe"]) }}
					{{$errors->first('lastname','<span class="error">:message</span>')}}
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('email', 'Email') }}
					{{ Form::text('email','', [
						"placeholder" => "johndoe@gmail.com"]) }}
					{{$errors->first('email','<span class="error">:message</span>')}}
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('username', 'Username') }}
					{{ Form::text('username','', [
						"placeholder" => "john"]) }}
					{{$errors->first('username','<span class="error">:message</span>')}}	
				</div>
			</div>					
			<div class="row">
				<div class="large-12 columns">
					{{ Form::label('password', 'Password') }}
					{{ Form::password('password','',['placeholder' => 'yourpass']) }}
					{{$errors->first('password','<span class="error">:message</span>')}}
				</div>									
			</div>
			
			<div class="row">
				<div class="large-12 columns">
				
					{{ Form::submit('Submit', ['class' => 'button radius tiny'])  }}
					g alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>

						
					{{ Form::close() }}
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="4SBHU43K8GK78">
						<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>

				</div>
			</div>
	</div>
</div>	
@stop