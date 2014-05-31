@extends('sales.layouts.default')

@section('slider')
	@include('sales.partials._slider')
@stop

@section('actual-body-content')
 <div class="blog-post block">
        <div class="block-title">
            <h1>Invite</h1>
        </div>
    </div>
	<div class="comments block">
        <div class="comment-message center">
            @if(Session::has('error'))
                <br/>
                <span class="alert-error status">{{Session::get('error')}} </span>
            @endif
            {{ Form::open(array('url'=>'/sales/invite','method' => 'post', "id"=>"form-register")) }}
               

                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                {{ Form::label('firstname', "Firstname", ["required"=>"required", "class"=> "text-colorful"]) }}
                <br>
                {{ Form::text('firstname', '', ["required"=>"required", "class"=>"text-input-grey half",
                    "placeholder"=>"Firstname"]) }}
                {{$errors->first('firstname','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', "Lastname", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('lastname', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"Lastname"]) }}
                    {{$errors->first('lastname','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('phone', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"Phone number"]) }}
                    {{$errors->first('phone','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')

@stop