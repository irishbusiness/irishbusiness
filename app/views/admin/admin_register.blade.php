@extends("client.layouts.default")

@section("actual-body-content")

<div class="content-container container-16">
    <div class="blog-post block">
        <div class="block-title marginize">
            <h1>Register</h1>
        </div>
    </div>
    
    <div class="comments block">
        <div class="comment-message">
            {{ Form::open(array('action' => 'UsersController@store', 'id'=>'form-register')) }}
                <div class="form-group">
                {{ Form::label('firstname', "Firstname", ["required"=>"required", "class"=> "text-colorful"]) }}
                <br>
                {{ Form::text('firstname', '', ["required"=>"required", "class"=>"text-input-grey",
                    "placeholder"=>"Firstname"]) }}
                {{$errors->first('firstname','<span class=" half block alert alert-error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', "Lastname", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('lastname', '', ["required"=>"required", "class"=>"text-input-grey",
                        "placeholder"=>"Lastname"]) }}
                    {{$errors->first('lastname','<span class=" half block alert alert-error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="half block alert alert-error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('phone', '', ["required"=>"required", "class"=>"text-input-grey",
                        "placeholder"=>"Phone number"]) }}
                    {{$errors->first('phone','<span class="half  block alert alert-error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password', "Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password', ["required"=>"required", "class"=>"text-input-grey",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class="half block alert alert-error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', "Confirm Password", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::password('password_confirmation', ["required"=>"required", "class"=>"text-input-grey",
                        "placeholder"=>"*********"]) }}
                    {{$errors->first('password','<span class=" half block alert alert-error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('captcha', "Prove to us you're not a robot", [ "class"=> "text-colorful"]) }}
                    <br/>
                    <div id="divcaptcha" data-id="">
                      @foreach (Session::get('veri') as $key => $value)
                        @foreach ($value as $key => $value2) 
                          @if( $key == Session::get('time') )
                            <img draggable="false" src="{{ URL::to('captcha?x='.$value2['x'].'&y='.$value2['y']) }}">
                          @endif
                        @endforeach
                      @endforeach
                    </div>
                    {{ Form::hidden('captcha_id', $time ) }}
                    {{ Form::text('captcha', '', [ "class"=>"text-input-grey xxss",
                        "placeholder"=>"Enter sum",'id'=>'coupon','maxlength'=>"3",
                        'maxlength'=>"3", 'required' => 'required']) }} 
                    {{$errors->first('captcha','<span id="errorcaptcha" class="alert-error2">:message</span>')}}
                </div>
                <br/>
                <div class="form-group">
                    {{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful", "id"=>"btn-register-submit"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        $("#form-register").on("submit", function(){
            $("#btn-register-submit").attr("disabled", "disabled");
        });
    </script>
@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop