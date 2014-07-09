    <?php
    if(is_null($recentsettings)){
    	$recentsettings = new \Illuminate\Support\Collection;
    	$recentsettings->headerlogo = 'default.png';
    }
    ?>

@if(!Request::is('1/*') && !Request::is('corporate/*'))
    <header class="section header-2 boxed">
      @if(Session::has('flash_message'))  
        <div id="flashmessage" class="alert alert-error">    
                <strong>{{Session::get('flash_message')}}</strong>
            <span id="closeflash"> x </span>
        </div>
      @endif
        
    	<div class="header-top-wrapper">
    		<div class="zone-header-top zone clearfix">
    			<div class="header-top-left container-8">
    				<div class="user-links">
    					<div class="login">
    						<?php /*dd(Auth::salesperson()->user())*/ ?>
    						@if(Auth::user()->check())
                               
    						@elseif(Auth::salesperson()->check())
    						@if(isClient(Auth::salesperson()->user()->email))

    						<a href="#" id="login-link" class="login-link">Switch to Client</a>
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
    						<a href="#" id="login-link" class="login-link">Login</a>
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
    						<li class="empty neighbour-left">
    							<div></div>
    						</li>
                             @if(!subscribed())
                            <li {{ (Request::is('buy*') ? ' class="first active"' : '') }}>
                                <a href="{{ URL::to('/buy') }}">GET LISTED</a>
                            </li>
                            @endif
                            @if(hasBusiness())
                            <li class="">
                                 <a href="{{ URL::to(branchSlug()) }}">BUSINESS SETTINGS</a>
                            </li>
                            <li class="">
                                 <a href="{{ URL::to(businessSlug().'/branch') }}">BRANCH SETTINGS</a>
                            </li>
                            @else
                            <li class="">
                                <a href="{{ URL::to('business/add') }}">ADD BUSINESS</a>
                            </li>
                            @endif
                            <li>
                                <a href="javascript:void(0)">{{ strtoupper(Auth::user()->user()->firstname) }} &#x25BC</a>
                            <ul>
                          
                            <li class="">
                                <a href="{{ URL::to('client/password/edit') }}">CHANGE PASSWORD</a>
                            </li>
                            <li>
                                <a href="{{ URL::to('clear') }}">LOGOUT</a>
                            </li>
                            </ul>
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

