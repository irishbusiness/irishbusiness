@extends('sales.layouts.default')

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
                   <?php
                        // if(Auth::user()->user()->access_level == 3){
                        //     // admin 
                        //     $salespeople = array("1"=>"Sales Team", "2"=>"Team Leader", "3"=>"Sales Person");
                        // }else{
                            $al = Auth::salesperson()->user()->access_level;

                            if( $al == 1 ){
                                $salespeople = array("2"=>"Team Leader", "3"=>"Sales Person");
                            }else if( $al == 2 ){
                                $salespeople = array("3"=>"Sales Person");
                            }else if( $al == 3 ){
                                $salespeople = array("");
                            }
                        // }

                    ?>
                    @if( $al != 3 )
                        {{ Form::select('type', $salespeople, ["required"=>"required", "class"=>"text-input-grey full"]) }}
                        {{$errors->first('phone','<span class="error">:message</span>')}}
                    @endif
                    @if( $al == 1 )
                        {{ Form::hidden('st', Auth::salesperson()->user()->id) }}
                        {{ Form::hidden('tl', '') }}
                    @elseif( $al == 2 )
                        {{ Form::hidden('tl', Auth::salesperson()->user()->id) }}
                        {{ Form::hidden('st', Auth::salesperson()->user()->st) }}
                    @endif
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
                    {{ Form::text('captcha', '', [ "class"=>"text-input-grey xxss2",
                        "placeholder"=>"Enter sum",'id'=>'coupon','maxlength'=>"3",
                        'maxlength'=>"3", 'required' => 'required']) }} 
                    {{$errors->first('captcha','<span id="errorcaptcha" class="alert-error2">:message</span>')}}
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