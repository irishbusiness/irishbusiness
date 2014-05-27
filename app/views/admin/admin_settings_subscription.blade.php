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
							{{ Form::label("duration", "Duration", ["class"=>"text-colorful"]) }}
							{{ Form::select("duration", ["free"=>"Free", "monthly"=>"Monthly", "yearly"=>"Yearly", "forever"=>"Forever"],
								"", ["class"=>"text-input-grey"]) }}
						</div>
						<div class="form-group align-right">
							{{ Form::submit("Add", ["class"=>"button-2-colorful"]) }}
						</div>
					{{ Form::close() }}
				</div>
				<div id="listof_subscriptions"></div>
			</div>
		</div>
	@stop
	@section('scripts')
		<script type="text/javascript">
			$(document).ready(function(){
				$("#settings_form_subscription").
			});
		</script>
	@stop