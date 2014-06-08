@extends('client.layouts.default')


@section('actual-body-content')
@if(is_null($subscription))
  <h1> nothing here </h1>
@else
    <div class="subscription-container" data-num="{{ $subscription->id }}">
      <h3 class="subscription-name">{{ $subscription->name }}</h3>
      <div class="subscription-info">
        <div class="subscription-duration">{{ $subscription->duration }}</div>
        <div class="subscription-price">{{ $subscription->currency." ".$subscription->price }}</div>
        <div class="subscription-option">
          <form action="" method="POST">
            <input type="hidden" name="subscription" value="{{$subscription->id}}" />
            <script
              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
              data-amount="{{ ($subscription->price)*100 }}"
              data-name="IrishBusiness.ie"
              data-description="{{$subscription->name}}"
              data-image="{{ URL::asset('/images/logo/header/default.png') }}">
            </script>
          </form>
        </div>
      </div>
    </div>
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