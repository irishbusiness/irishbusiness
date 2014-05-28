@extends('client.layouts.default')
	@section('actual-body-content')
		<div class="blog-post block">
			<div class="block-title">
				<h1>General Settings</h1>
			</div>
		</div>
		<div class="comments block">						
			<div class="comment-message">
				{{ Form::open(array('action' => 'SettingsController@store', 'enctype'=>'multipart/form-data', 'method'=>'post')) }}
					<div class="form-group">
						{{ Form::label("headerlogo", "Header Logo", ["class"=>"text-colorful"]) }}
						{{ Form::input("file", "headerlogo", $settings['footerlogo'], ["class"=>"text-input-grey", "onchange"=>"readURL($(this))" ]) }}
						<div class="render-logo-preview">
							<img src="" id="img-render-headerlogo">
						</div>
					</div>
					<div class="thin-separator"></div>	
					<div class="form-group">
						{{ Form::label("footerlogo", "Footer Logo", ["class"=>"text-colorful"]) }}
						{{ Form::input("file", "footerlogo", $settings['footerlogo'], ["class"=>"text-input-grey", "onchange"=>"readURL($(this))" ]) }}
						<div class="render-logo-preview">
							<img src="" id="img-render-footerlogo">
						</div>
					</div>
					<div class="thin-separator"></div>	
					<div class="form-group">
						{{ Form::text("domain_name", $settings["domain_name"], ["class"=>"text-input-grey full", "placeholder"=>"Domain name", 
							"required"=>"required"]) }}
						{{$errors->first('domain_name','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::text("admin_email", $settings["admin_email"], ["class"=>"text-input-grey full", "placeholder"=>"Admin Email",
							"required"=>"required"]) }}
						{{ $errors->first('admin_email','<span class="error">:message</span>') }}
					</div>
					<div class="form-group">
						{{ Form::text("search_result_per_page", $settings["search_result_per_page"], ["class"=>"text-input-grey full", 
							"placeholder"=>"Search results per page", "id"=>"settings_search_result_per_page", "required"=>"required"]) }}
						{{ $errors->first('search_result_per_page','<span class="error">:message</span>') }}
					</div>
					<div class="form-group">
						{{ Form::textarea("analytics_code", $settings["analytics_code"], ["class"=>"comment-message-main text-input-grey full",
						 	"placeholder"=>"Google Analytics Code"]) }}
					</div>
					<div class="form-group">
						{{ Form::textarea("footer_text", $settings["footer_text"], ["class"=>"comment-message-main full text-input-grey", 
						"placeholder"=>"Footer text"]) }}
					</div>
					<div class="form-group">
						{{ Form::label("view_statistics", "View Statistics On/Off", ["class"=>"text-colorful"]) }}
						{{ Form::select("view_statistics", ["1"=>"On", "0"=>"Off"],  $settings["view_statistics"], ["class"=>"text-input-grey"]) }}
					</div>
					<div class="form-group">
						{{ Form::select("allow_statistics", ["1"=>"Allow Business Owners To View Statistics", 
						"0"=>"Turn Off Statistics"], $settings["allow_statistics"], ["id"=>"allow_statistics", "class"=>"text-input-grey full"]) }}
					</div>
					<div class="form-group"> 
						{{ Form::select("reviews_approval", ["1"=>"Require Approval Before Reviews Are Published", 
						"0"=>"Reviews Are Published Immediately"], $settings["reviews_approval"], ['id' => 'categories', 
							'class' => 'text-input-grey full']) }}
					</div>
					<div class="thin-separator"></div>	
					<div class="form-group  align-right">
						{{ Form::submit("Save", ["class"=>"button-2-colorful"]) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	@stop