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
			{{ Form::open(array('action' => 'SessionsController@store')) }}
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
					{{ Form::submit('Submit','', ['class' => 'button radius'])  }}
					{{ Form::close() }}
				</div>
			</div>
	</div>
</div>	
@stop