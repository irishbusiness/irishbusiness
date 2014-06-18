@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
    <div class="blog-post block">
        <div class="block-title marginize">
            <h1>Add Blog</h1>
        </div>

    </div>

    <div class="comments block">
        <div class="comment-message center">
                {{ Form::open([ 'method' => 'post', 'action' => 'BlogController@store', 'files' => true, 'id' => 'form-register']) }}
                
                <div class="form-group">
                    {{ Form::label('title', "Blog Title", ["class"=> "text-colorful"]) }}<br>
                    {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title', 'id' => 'addTitle', 'required' => 'required']) }}
                    <br><br>
                </div>
                
                <div class="form-group">
                    {{ Form::label('blogheaderimage', "Blog Header", ["class"=> "text-colorful"]) }}<br>
                    {{ Form::file('blogheaderimage', ["id"=>"btn-blog-settings-logo"]) }}
                    <div class="render-blogheader-logo-preview">
                        <img src="" id="img-render-blogheaderimage">
                    </div>
                </div>
                
                <div class="form-group">
                    {{ Form::label('facebook', "Facebook",
                    ["class"=>"text-colorful"]) }}<br>
                    {{ Form::text('facebook','', [
                    "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'id' => 'addFacebook']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('google', "Google+ Link",
                    ["class"=>"text-colorful"]) }}<br>
                    {{ Form::text('google','', [
                    "placeholder" => "Google+ Link", "class"=>"text-input-grey full", 'id' => 'addGoogle']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('twitter', "Twitter Link",
                    ["class"=>"text-colorful"]) }}<br>
                    {{ Form::text('twitter','', [
                    "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'id' => 'addTwitter']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('linkedin', "LinkedIn Link",
                    ["class"=>"text-colorful"]) }}<br>
                    {{ Form::text('linkedin','', [
                    "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full", 'id' => 'addLinkedin']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('blogurl', "Blog URL (".Request::root()."/your-blog-name)",
                    ["class"=>"text-colorful"]) }}<br>
                    {{ Form::text('blogurl','', [
                    "placeholder" => "your-blog-name ( Optional ) : Skip if you don't know this", "class"=>"text-input-grey full", 'id' => 'addblogurl']) }}
                </div>
                
                <div class="form-group">
                {{ Form::textarea('content', '<h3>Description of the Blog<h3>', ['id' => 'redactor1']) }}
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