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
        	@elseif(Session::has('status'))
				<br/>
                <span class="status">We have sent a link to your email where you can reset your password.</span>
        	@endif
            {{ Form::open(array('action' => 'ClientPasswordController@sendRemind', "id"=>"form-register")) }}
                <div class="form-group">
                    <span class="text-colorful">Client </span>
                    {{ Form::radio('type', 'client', true); }}
                    <span class="text-colorful">Sales </span>
                    {{ Form::radio('type', 'sales'); }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"your_email@example.com"]) }}
                    {{$errors->first('email','<span class="error">:message</span>')}}
                </div>

                <div class="form-group">
                    {{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
@section('scripts')
<script>

    $(document).on('click','input[name=type]:radio',function(){
        if($(this).val()=='client')
        {
            $("#form-register").attr("action","{{action('ClientPasswordController@sendRemind')}}");
        }
        else
        {
            $("#form-register").attr("action","{{action('SalesPasswordController@sendRemind')}}");
        }

    });
</script>
@stop