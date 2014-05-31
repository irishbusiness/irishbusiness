@extends("client.layouts.default")

@section("actual-body-content")
    <div class="blog-post block">
        <div class="block-title">
            <h1>Reset Password</h1>
        </div>
    </div>
    <div class="comments block">
        <div class="comment-message center">
            @if(Session::has('error'))
                <br/>
                <span class="alert-error status">{{Session::get('error')}} </span>
            @endif
            {{ Form::open(array('url'=>'/password/reset/{type}/{token}','method' => 'post', "id"=>"form-register")) }}
                <input type="hidden" name="token" value="{{$token}}"/>

                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
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
@stop