@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
	@if(is_null($subscriptions))
	<h1> nothing here </h1>
	@else

	<div id="subscribenow">
		<div class="blog-post block">
			<div class="block-title">
				<h1>Get Listed!</h1>
			</div>
		</div>

		<div class="comments block">
			<div class="comment-message">
				<div class="comment-message-title">
					Subscribe <span class="text-colorful">Now!</span>
				</div>
				@foreach($subscriptions as $subscription)
					<div class="subscription-container get-listed" data-num="{{ $subscription->id }}">
						<h3 class="subscription-name">{{ $subscription->name }}</h3>
						<div class="subscription-info">
							<div class="subscription-duration"><span class="text-colorful">Type: </span>{{ $subscription->duration }}</div>
							<div class="subscription-price">
								<span class="text-colorful">Price: </span>
								{{ $subscription->currency }}
								<?php 
									$price = round($subscription->price, 2); 
									$total_price = $price;
								?>
								{{ $price }}
								@if(!is_null($couponCode) && (trim($couponCode) != "") )<br/>
									<?php $is_from_st = couponOwner_isSalesTeam($couponCode); ?>
									@if($is_from_st == 'true')
										<span>
											<span class="text-colorful">Discounted Price: </span>
											{{ $subscription->currency }}
											<?php $price = round($subscription->st_discounted_price, 2);?>
											{{ $price }}
										</span><br/>
										<span>
											<span class="text-colorful">VAT: </span>
											{{ $subscription->currency }}
											<?php $vat = round(($subscription->st_discounted_price*(($recentsettings->tax)*(0.01))), 2); ?>
											{{ $vat }}
											<?php $total_price = $price + $vat; ?>
										</span><br/>
										<span>
											<span class="text-colorful">Total: </span>
											{{ $subscription->currency." ".$total_price }}
										</span>
									@else
										<span>
											<span class="text-colorful">Discounted Price: </span>
											{{ $subscription->currency }}
											<?php $price = round($subscription->discounted_price, 2);?>
											{{ $price }}
										</span><br/>
										<span>
											<span class="text-colorful">VAT: </span>
											{{ $subscription->currency }}
											<?php $vat = round(($subscription->discounted_price*(($recentsettings->tax)*(0.01))), 2); ?>
											{{ $vat }}
											<?php $total_price = $price + $vat; ?>
										</span><br/>
										<span>
											<span class="text-colorful">Total: </span>
											{{ $subscription->currency." ".$total_price }}
										</span>
									@endif	
								@else
									<br/>
									<span>
										<span class="text-colorful">VAT: </span>
										{{ $subscription->currency }}
										<?php $vat = round(($subscription->price*(($recentsettings->tax)*(0.01))), 2); ?>
										{{ $vat }}
										<?php $total_price = $price + $vat; ?>
									</span><br/>
									<span>
										<span class="text-colorful">Total: </span>
										{{ $subscription->currency." ".$total_price }}
									</span>						
								@endif
							</div>
							<div class="subscription-option">
								<form action="" method="POST">
									<input type="hidden" name="subscription" value="{{$subscription->id}}" />
									<script
									src="https://checkout.stripe.com/checkout.js" class="stripe-button"
									data-key="pk_live_NRK68iTbtUdKXKFbSORmwKn6"
									data-amount="{{ ( ( is_null($couponCode) || (trim($couponCode) == "") ) ? $subscription->price : $total_price )*100 }}"
									data-name="IrishBusiness.ie"
									data-description="{{$subscription->name}}"
									data-image="{{ URL::asset('/images/logo/header/default.png') }}"
									data-currency="{{ $subscription->currency }}" >
									</script>
								</form>
								@if( is_null( $couponCode ) || (trim($couponCode) == "") )
									<a href="javascript:void(0);" id="showEnterCouponCode">I have a discount code</a>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div id="i-have-discount-code" style="display: none;">
		<div class="blog-post block">
			<div class="block-title">
				<h1>Enter Discount Code</h1>
			</div>
		</div>

		<div class="comments block">
			<div class="comment-message">
				<div class="comment-message-title">
					Enter your  <span class="text-colorful">Coupon code</span>
				</div>
				@if(Session::has('error'))
				<br/>
				<span class="alert alert-error status">{{Session::get('error')}} </span>
				@endif       
				{{ Form::open(array('url' => 'couponcode','method' => 'post', "id"=>"form-register")) }}
				<div class="form-group">
					{{ Form::label('code', "Discount Code", ["required"=>"required", "class"=> "text-colorful"]) }}
					<br>
					{{ Form::text('code','', ["required"=>"required", "class"=>"text-input-grey half",'maxlength'=>'9']) }}
					@if(Session::has('code'))
					<span class="alert alert-error block half">{{Session::get('oldpass')}}</span>
					@endif
				</div>
				<div class="form-group">
					{{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful"]) }}
					<a href="javascript:void(0);" class="a-btn button-2-colorful" id="cancel-enter-discountcode">Cancel</a>
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endif
@stop

@section('sidebar')
@include('client.partials._sidebar')
@stop

@section('scripts')

<script>
(function(){

	$('.stripe-button-el').removeClass('stripe-button-el').addClass('button-2-colorful');
	$('.button-2-colorful span').attr('style','');

	$(document).on("click", "#showEnterCouponCode", function(){
		$("#subscribenow").fadeOut(function(){
			$("#i-have-discount-code").fadeIn();
		});
	});

	$(document).on("click", "#cancel-enter-discountcode", function(){
		$("#i-have-discount-code").fadeOut(function(){
			$("#subscribenow").fadeIn();
		});
	});

	$(document).ready(function(){
		var hasError = "{{ Session::has('error') }}";
		if( hasError == "1" ){
			$("#subscribenow").fadeOut(function(){
				$("#i-have-discount-code").fadeIn();
			});
		}
	});

})();
</script>
@stop