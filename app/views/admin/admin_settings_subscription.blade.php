@extends('admin.layouts.default')
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
							{{ Form::label("name", "Name", ["class"=>"text-colorful"]) }}
							{{ Form::text("name", "", ["class"=>"text-input-grey full", "required"=>"required", "placeholder"=>"Subscription Name"]) }}
							{{$errors->first('name','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("price", "Price", ["class"=>"text-colorful"]) }}
							{{ Form::text("price", "", ["class"=>"text-input-grey full", "required"=>"required", "placeholder"=>"Price", 
								"data-type"=>"number"]) }}
							{{$errors->first('price','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("blogs_limit", "Blogs Limit", ["class"=>"text-colorful"]) }}
							{{ Form::text("blogs_limit", "", ["class"=>"text-input-grey full", "placeholder"=>"Blogs Limit",
								 "data-type"=>"number"]) }}
							{{$errors->first('blogs_limit','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("max_location", "Maximum Locations", ["class"=>"text-colorful"]) }}
							{{ Form::text("max_location", "", ["class"=>"text-input-grey full", "placeholder"=>"Maximum Locations", 
								"data-type"=>"number"]) }}
							{{$errors->first('max_location','<span class="error">:message</span>')}}
						</div>	
						<div class="form-group">
							{{ Form::label("max_categories", "Maximum Categories", ["class"=>"text-colorful"]) }}
							{{ Form::text("max_categories", "", ["class"=>"text-input-grey full", "placeholder"=>"Maximum Categories", 
								"data-type"=>"number"]) }}
							{{$errors->first('max_categories','<span class="error">:message</span>')}}
						</div>
						<div class="form-group">
							{{ Form::label("duration", "Duration", ["class"=>"text-colorful"]) }}<br>
							{{ Form::select("duration", ["free"=>"Free", "monthly"=>"Monthly", "yearly"=>"Yearly", "forever"=>"Forever"],
								"", ["class"=>"text-input-grey"]) }}
						</div>
						<div class="form-group align-right">
							{{ Form::submit("Create", ["class"=>"button-2-colorful"]) }}
						</div>
					{{ Form::close() }}
				</div>
				<div class="thin-separator"></div>	
				<div id="listof_subscriptions">
					<h2 id="listof_subscriptions-title">List of Subscriptions</h2><br/>
					@foreach($subscriptions as $subscription)
						<div class="subscription-container">
							<h3 class="subscription-name">{{ $subscription->name }}</h3>
							<div class="subscription-info">
								<div class="subscription-duration">{{ $subscription->duration }}</div>
								<div class="subscription-price">${{ $subscription->price }}</div>
								<div class="subscription-option">
									<a href="#" class="option-button" data-id="{{ $subscription->id }}" data-type="edit">Edit</a>
									<a href="#" class="option-button" data-id="{{ $subscription->id }}" data-type="delete">Delete</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@stop
	@section('scripts')
		<script type="text/javascript">
			$(document).ready(function(){
				$(".option-button").click(function(e){
					e.preventDefault();
					var id = $(this).attr("data-id");
					var operation = $(this).attr("data-type");

					if( operation == "delete" ){
						
					}
				});
			});
		</script>
	@stop