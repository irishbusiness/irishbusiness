@extends('admin.layouts.default')
	@section('title')
		<title>Admin - Manage Subscriptions</title>
	@stop
	@section('actual-body-content')
		<div class="blog-post block">
			<div class="block-title">
				<h1>Manage Subscription</h1>
			</div>
		</div>
		<div class="comments block">						
			<div class="comment-message">
				<div id="addnew_subscription">
					<h2 id="subscription-title-option">Create new subscription</h2>
					<div class="error">
						{{ $errors->first('msgerror', '<span class="error">:msgerror</span>') }}
					</div>
					{{ Form::open(array( "action" => "SubscriptionController@store", 'method' => 'post', "id" => "settings_form_subscription" )) }}
						<div class="form-group">
							{{ Form::label("name", "Name", ["class"=>"text-colorful"]) }}<br>
							{{ Form::text("name", "", ["class"=>"text-input-grey full", "required"=>"required", "placeholder"=>"Subscription Name" ]) }}
							{{$errors->first('name','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("blogs_limit", "Blogs Limit", ["class"=>"text-colorful"]) }}<br>
							{{ Form::text("blogs_limit", "", ["class"=>"text-input-grey full", "placeholder"=>"Blogs Limit",
								 "data-type"=>"number", "required"=>"required" ]) }}
							{{$errors->first('blogs_limit','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("max_location", "Maximum Locations", ["class"=>"text-colorful"]) }}<br>
							{{ Form::text("max_location", "", ["class"=>"text-input-grey full", "placeholder"=>"Maximum Locations", 
								"data-type"=>"number", "required"=>"required" ]) }}
							{{$errors->first('max_location','<span class="error">:message</span>')}}
						</div>	
						<div class="form-group">
							{{ Form::label("max_categories", "Maximum Categories", ["class"=>"text-colorful"]) }}<br>
							{{ Form::text("max_categories", "", ["class"=>"text-input-grey full", "placeholder"=>"Maximum Categories", 
								"data-type"=>"number", "required"=>"required" ]) }}
							{{$errors->first('max_categories','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("duration", "Duration", ["class"=>"text-colorful"]) }}<br>
							{{ Form::select("duration", ["monthly"=>"Monthly", "yearly"=>"Yearly"],
								"", ["class"=>"text-input-grey"]) }}
						</div>
						<div class="form-group">
							{{ Form::label('currency', 'Select Currency', ['class'=>'text-colorful']) }}<br>
							{{ Form::select("currency", [
								"AUD" => "Australian Dollar (AUD)",
								"BRL" => "Brazilian Real (BRL)",
								"CAD" => "Canadian Dollar (CAD)",
								"CZK" => "Czech Koruna (CZK)",
								"DKK" => "Danish Krone (DKK)",
								"EUR" => "Euro (EUR)",
								"HKD" => "Hong Kong Dollar (HKD)",
								"HUF" => "Hungarian Forint (HUF)",
								"ILS" => "Israeli New Sheqel (ILS)",
								"JPY" => "Japanese Yen (JPY)",
								"MYR" => "Malaysian Ringgit (MYR)",
								"MXN" => "Mexican Peso (MXN)",
								"NOK" => "Norwegian Krone (NOK)",
								"NZD" => "New Zealand Dollar (NZD)",
								"PHP" => "Philippine Peso (PHP)",
								"PLN" => "Polish Zloty (PLN)",
								"GBP" => "Pound Sterling (GBP)",
								"SGD" => "Singapore Dollar (SGD)",
								"SEK" => "Swedish Krona (SEK)",
								"CHF" => "Swiss Franc (CHF)",
								"TWD" => "Taiwan New Dollar (TWD)",
								"THB" => "Thai Baht (THB)",
								"TRY" => "Turkish Lira (TRY)",
								"USD" => "U.S. Dollar (USD)"
							], "USD", ["class"=>"text-input-grey"]) }}
						</div>
						<div class="form-group">
							{{ Form::label("price", "Price", ["class"=>"text-colorful"]) }}<br>
							{{ Form::text("price", "", ["class"=>"text-input-grey half", "required"=>"required", "placeholder"=>"Price", 
								"data-type"=>"number" ]) }}
							{{$errors->first('price','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("discounted_price", "Discounted Monthly Price", ["id"=>"label-discounted-price","class"=>"text-colorful"]) }}<br>
							{{ Form::text("discounted_price", "", ["class"=>"text-input-grey half", "required"=>"required", "placeholder"=>"Price", 
								"data-type"=>"number" ]) }}
							{{$errors->first('discounted_price','<span class="error">:message</span>')}}
						</div>
						<div class="form-group align-right">
							{{ Form::submit("Create", ["class"=>"button-2-colorful", "id"=>"btn-create-subscription"]) }}
							<button class="button-2-colorful" id="btn-cancel-edit">Cancel</button>
							<input type="hidden" id="hidden_num">
						</div>
					{{ Form::close() }}
				</div>
				<div class="thin-separator"></div>	
				<div id="listof_subscriptions">
					<h2 id="listof_subscriptions-title">List of Subscriptions</h2><br/>
					@if($subscriptions->count())
						@foreach($subscriptions as $subscription)
							<div class="subscription-container" data-num="{{ $subscription->id }}">
								<h3 class="subscription-name">{{ $subscription->name }}</h3>
								<div class="subscription-info">
									<div class="subscription-duration">{{ $subscription->duration }}</div>
									<div class="subscription-price">{{ $subscription->currency." ".$subscription->price }}</div>
									<div class="subscription-option">
										<a href="#" class="option-button" data-id="{{ $subscription->id }}" data-type="edit">Edit</a>
										<a href="#" class="option-button" data-id="{{ $subscription->id }}" data-type="delete">Delete</a>
									</div>
								</div>
							</div>
						@endforeach
					@else
						<span class="error-empty">There's no subscription yet.</span>
					@endif
				</div>
			</div>
		</div>
	@stop