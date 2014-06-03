@extends('client.layouts.default')

@section('slider')
	@include('client.partials._slider')
@stop

@section('actual-body-content')
@if(is_null($subscription))
  <h1> nothing here </h1>
  <form action="" method="POST">
  <input type="hidden" name="subscription" value="1" />
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
    data-amount="2000"
    data-name="IrishBusiness.ie"
    data-description="haha"
    data-image="/128x128.png">
  </script>
</form>
@else
	<form action="" method="POST">
  <input type="hidden" name="subscription" value="{{$subscription->id}}" />
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
    data-amount="2000"
    data-name="IrishBusiness.ie"
    data-description="{{$subscription->name}}"
    data-image="/128x128.png">
  </script>
</form>
@endif

@stop

@section('scripts')

<script>
(function(){

    $('.stripe-button-el').removeClass('stripe-button-el').addClass('button-2-colorful');
    $('.button-2-colorful span').attr('style','');

  })();
</script>
@stop