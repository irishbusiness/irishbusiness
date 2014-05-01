@extends('searchpartial.default')
@section('content')
	@if($msg = Session::get('flash_message'))
    <div id="flashmessage" class="alert-box"> 
      {{'<h6> ' .  $msg . '</h6>' }}
    </div>
    @endif

    <h1>huehue</h1>
    <h3> {{$address}}</h3>
	<?php 

		$addressarr= explode(',' , $address);

	?>

	@foreach($addressarr as $address)
		{{$address . '<br/>'}}
	@endforeach

	@foreach($categories as $category)
		{{$category . '<br/>'}}
	@endforeach

	{{$name}}
@stop