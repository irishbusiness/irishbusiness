@extends('admin.layouts.default')

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
            {{ Form::open(array('url'=>'sales/invite','method' => 'post', "id"=>"form-register")) }}
               

                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"email"]) }}
                    {{$errors->first('email','<span class="alert-error2">:message</span>')}}
                </div>
                <div class="form-group">
                {{ Form::label('firstname', "Firstname", ["required"=>"required", "class"=> "text-colorful"]) }}
                <br>
                {{ Form::text('firstname', '', ["required"=>"required", "class"=>"text-input-grey half",
                    "placeholder"=>"Firstname"]) }}
                    {{$errors->first('firstname','<span class="alert-error2">Please enter your firstname.</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', "Lastname", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('lastname', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"Lastname"]) }}
                    {{$errors->first('lastname','<span class="alert-error2">Please enter your lastname.</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('phone', '', ["required"=>"required", "class"=>"text-input-grey half",
                        "placeholder"=>"Phone number"]) }}
                    {{$errors->first('phone','<span class="error">:message</span>')}}
                </div>
                  <div class="form-group">
                    {{ Form::label('type', "Type", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::select('type', $commissions, ["required"=>"required", "class"=>"text-input-grey half"]) }}
                    {{$errors->first('phone','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                	<br/>
                    {{ Form::submit("Submit", ["required"=>"required", "class"=>"button-2-colorful"]) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
<script>
console.log('fuck');
</script>
@stop