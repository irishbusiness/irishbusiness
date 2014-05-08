@extends('admin.layouts.default')

@section('actual-body-content')

		<div class="blog-post block">
			<div class="block-title">
				<h1>Social Media Settings</h1>
			</div>
		</div>

		<div class="comments block">						
			<div class="comment-message">
				<div class="comment-message-title">
					Put Directory <span class="text-colorful">Social Media</span> Links Below
				</div>
				<form class="comment-message-form">
					<input type="text" class="text-input-grey name" placeholder="Facebook" />
					<input type="text" class="text-input-grey email" placeholder="GooglePlus" />
					<input type="text" class="text-input-grey website" placeholder="Twitter" />
					<input type="text" class="text-input-grey name" placeholder="LinkedIn" />
					<input type="text" class="text-input-grey email" placeholder="Pinterest" />
					<input type="text" class="text-input-grey website" placeholder="Dribbble" />
					<input type="submit" class="button-2-colorful" value="Save" name="comment" />
				</form>
			</div>
		</div>
		
@stop