@extends('admin.layouts.default')

@section('slider')
	@include('sales.partials._slider')
@stop

@section('actual-body-content')
 <div class="blog-post block">
        <div class="block-title marginize">
            <h1>Invite</h1>
        </div>
    </div>
	<div class="comments block">
        <div class="comment-message">
            @if(Session::has('error'))
                <br/>
                <span class="alert-error status">{{Session::get('errors')}} </span>
            @endif
            {{ Form::open(array('url'=>'sales/invite','method' => 'post','id' =>'formsales')) }}
               

                <div class="form-group">
                    {{ Form::label('email', "Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('email', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"email"]) }}
                    {{$errors->first('email','<span class="alert-error2">:message</span>')}}
                </div>
                <div class="form-group">
                {{ Form::label('firstname', "Firstname", ["required"=>"required", "class"=> "text-colorful"]) }}
                <br>
                {{ Form::text('firstname', '', ["required"=>"required", "class"=>"text-input-grey full",
                    "placeholder"=>"Firstname"]) }}
                    {{$errors->first('firstname','<span class="alert-error2">Please enter your firstname.</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('lastname', "Lastname", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('lastname', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"Lastname"]) }}
                    {{$errors->first('lastname','<span class="alert-error2">Please enter your lastname.</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', "Phone", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::text('phone', '', ["required"=>"required", "class"=>"text-input-grey full",
                        "placeholder"=>"Phone number"]) }}
                    {{$errors->first('phone','<span class="error">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('type', "Type", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::select('type', $commissions, ["required"=>"required", "class"=>"text-input-grey full"]) }}
                    {{$errors->first('phone','<span class="error">:message</span>')}}
                    
                </div>
                <div class="form-group" id="salesteamdiv">
                    {{ Form::label('st', "Sales Team Email", [ "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('st', '', [ "class"=>"text-input-grey full",
                        "placeholder"=>"search by name or email",'id'=>'st','autocomplete'=>'off']) }}
                    

                    <div id="steamdiv">
                    @foreach($salesteams as $salesteam)
                       <div class="steam">{{$salesteam->firstname}} {{$salesteam->lastname}} -- <span class="spanteam">{{$salesteam->email}}</span></div>
                    @endforeach
                    </div> <!-- end steamdiv --> 

                    {{$errors->first('st','<p class="alert-error2">:message</p>')}}  
                </div>
                <div class="form-group" id="teamleaderdiv">
                    {{ Form::label('tl', "Team Leader Email", ["required"=>"required", "class"=> "text-colorful"]) }}
                    <br>
                    {{ Form::email('tl', '', [ "class"=>"text-input-grey full",
                        "placeholder"=>"search by name or email",'id'=>'tl','autocomplete'=>'off']) }}

                    <div id="leaderdiv">
                    @foreach($teamleaders as $teamleader)
                       <div class="teamleader">{{$teamleader->firstname}} {{$teamleader->lastname}} -- <span class="spanteam">{{$teamleader->email}}</span></div>
                    @endforeach
                    </div> <!-- end steamdiv -->   
                    {{$errors->first('tl','<p class="alert-error2">:message</p>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('customCode', "Custom Code", [ "class"=> "text-colorful"]) }}
                    <br>
                    {{Form::checkbox('customCode', '1', false)}} 
                    <span id="showcode">
                        {{ Form::text('coupon', '', [ "class"=>"text-input-grey",
                            "placeholder"=>"max 6 characters",'id'=>'coupon','maxlength'=>"6",'maxlength'=>"6"]) }} 
                    </span> 
                        {{$errors->first('coupon','<span id="errorcoupon" class="alert-error2">:message</span>')}}
                </div>
                <div class="form-group">
                    {{ Form::label('captcha', "What is the capital of Ireland?", ["class" => "text-colorful"]) }}
                    {{ Form::text('captcha', '', ["required"=>"required", "class"=>"text-input-grey",
                        "placeholder"=>"What is the capital of Ireland?", "title" => "Prove to us you're not a robot."]) }}
                    {{$errors->first('captcha','<span id="errorcaptcha" class="alert-error2">:message</span>')}}
                </div>

                <div class="form-group">
                	<br/>
                    {{ Form::submit("Submit", [ "class"=>"button-2-colorful",'id' =>'sbmit']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('sidebar')
    @include('client.partials._sidebar')
@stop

@section('linksfirst')
    <style>
        #coupon{
            width:100px;
        }
        .steam{
            display:none;
            padding-left: 10px;
            border-bottom: 1px solid #e3e3e3;
        }
        .steam:hover, .hovered{
            background-color:#98B709;
            cursor:pointer;
        }
        .teamleader{
            display:none;
            padding-left: 10px;
            border-bottom: 1px solid #e3e3e3;
        }
        .teamleader:hover{
            background-color:#98B709;
            cursor:pointer;
        }
        #steamdiv
        {
            
            top: 35px;
            left: 0px;
            right: 0px;
            z-index: 10;
            padding: 0px;
            margin: 0px 0px 0px 12px;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            width: 293px;
        }
        #salesteamdiv
        {
           display:none; 
        }
        #teamleaderdiv
        {
            display:none;
        }
        #leaderdiv
        {

             top: 35px;
            left: 0px;
            right: 0px;
            z-index: 10;
            padding: 0px;
            margin: 0px 0px 0px 12px;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            width: 293px;
        
        }
        #showcode
        {
            display:none;
        }

    </style>
@stop

@section('scripts')
<script>
    //custom code
        $(document).on('change',"input[name=customCode]",function(){
            if($(this).is(':checked'))
            {
                $('#showcode').fadeIn(300);
                $('#coupon').attr('required','required');
            }
            else
            {
                $('#showcode').fadeOut(100);
                $('#coupon').val("");
                $('#coupon').removeAttr('required','required');
            }
        });

        $(function(){
            if( $('#formsales').find('.alert-error2').length )
            {
                if($('input[name=customCode]').is(':checked'))
                {
                    $('#showcode').css('display','inline');
                    $('#coupon').attr('required','required');
                }
                else
                {
                    $('#coupon').removeAttr('required','required');
                }

                if($('#type').val()==2)
                {
                    $('#salesteamdiv').css('display','block');
                }
                
                if($('#type').val()==3)
                {
                    $('#teamleaderdiv').css('display','block');
                }


            }
        });

</script>
@stop