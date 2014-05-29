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
                {{ Form::open(array('method' => 'post', 'action' => 'BlogController@store', 'files' => true)) }}
                <div style="text-align:center;">
                <br><br>
                {{ Form::label('title', "Title", ["class"=> "text-colorful"]) }}<br>
                {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title']) }}
                <br><br>
                </div>

                <div style="text-align:center;">

                    {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}<br>
                    {{ Form::file('blogheaderimage') }}
                    <br><br>
                </div>
                    <textarea id="redactor" name="content">
                        <h2>Hello and Welcome</h2>
                        <p>Sample Body Content</p>
                    </textarea>
                    <br>
                    <p><input type="submit" value="Save" name="send" class="button-2-colorful"/></p>
                {{ Form::close() }}
            </div>
		</div>

	</div>

@stop