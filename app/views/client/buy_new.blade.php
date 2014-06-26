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
								{{ $subscription->currency }}
								<?php 
									$price = round($subscription->price, 2); 
									$total_price = $price;
								?>
								{{ $price }}
								@if(!is_null($couponCode) && (trim($couponCode) != "") )<br/>
									@if(couponOwner_isSalesTeam($couponCode))
										<!-- <span>
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
										</span> -->
									<!-- start temporary solution -->
										<span>
											<span class="text-colorful">Discounted Price: </span>
											{{ $subscription->currency }}
											<?php $price = 199; ?>
											{{ $price }}
											@if( $subscription->duration == 'monthly' )
												{{ "/year" }}
											@endif
										</span><br/>
										<span>
											<span class="text-colorful">VAT: </span>
											{{ $subscription->currency }}
											<?php $vat = round((199*(($recentsettings->tax)*(0.01))), 2); ?>
											{{ $vat }}
											<?php $total_price = $price + $vat; ?>
										</span><br/>
										<span>
											<span class="text-colorful">Total: </span>
											{{ $subscription->currency." ".$total_price }}
										</span>
									<!-- end temporary solution -->
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
							<!-- <div class="btn-subscription-option">
								<a href="javascript:void" style="display: none;" class="payment-option" data-type="paywithcard" data-number="{{$x}}">Use <span class="text-colorful">Card</span></a>
							</div>
							<div class="btn-subscription-option">
								<a href="javascript:void" class="payment-option" data-type="paywithcash" data-number="{{$x}}">Use <span class="text-colorful">Cash</span></a>
							</div>
							<div class="btn-subscription-option">
								<a href="javascript:void(0);" class="payment-option" data-type="paywithcheque" data-number="{{$x}}">Use <span class="text-colorful">Cheque</span></a>
							</div> -->
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
								<!-- <div class="div-payment-options">
									<a id="btn-paywithcash{{$x}}" href="javascript:void(0);" data-subid="{{$subscription->id}}" data-value="cash" class="btn-payment-option a-btn button-2-colorful" style="display: none;">Pay with Cash</a>
									<a id="btn-paywithcheque{{$x}}" href="javascript:void(0);" data-subid="{{$subscription->id}}" data-value="cheque" class="btn-payment-option a-btn button-2-colorful" style="display: none;">Pay with Cheque</a>
								</div> -->
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
					{{ Form::text('code','', ["required"=>"required", "class"=>"text-input-grey half",'maxlength'=>'9']) }}
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

	// $(document).on("click", "#showEnterCouponCode", function(){
	// 	$("#subscribenow").fadeOut(function(){
	// 		$("#i-have-discount-code").fadeIn();
	// 	});
	// });

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

	// $(document).on("click", ".btn-payment-option", function(){
	// 	$("#subscribenow").fadeOut(function(){
	// 		$("#i-have-discount-code").fadeIn();
	// 	});
	// });

	// $(document).on("click", "a.payment-option", function(){
	// 	var option = $(this).attr("data-type");
	// 	var number = $(this).attr("data-number");

	// 	$(this).fadeOut(function(){
	// 		if( option == "paywithcash" ){
	// 			$("a.payment-option[data-type='paywithcard'][data-number='"+number+"']").show();
	// 			$("a.payment-option[data-type='paywithcheque'][data-number='"+number+"']").show();
	// 			$("#showEnterCouponCode"+number).hide();

	// 			$("#btn-paywithcash"+number).parent("div").prev("form").fadeOut();
	// 			$("#btn-paywithcheque"+number).fadeOut();
	// 			$("#btn-paywithcash"+number).fadeIn(function(){
	// 				$("input[name='subs']").val($(this).attr("data-subid"));
	// 			});
	// 		}else if( option == "paywithcheque" ){
	// 			$("a.payment-option[data-type='paywithcash'][data-number='"+number+"']").show();
	// 			$("a.payment-option[data-type='paywithcard'][data-number='"+number+"']").show();
	// 			$("#showEnterCouponCode"+number).hide();

	// 			$("#btn-paywithcash"+number).parent("div").prev("form").fadeOut();
	// 			$("#btn-paywithcash"+number).fadeOut();
	// 			$("#btn-paywithcheque"+number).fadeIn(function(){
	// 				$("input[name='subs']").val($(this).attr("data-subid"));
	// 			});
	// 		}else if( option == "paywithcard" ){
	// 			$("a.payment-option[data-type='paywithcheque'][data-number='"+number+"']").show();
	// 			$("a.payment-option[data-type='paywithcash'][data-number='"+number+"']").show();
	// 			$("#showEnterCouponCode"+number).show();

	// 			$("#btn-paywithcash"+number).fadeOut();
	// 			$("#btn-paywithcheque"+number).fadeOut();
	// 			$("#btn-paywithcash"+number).parent("div").prev("form").fadeIn();
	// 		}
	// 	});
	// });

})();
</script>
@stop