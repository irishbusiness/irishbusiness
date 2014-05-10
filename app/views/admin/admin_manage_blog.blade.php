@extends('admin.layouts.default')

@section('actual-body-content')

		<div class="blog-post block">
		<div class="block-title">
			<h1>Manage Blog</h1>
		</div>
	
		</div>

		<div class="comments block">						
		<div class="comment-message">
			<form class="comment-message-form"> 
				<p>Blog Image<br><input type="file" name="datafile"></p>
				<div class="thin-separator"></div>	
				{{ Form::text('blogtitle', null, ['class' => 'text-input-grey', 'placeholder' => 'Blog Title']) }}
				<br><br>{{ Form::textarea('blogdescription', null, ['class' => 'text-input-grey-textarea', 'row' => '50', 'placeholder' => 'Blog Description..']) }}
				<div class="thin-separator"></div>													
				<input type="submit" class="button-2-colorful" value="Save" name="comment" />
			</form>
		</div>

	</div>

@stop