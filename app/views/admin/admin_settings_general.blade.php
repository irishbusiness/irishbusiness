@extends('admin.layouts.default')
@section('actual-body-content')

		<div class="blog-post block">
			<div class="block-title">
				<h1>General Settings</h1>
			</div>
		</div>

		<div class="comments block">						
			<div class="comment-message">
				<form class="comment-message-form">

					<p>Header Logo<br><input type="file" name="datafile"></p>
					<div class="thin-separator"></div>	
					<p>Footer Logo<br><input type="file" name="datafile"></p>
					<div class="thin-separator"></div>	
					
					<input type="text" class="text-input-grey full" placeholder="Domain name" />
					<input type="text" class="text-input-grey full" placeholder="Admin Email" />
					<input type="text" class="text-input-grey full" placeholder="Search results per page" />
					<input type="text" class="text-input-grey full" placeholder="Business Blog posts to show" />
					<input type="text" class="text-input-grey full" placeholder="Max locations served" />
					<input type="text" class="text-input-grey full" placeholder="Max categories" />
					<input type="text" class="text-input-grey full" placeholder="View Statistics On / off" />							

					<textarea class="text-input-grey comment-message-main" placeholder="Google Analytics Code"></textarea>
					<textarea class="text-input-grey comment-message-main" placeholder="Footer text"></textarea>
					
					<select class="text-input-grey full">
							<option value="volvo">Allow Business Owners To View Statistics</option>
							<option value="saab">Turn Statistics off</option>
					</select> 

					<select class="text-input-grey full">
							<option value="volvo">Require Approval Before Reviews Are Published</option>
							<option value="saab">Reviews Are Published Immediately</option>
					</select> 

					<div class="thin-separator"></div>	
					<input type="submit" class="button-2-colorful" value="Save" name="comment" />

				</form>

			</div>

		</div>

@stop