@extends('searchpartial.default')
@section('content')
	@if($msg = Session::get('flash_message'))
    <div id="flashmessage" class="alert-box"> 
      {{'<h6> ' .  $msg . '</h6>' }}
    </div>
    @endif

    {{dd(Auth::user()->toArray())}}
@stop