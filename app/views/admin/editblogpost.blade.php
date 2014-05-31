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
            {{ Form::open(array('method' => 'put', 'route' => ['blog.update', $blog->id], 'files' => true)) }}
            <div>
                <br><br>
                {{ Form::label('title', "Title", ["class"=> "text-colorful"]) }}<br>
                {{ Form::text('title', $blog->title, ['class' => 'text-input-grey', 'placeholder' => 'Title']) }}
                <br><br>
            </div>

            <div>
                {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}<br>

                <div class="blog-post block">
                <div class="blog-post-image">
                    {{ HTML::image($blog->blogheaderimage, 'Please upload header image')}}
                </div>
                </div>
                {{ Form::file('blogheaderimage') }}
                <br><br>
            </div>
            {{ Form::textarea('content', html_entity_decode(stripcslashes($blog->body)), ['id' => 'redactor']) }}
            <br>
            <p><input type="submit" value="Save" name="save" class="button-2-colorful"/>
            {{ Form::close() }}

            {{ Form::open(['method' => 'DELETE', 'action' => ['BlogController@destroy', $blog->id]]) }}
            {{ Form::submit('Delete', ['class' => 'button-2-colorful', 'onclick' => 'return confirm("Are you sure you want to delete this blog?")'])}}
            {{ Form::close() }}
            </p>
        </div>
    </div>

</div>

@stop