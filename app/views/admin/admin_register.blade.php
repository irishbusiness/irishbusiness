@extends("client.layouts.default")

@section("actual-body-content")
    <div class="blog-post">
        <div class="company-blog-post-title"><h2>Register</h2></div>
    </div>
    <div class="comments block">
        <div class="comment-message">
            {{ Form::open(array('action' => 'UsersController@store')) }}
                <div class="form-group">
                {{ Form::label('firstname', "Firstname", ["class"=> "text-colorful"]) }}
                <br>
                {{ Form::text('firstname', '', ["class"=>"text-input-grey full",
                    "placeholder"=>"Firstname"]) }}
                {{$errors->first('firstname','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', "Lastname", ["class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('lastname', '', ["class"=>"text-input-grey full",
                        "placeholder"=>"Lastname"]) }}
                    {{$errors->first('lastname','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email", ["class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('email', '', ["class"=>"text-input-grey full",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('username', "Username", ["class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('username', '', ["class"=>"text-input-grey full",
                        "placeholder"=>"Username"]) }}
                    {{$errors->first('username','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password', "Password", ["class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password', ["class"=>"text-input-grey full",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="error">:message</span>')}}
                </div>
                <div class="form-group align-right">
                    {{ Form::submit("Submit", ["class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop