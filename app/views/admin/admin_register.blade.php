@extends("client.layouts.default")

@section("actual-body-content")
    <div class="blog-post">
        <div class="company-blog-post-title"><h2>Register</h2></div>
    </div>
    <div class="comments block">
        <div class="comment-message">
            {{ Form::open(array('action' => 'UsersController@store')) }}
                <div class="form-group">
                {{ Form::label('firstname', "Firstname", ["required"=>"required", "class"=> "text-colorful"]) }}
                <br>
                {{ Form::text('firstname', '', ["required"=>"required", "class"=>"text-input-grey foull",
                    "placeholder"=>"Firstname"]) }}
                {{$errors->first('firstname','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', "Lastname", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('lastname', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"Lastname"]) }}
                    {{$errors->first('lastname','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('phone', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"Phone number"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('username', "Username", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('username', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"Username"]) }}
                    {{$errors->first('username','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password', "Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', "Confirm Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password_confirmation', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="error">:message</span>')}}
                </div>
                <div class="form-group align-right">
                    {{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop