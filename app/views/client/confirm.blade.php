@extends('client.layouts.default')

@section('slider')
	@include('client.partials._slider')
@stop

@section('actual-body-content')
 <h1> Thank you for confirming your email.</h1>
  <h1>You can now Login!</h1>
@stop

@section('scripts')

<script>
(function(){

    $('.stripe-button-el').removeClass('stripe-button-el').addClass('button-2-colorful');
    $('.button-2-colorful span').attr('style','');

  })();
</script>
@stop