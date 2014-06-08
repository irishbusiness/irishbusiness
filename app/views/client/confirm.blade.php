@extends('client.layouts.default')

@section('actual-body-content')
 <h3 style="margin-left:15px"> Thank you for confirming your email.</h3>
  <h3 style="margin-left:15px">You can now Login!</h3>
@stop

@section('scripts')

<script>
(function(){

    $('.stripe-button-el').removeClass('stripe-button-el').addClass('button-2-colorful');
    $('.button-2-colorful span').attr('style','');

  })();
</script>
@stop