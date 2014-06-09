<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/


View::share('selected', '');
View::share('reviews', 0);
View::share('title', 'The Irish Business Directory');

$recentsettings = MainSetting::orderBy('created_at', 'desc')->first();
$header_categories = Category::orderBy('name', 'asc')->get();

$recentlyaddedcompany = Business::orderBy('created_at', 'desc')->limit(5)->get();
$recentlyaddedblog	=	Blog::orderBy('created_at', 'desc')->limit(5)->get();
$socialmedia = SocialMedia::first();

View::share('recentsettings', $recentsettings);
View::share('header_categories', $header_categories);

View::share('recentlyaddedcompany', $recentlyaddedcompany);
View::share('recentlyaddedblog', $recentlyaddedblog);
View::share('socialmedia', $socialmedia);

App::before(function($request)
{
	
	globalXssClean();
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});


/*
|--------------------------------------------------------------------------
| Subscription
|--------------------------------------------------------------------------
|
*/

Route::filter('subscribed', function()
{
	if(Auth::user()->check())
	{
		$id = Auth::user()->user()->id;
		if (is_null(Auth::user()->user()->subscription->first()))
			return Redirect::back();
	}

});


Route::filter('hasBusiness', function(){

		if(Auth::user()->check())
		{
			$business = Auth::user()->user()->business;
			if(!is_null($business))
				{
					if (!is_null($branch = $business->branches->first()))
						return Redirect::to('company/'.$business->slug .'/' . $branch->id);
					return Redirect::to('business/' . $business->slug . '/branch/add');
				}
		
		}
		else
		{
			return Redirect::to('/');
		}
		
});


/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

Route::filter('SPguest', function()
{
	if (Auth::salesperson()->guest()) return Redirect::to('/');
});



/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


Validator::extend('alpha_space', function($attr, $value) {
    return preg_match('/^([a-z\x20])+$/i', $value);
});

Route::filter('user', function(){
	if(!Auth::user()->check()) return Redirect::to('/');
});
