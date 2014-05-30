@extends('client.layouts.default')

@section('slider')
	@include('client.partials._slider')
@stop

@section('actual-body-content')
	<form action="" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
    data-amount="2000"
    data-name="IrishBusiness.ie"
    data-description="Silver Package"
    data-image="/128x128.png">
  </script>
</form>
<form action="" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
    data-amount="2000"
    data-name="Demo Site"
    data-description="2 widgets ($20.00)"
    data-image="/128x128.png">
  </script>
</form>
<form action="" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
    data-amount="2000"
    data-name="Demo Site"
    data-description="2 widgets ($20.00)"
    data-image="/128x128.png">
  </script>
</form>
@stop

@section('scripts')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

@stop