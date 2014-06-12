@extends("client.layouts.default")

@section("actual-body-content")
<div class="content-container container-16">
    <div class="blog-post block">
        <div class="block-title">
            <h1>Register</h1>
        </div>
    </div>
    <div class="comments block">
        <div class="comment-message center">
            {{ Form::open(array('action' => 'UsersController@store', "id"=>"form-register")) }}
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
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('phone', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"Phone number"]) }}
                    {{$errors->first('phone','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password', "Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', "Confirm Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password_confirmation', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="error">:message</span>')}}
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