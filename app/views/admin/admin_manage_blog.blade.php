@extends('admin.layouts.default')

@section('actual-body-content')

		<div class="blog-post block">
		<div class="block-title">
			<h1>Manage Blog</h1>
		</div>
	
		</div>

		<div class="comments block">						
		<div class="comment-message">
            <div id="page">
                {{ Form::open(array('method' => 'post', 'action' => 'SessionsController@store')) }}
                    <textarea id="redactor" name="content">
                        <h2>Hello and Welcome</h2>
                        <p>Sample Body Content</p>
                    </textarea>
                    <br>
                    <p><input type="submit" value="Send" name="send" /></p>
                {{ Form::close() }}
            </div>
		</div>

	</div>

@stop