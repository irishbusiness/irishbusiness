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
                            <img src="{{ ( !is_null( $blog->blogheaderimage )  && ( trim( $blog->blogheaderimage ) != "" ) ) ? URL::asset($blog->blogheaderimage) : URL::asset('/images/image-not-available.png') }}" id="img-render-blogheaderimageedit">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label("content", "Content", ["class"=>"text-colorful"]) }}
                        <div id="redactorplaceholder">
                            <textarea id="redactor2" name="content">
                                {{ html_entity_decode(stripcslashes($blog->body)) }}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">

                        {{ Form::hidden('blogurl', $blog->slug, [
                        "placeholder" => "your-blog-name ( Optional )", "class"=>"text-input-grey full", 'id' => 'editblogurl', 'required']) }}
                    </div>
                    <br>
                    <p><input type="submit" value="Save" name="send" class="button-2-colorful"/>
                    <a href="{{ URL::previous() }}"><input type="button" value="Back" name="back" class="button-2-blue"/></a>
                    <a href="{{ URL::to('blog/'.$blog->id.'/delete') }}" onclick = "return confirm('Are you sure you want to remove this blog?')" class="button-2-red paditup">Remove Blog</a>
                    {{ Form::close() }}
                    </p>
        </div>
    </div>

</div>
</div>

@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop