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
				<?php $x=0; ?>
				@foreach($subscriptions as $subscription)
					<div class="subscription-container get-listed" data-num="{{ $subscription->id }}">
						<h3 class="subscription-name">{{ strtoupper($subscription->duration) }}</h3>
						<div class="subscription-info">
							<div class="subscription-price">
								<span class="text-colorful">Price: </span>
								<span class="currency">{{ $subscription->currency }}</span>
								<?php 
									$price = number_format($subscription->price, 2, '.', ''); 
									$total_price = $price;
								?>
								{{ $price }}
								@if(!is_null($couponCode) && (trim($couponCode) != "") )<br/>
									@if(couponOwner_isSalesTeam($couponCode))
									<!-- start temporary solution -->
										<span>
											<span class="text-colorful">Discounted Price: </span>
											<span class="currency">{{ $subscription->currency }}</span>
											<?php $price = number_format(199, 2, '.', ''); ?>
											{{ $price }}
											@if( $subscription->duration == 'monthly' )
												{{ "/year" }}
											@endif
										</span><br/>
										<span>
											<span class="text-colorful">VAT: </span>
											<span class="currency">{{ $subscription->currency }}</span>
											<?php $vat = number_format((199*(($recentsettings->tax)*(0.01))), 2, '.', ''); ?>
											{{ $vat }}
											<?php $total_price = number_format($price + $vat,2); ?>
										</span><br/>
										<span>
											<span class="text-colorful">Total: </span>
											<span class="currency">{{$subscription->currency}}</span>{{" ".$total_price }}
										</span>
									<!-- end temporary solution -->
									@else
										<span>
											<span class="text-colorful">Discounted Price: </span>
											<span class="currency">{{ $subscription->currency }}</span>
											<?php $price = number_format($subscription->discounted_price, 2, '.', '');?>
											{{ $price }}
										</span><br/>
										<span>
											<span class="text-colorful">VAT: </span>
											<span class="currency">{{ $subscription->currency }}</span>
											<?php $vat = number_format(($subscription->discounted_price*(($recentsettings->tax)*(0.01))), 2, '.', ''); ?>
											{{ $vat }}
											<?php $total_price = number_format($price + $vat, 2, '.', ''); ?>
										</span><br/>
										<span>
											<span class="text-colorful">Total: </span>
											<span class="currency">{{$subscription->currency}}</span>{{" ".$total_price }}
										</span>
									@endif	
								@else
									<br/>
									<span>
										<span class="text-colorful">VAT: </span>
										<span class="currency">{{ $subscription->currency }}</span>
										<?php $vat = number_format(($subscription->price*(($recentsettings->tax)*(0.01))), 2, '.', ''); ?>
										{{ $vat }}
										<?php $total_price = number_format($price + $vat, 2, '.', ''); ?>
									</span><br/>
									<span>
										<span class="text-colorful">Total: </span>
										<span class="currency">{{$subscription->currency}}</span>{{" ".$total_price }}
									</span>						
								@endif
							</div>
							<div class="btn-subscription-option">
								<a href="javascript:void" style="display: none;" class="payment-option" data-type="paywithcard" data-number="{{$x}}">Use <span class="text-colorful">Card</span></a>
							</div>
							<!-- <div class="btn-subscription-option">
								<a href="javascript:void" class="payment-option" data-type="paywithcash" data-number="{{$x}}">Use <span class="text-colorful">Cash</span></a>
							</div> -->
							<div class="btn-subscription-option">
								<a href="javascript:void(0);" class="payment-option" data-type="paywithcheque" data-number="{{$x}}">Use <span class="text-colorful">Cheque</span></a>
							</div>
							<div class="subscription-option">
								<form action="" method="POST">
									<input type="hidden" name="subscription" value="{{$subscription->id}}" />
									<script
										src="https://checkout.stripe.com/checkout.js" class="stripe-button"
										data-key="pk_test_F0bkFgh1SfZrRcMKfBfFpuqN"
										data-amount="{{ ( $total_price )*100 }}"
										data-name="IrishBusiness.ie"
										data-description="{{$subscription->name}}"
										data-image="{{ URL::asset('/images/logo/header/default.png') }}"
										data-currency="{{ $subscription->currency }}" >
									</script>
								</form>
								<div class="div-payment-options">
									<!-- <a id="btn-paywithcash{{$x}}" href="javascript:void(0);" data-subid="{{$subscription->id}}" data-value="cash" class="btn-payment-option a-btn button-2-colorful" style="display: none;">Pay with Cash</a> -->
									<a id="btn-paywithcheque{{$x}}" href="#" data-subid="{{$subscription->id}}" data-value="cheque" class="btn-payment-option a-btn button-2-colorful" style="display: none;">Pay with Cheque</a>
								</div>
								@if( is_null( $couponCode ) || (trim($couponCode) == "") )
									<a href="javascript:void(0);" class="ihavediscountcode" data-subid="{{$subscription->id}}" id="showEnterCouponCode{{$x}}">I have a discount code</a>
								@endif
							</div>
						</div>
					</div>
					<?php $x++; ?>
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
					{{ Form::text('code','', ["required"=>"required", "class"=>"text-input-grey half",'maxlength'=>'12']) }}
					{{ Form::hidden('subs', '', '') }}
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

	$('.stripe-button-el').removeClass('stripe-button-el').addClass('btn-stripe button-2-colorful');
	$('.button-2-colorful span').attr('style','');

	$(document).on("click", ".ihavediscountcode", function(){
		$("#subscribenow").fadeOut(function(){
			$("#i-have-discount-code").fadeIn();
		});
		$("input[name='subs']").val($(this).attr("data-subid"));
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

	$(document).ready(function(){
		var data = {
		    'USD': '$', // US Dollar
		    'EUR': '€', // Euro
		    'CRC': '₡', // Costa Rican Colón
		    'GBP': '£', // British Pound Sterling
		    'ILS': '₪', // Israeli New Sheqel
		    'INR': '₹', // Indian Rupee
		    'JPY': '¥', // Japanese Yen
		    'KRW': '₩', // South Korean Won
		    'NGN': '₦', // Nigerian Naira
		    'PHP': '₱', // Philippine Peso
		    'PLN': 'zł', // Polish Zloty
		    'PYG': '₲', // Paraguayan Guarani
		    'THB': '฿', // Thai Baht
		    'UAH': '₴', // Ukrainian Hryvnia
		    'VND': '₫', // Vietnamese Dong
		}

		var code = $('span.currency').val();
		// the input which contains the code

		$("span.currency").each(function(){

			var span = $(this);
			// console.log($(this).html());
			var code = $.trim($(this).html());
			$.each(data, function(i, v){
			    if(i == code ){
			        span.html(v);


			        // #result is an empty tag which receive the symbol
			        return;
			    }
			});
        });
	});
</script>
@stop