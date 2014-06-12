@extends('client.layouts.default')

@section('actual-body-content')
 <div class="blog-post block">
        <div class="block-title">
            <h1>Enter Discount Code</h1>
        </div>
    </div>

	<div class="comments block">
        <div class="comment-message center">
    		@if(Session::has('error'))
                <br/>
                <span class="alert-error status">{{Session::get('error')}} </span>
            @endif       
            {{ Form::open(array('url' => 'couponcode','method' => 'post', "id"=>"form-register")) }}
               <div class="form-group">
                    {{ Form::label('code', "Discount Code", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('code','', ["required"=>"required", "class"=>"text-input-grey half",'maxlength'=>'9']) }}
                    @if(Session::has('code'))
                    <span class="alert alert-error block half">{{Session::get('oldpass')}}</span>
                    @endif
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