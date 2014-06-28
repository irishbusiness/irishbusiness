@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
    <div class="blog-post block">
        <div class="block-title marginize">
            <h1>Add Blog</h1>
        </div>

    </div>

    <div class="comments block">
        <div class="comment-message">
                {{ Form::open([ 'method' => 'post', 'action' => 'BlogController@store', 'files' => true]) }}
                
                <div class="form-group">
                    {{ Form::label('title', "Blog Title", ["class"=> "text-colorful"]) }}<br>
                    {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title', 'id' => 'addTitle', 'required' => 'required']) }}
                    <br><br>
                </div>
                
                <div class="form-group">
                    {{ Form::label('blogheaderimage', "Blog Header", ["class"=> "text-colorful"]) }}<br>
                    {{ Form::file('blogheaderimage', ["id"=>"btn-blog-settings-logo"]) }}
                    <div class="render-blogheader-logo-preview">
                        <img src="{{ URL::asset('/images/image-not-available.png') }}" id="img-render-blogheaderimage">
                    </div>
                </div>
                
                <div class="form-group">
                    {{ Form::hidden('blogurl','', [
                    "placeholder" => "your-blog-name ( Optional ) : Skip if you don't know this", "class"=>"text-input-grey full", 'id' => 'addblogurl']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('content', 'Content', ["class"=> "text-colorful"]) }}
                    {{ Form::textarea('content', '', ['id' => 'redactor1']) }}
                </div>

                <div class="form-group"><input id="addBlogButton" type="submit" value="Save" name="send" class="button-2-colorful"/>
                    {{ Form::close() }}
                </div>
            </div>
       

    </div>
</div>
@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop