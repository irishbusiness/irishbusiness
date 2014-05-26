@extends('admin.layouts.default')
	@section('actual-body-content')
		<div class="blog-post block">
			<div class="block-title">
				<h1>General Settings</h1>
			</div>
		</div>
		<div class="comments block">						
			<div class="comment-message">
				{{ Form::open(array('action' => 'SettingsController@store')) }}
					<div class="form-group">
						{{ Form::label("headerlogo", "Header Logo", ["class"=>"text-colorful"]) }}
						{{ Form::input("file", "headerlogo", "", ["class"=>"text-input-grey"]) }}
					</div>
					<div class="thin-separator"></div>	
					<div class="form-group">
						{{ Form::label("footerlogo", "Footer Logo", ["class"=>"text-colorful"]) }}
						{{ Form::input("file", "footerlogo", "", ["class"=>"text-input-grey"]) }}
					</div>
					<div class="thin-separator"></div>	
					<div class="form-group">
						{{ Form::text("domain_name", "", ["class"=>"text-input-grey full", "placeholder"=>"Domain name"]) }}
						{{$errors->first('domain_name','<span class="error">:message</span>')}}
					</div>
					<div class="form-group">
						{{ Form::text("admin_email", "", ["class"=>"text-input-grey full", "placeholder"=>"Admin Email"]) }}
						{{ $errors->first('admin_email','<span class="error">:message</span>') }}
					</div>
					<div class="form-group">
						{{ Form::text("search_result_per_page", "", ["class"=>"text-input-grey full", "placeholder"=>"Search results per page"]) }}
						{{ $errors->first('search_result_per_page','<span class="error">:message</span>') }}
					</div>
					<div class="form-group">
						{{ Form::textarea("analytics_code", "", ["class"=>"comment-message-main text-input-grey full",
						 	"placeholder"=>"Google Analytics Code"]) }}
					</div>
					<div class="form-group">
						{{ Form::textarea("footer_text", "", ["class"=>"comment-message-main full text-input-grey", 
						"placeholder"=>"Footer text"]) }}
					</div>
					<div class="form-group">
						{{ Form::label("view_statistics", "View Statistics On/Off", ["class"=>"text-colorful"]) }}
						{{ Form::select("view_statistics", ["on"=>"On", "off"=>"Off"], "", ["class"=>"text-input-grey"]) }}
					</div>
					<div class="form-group">
						{{ Form::select("allow_statistics", ["volvo"=>"Allow Business Owners To View Statistics", 
						"saab"=>"Turn Off Statistics"], "", ["id"=>"allow_statistics", "class"=>"text-input-grey full"]) }}
					</div>
					<div class="form-group"> 
						{{ Form::select("reviews_approval", ["volvo"=>"Require Approval Before Reviews Are Published", 
						"saab"=>"Reviews Are Published Immediately"], "", ['id' => 'categories', 'class' => 'text-input-grey full']) }}
					</div>
					<div class="thin-separator"></div>	
					<div class="form-group  align-right">
						{{ Form::submit("Save", ["class"=>"button-2-colorful"]) }}
					</div>
				{{ Form::close() }}
			</div>
		</div>
	@stop