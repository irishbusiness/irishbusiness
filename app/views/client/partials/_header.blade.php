    <?php
    if(is_null($recentsettings)){
    	$recentsettings = new \Illuminate\Support\Collection;
    	$recentsettings->headerlogo = 'default.png';
    }
    if(!isset($socialmedia)){
        $socialmedia = new \Illuminate\Support\Collection;
        $socialmedia->pinterest = "";
        $socialmedia->dribbble = "";
        $socialmedia->facebook = "";
        $socialmedia->google = "";
        $socialmedia->twitter = "";
        $socialmedia->linkedin = "";
    }
    ?>

@if(!Request::is('1/*') && !Request::is('corporate/*'))

    <header class="section header-2 boxed">
      @if(Session::has('flash_message'))  
        <div id="flashmessage" class="alert alert-error">    
                {{Session::get('flash_message')}}
            <span id="closeflash"> x </span>
        </div>
      @endif
       @if(Session::has('flashInfo_message'))  
        <div id="flashInfomessage" class="alert alert-info">    
                {{Session::get('flash_message')}}
            <span id="closeInfoflash"> x </span>
        </div>
      @endif
        
    	<div class="header-top-wrapper">
    		<div class="zone-header-top zone clearfix">
    			<div class="header-top-left container-8">
    				<div class="user-links">
    					<div class="login">
    						<?php /*dd(Auth::salesperson()->user())*/ ?>
    						@if(Auth::user()->check())
        						<a href="javascript:void(0)" id="login-link" class="login-link">Switch to Sales</a>
        						{{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
        						{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
        						{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
        						<span id="errordiv" >
        						</span>
        						<a href="/password/remind" class="password-restore">Forgot Password?</a>
        						<input class="button-2-colorful" type="submit" value="Login">
        						{{Form::close()}}

    						@elseif(Auth::salesperson()->check())
        						@if(isClient(Auth::salesperson()->user()->email))

            						<a href="javascript:void(0)" id="login-link" class="login-link">Switch to Client</a>
            						{{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
            						{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
            						{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
            						<span id="errordiv" >
            						</span>
            						<a href="/password/remind" class="password-restore">Forgot Password?</a>
            						<input class="button-2-colorful" type="submit" value="Login">
            						{{Form::close()}}
        						@endif
        					@else
        						<a href="javascript:void(0)" id="login-link" class="login-link">Login</a>
        						{{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
        						{{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
        						{{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
        						<span id="errordiv" >
        						</span>
        						<a href="/password/remind" class="password-restore">Forgot Password?</a>
        						<input class="button-2-colorful" type="submit" value="Login">
        						{{Form::close()}}	
        					@endif			
    					</div>
    				</div>

    			</div>

    			<div class="header-top-right container-16">
    				<div class="social-links block">
                    @if($socialmedia->facebook != '')
    					<a href="{{ $socialmedia->facebook }}">
    						<img src="{{ URL::asset('images/facebook-icon.png') }}" alt="" />
    					</a>
                    @endif
                    @if($socialmedia->google != '')
    					<a href="{{ $socialmedia->google }}">
    						<img src="{{ URL::asset('images/google-icon.png') }}" alt="" />
    					</a>
                    @endif
                    @if($socialmedia->twitter != '')
    					<a href="{{ $socialmedia->twitter }}">
    						<img src="{{ URL::asset('images/twitter-icon.png') }}" alt="" />
    					</a>
                    @endif
                    @if($socialmedia->linkedin != '')
    					<a href="{{ $socialmedia->linkedin }}">
    						<img src="{{ URL::asset('images/linkedin-icon.png') }}" alt="" />
    					</a>
                    @endif
                    @if($socialmedia->pinterest != '')
    					<a href="{{ $socialmedia->pinterest }}">
    						<img src="{{ URL::asset('images/pinterest-icon.png') }}" alt="" />
    					</a>
                    @endif
                    @if($socialmedia->dribbble != '')
    					<a href="{{ $socialmedia->dribbble }}">
    						<img src="{{ URL::asset('images/dribbble-icon.png') }}" alt="" />
    					</a>
                    @endif
    				</div>

    			</div>

    		</div><!-- end of .zone-header-top -->
    	</div><!-- end of .header-top-wrapper -->

    	<div class="header-wrapper">
    		<div class="zone-header zone clearfix">

    			<div class="header-left container-4">

    				<div class="logo block">
    					<a href="{{ URL::to(Request::root()) }}">
    						<img class="header-logo-img" src="{{ URL::asset('/images/logo/header/'.$recentsettings->headerlogo) }}" alt="" />

    					</a>
    				</div>

    			</div>

    			<div class="header-right container-20">

    				<div class="main-menu block">
    					<ul id="sf-menu">
    						<li {{ (Request::is('/') ? ' class="first active"' : '') }}>
    							<a href="{{ URL::to('/') }}">HOME</a>
    						</li>
    						<li {{ (Request::is('blog*') ? ' class="first active"' : '') }}>
    							<a href="{{ URL::to('blog') }}">BLOG</a>
    						</li>
    					</ul>
    				</div>
    			</div>
    		</div>
    	</div><!-- end of .zone-header -->

    </header>

@else
    <header class="section header-2 boxed">
      @if(Session::has('flash_message'))  
        <div id="flashmessage" class="alert alert-error">    
                <strong>{{Session::get('flash_message')}}</strong>
            <span id="closeflash"> x </span>
        </div>
      @endif
        <div class="header-top-left container-8">
            <div class="user-links">
                <div class="login">
                    <?php /*dd(Auth::salesperson()->user())*/ ?>
                    @if(Auth::user()->check())
                        <a href="javascript:void(0)" id="login-link" class="login-link">Switch to Sales</a>
                        {{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
                        {{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
                        {{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
                        <span id="errordiv" >
                        </span>
                        <a href="/password/remind" class="password-restore">Forgot Password?</a>
                        <input class="button-2-colorful" type="submit" value="Login">
                        {{Form::close()}}

                    @elseif(Auth::salesperson()->check())
                        @if(isClient(Auth::salesperson()->user()->email))
                            <a href="javascript:void(0)" id="login-link" class="login-link">Switch to Client</a>
                            {{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
                            {{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
                            {{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
                            <span id="errordiv" >
                            </span>
                            <a href="/password/remind" class="password-restore">Forgot Password?</a>
                            <input class="button-2-colorful" type="submit" value="Login">
                            {{Form::close()}}
                        @endif
                    @else
                        <a href="javascript:void(0)" id="login-link" class="login-link">Login</a>
                        {{Form::open(['action'=>'SessionsController@store', 'id' =>'login-form', 'class' => 'login-form'])}}
                        {{Form::email('email','',['class' => 'text-input-grey', 'placeholder' => 'email'])}}
                        {{Form::password('password',['class' => 'text-input-grey', 'placeholder' => '********'])}}
                        <span id="errordiv" >
                        </span>
                        <a href="/password/remind" class="password-restore">Forgot Password?</a>
                        <input class="button-2-colorful" type="submit" value="Login">
                        {{Form::close()}}   
                    @endif          
                </div>
            </div>

        </div>
        <div class="header-top-wrapper">
            <div class="zone-header-top zone clearfix">
                <div class="header-top-right container-16">
                    <div class="social-links block">
                    @if($socialmedia->facebook != '')
                        <a href="{{ $socialmedia->facebook }}">
                            <img src="{{ URL::asset('images/facebook-icon.png') }}" alt="" />
                        </a>
                    @endif
                    @if($socialmedia->google != '')
                        <a href="{{ $socialmedia->google }}">
                            <img src="{{ URL::asset('images/google-icon.png') }}" alt="" />
                        </a>
                    @endif
                    @if($socialmedia->twitter != '')
                        <a href="{{ $socialmedia->twitter }}">
                            <img src="{{ URL::asset('images/twitter-icon.png') }}" alt="" />
                        </a>
                    @endif
                    @if($socialmedia->linkedin != '')
                        <a href="{{ $socialmedia->linkedin }}">
                            <img src="{{ URL::asset('images/linkedin-icon.png') }}" alt="" />
                        </a>
                    @endif
                    @if($socialmedia->pinterest != '')
                        <a href="{{ $socialmedia->pinterest }}">
                            <img src="{{ URL::asset('images/pinterest-icon.png') }}" alt="" />
                        </a>
                    @endif
                    @if($socialmedia->dribbble != '')
                        <a href="{{ $socialmedia->dribbble }}">
                            <img src="{{ URL::asset('images/dribbble-icon.png') }}" alt="" />
                        </a>
                    @endif
                    </div>

                </div>

            </div><!-- end of .zone-header-top -->
        </div><!-- end of .header-top-wrapper -->
        <div class="header-wrapper">
            <div class="zone-header zone clearfix">
                <div class="header-left container-4">
                    <div class="logo block"></div>
                </div>
            </div>
        </div><!-- end of .zone-header -->

    </header>
@endif