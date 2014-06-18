@extends('client.layouts.default')

@section('actual-body-content')
<div class="content-container container-16">
 <div class="blog-post block">
        <div class="block-title marginize">
            <h1>Change Password</h1>
        </div>
    </div>
	<div class="comments block">
        <div class="comment-message center">
            @if(Session::has('error'))
                <br/>
                <span class="alert-error status">{{Session::get('error')}} </span>
            @endif
            {{ Form::open(array('url' => 'client/password/edit','method' => 'post', "id"=>"form-register")) }}
               <div class="form-group">
                    {{ Form::label('oldpassword', "Current Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('oldpassword', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"*********"]) }}
                    @if(Session::has('oldpass'))
                    <span class="alert alert-error block half">{{Session::get('oldpass')}}</span>
                    @endif
                </div>
               <div class="form-group">
                    {{ Form::label('password', "New Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="alert alert-error block half">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', "Confirm New Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password_confirmation', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="alert alert-error block half">:message</span>')}}
                </div><br>
                <div class="form-group">
                    {{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop
@section('scripts')

@stop