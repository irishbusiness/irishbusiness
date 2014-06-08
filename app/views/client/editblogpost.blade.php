@extends('client.layouts.default')

@section('actual-body-content')
<title>{{$title}}</title>
<div class="portfolio-container container-16">

<div class="blog-post block">
    <div class="block-title">
        <h1>Edit Blog</h1>
    </div>

</div>

<div class="comments block">
    <div class="comment-message">
        <div id="page">
            {{ Form::open([ 'method' => 'put', 'route' => ['blog.update', $blog->id], 'files' => true ]) }}
                    <div>
                        {{ Form::label('title', "Blog Title", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::text('title', $blog->title, ['class' => 'text-input-grey', 'placeholder' => 'Blog Title', 'id' => 'titleedit']) }}
                        <br><br>
                    </div>

                    <div>
                        {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::file('blogheaderimageedit', ["id"=>"btn-editblog-settings-logo"]) }}
                        <div class="render-blogheader-logo-preview">
                            <img src="" id="img-render-blogheaderimageedit">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('facebook', "Facebook",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('facebook',$blog->facebook, [
                        "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'id' => 'facebookedit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('google', "Google+ Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('google',$blog->google, [
                        "placeholder" => "Google", "class"=>"text-input-grey full", 'id' => 'googleedit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('twitter', "Twitter Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('twitter',$blog->twitter, [
                        "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'id' => 'twitteredit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('linkedin', "LinkedIn Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('linkedin', $blog->linkedin, [
                        "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full", 'id' => 'linkedinedit']) }}
                    </div>
                    <div id="redactorplaceholder">
                            <textarea id="redactor2" name="content">
                                {{ html_entity_decode(stripcslashes($blog->body)) }}
                            </textarea>
                    </div>
                     <div class="form-group">
                        {{ Form::label('blogurl', "Blog URL (".Request::root()."/your-blog-name)",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('blogurl', $blog->slug, [
                        "placeholder" => "your-blog-name ( Optional )", "class"=>"text-input-grey full", 'id' => 'editblogurl', 'required']) }}
                    </div>
                    <br>
                    <p><input type="submit" value="Save" name="send" class="button-2-colorful"/>
                    <a href="{{ URL::to('business/'.$blog->business->slug.'/settings') }}"><input type="button" value="Back" name="back" class="button-2-colorful"/></a>
                    <a href="{{ URL::to('blog/'.$blog->id.'/delete') }}" onclick = "return confirm('Are you sure you want to remove this blog?')" class="read-more-link">Remove Blog</a>
                    {{ Form::close() }}
                    </p>
        </div>
    </div>

</div>

@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop