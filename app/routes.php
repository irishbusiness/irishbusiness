<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('gettweets', function()
{
    return Twitter::getUserTimeline(array('screen_name' => '_IrishBusiness', 'count' => 3, 'format' => 'json'));
});

Route::get('/', function()
{
	return View::make('client.index');
});

// Route::get('/', 'HomeController@index');

Route::resource('blog', 'BlogController');

Route::get('bloglist', 'BlogController@bloglist');

Route::get('blog/{id}', 'BlogController@show');

Route::get('blogpost', function(){
	return View::make('client.blogpost');
});

Route::get('contact-us', function(){
	return View::make('client.contact-us');
});

Route::get('register', function(){
	return View::make('client.register');
});

Route::get('login', function(){
	return View::make('client.login');
});

Route::get('searchresults', function(){
	return View::make('client.searchresults');
});

Route::get('tabs', function(){
	return View::make('client.tabs');
});

Route::get('admin_manage_cancellations',function(){
	return View::make('admin.admin_manage_cancellations');
});

Route::get('admin_manage_clients', function(){
	return View::make('admin.admin_manage_clients');
});

Route::get('admin_manage_regions', function(){
	return View::make('admin.admin_manage_regions');
});

Route::get('admin_manage_staff', function(){
	return View::make('admin.admin_manage_staff');
});

Route::get('admin_payment_gateway', function(){
	return View::make('admin.admin_payment_gateway');
});



Route::get('admin_settings_socialmedia', function(){
    $social =   SocialMedia::first();
	return View::make('admin.admin_settings_socialmedia', compact('social'));
});

Route::get('admin_manage_blog', function(){
	return View::make('admin.admin_manage_blog');
});

Route::post('admin_manage_blog', 'BlogController@store');

Route::get('settings', 'BusinessesController@sample');
Route::post('settings', 'BusinessesController@store');
// Route::post('search','BusinessesController@search');
Route::get('search', 'BusinessesController@search');
Route::get('listings','BusinessesController@index');
// Route::get('company-tab', 'BusinessesController@companytab');
Route::get('company', 'BusinessesController@companytab');
Route::post('company', 'ReviewsController@store');

Route::get('register', 'UsersController@create');
Route::post('register', 'UsersController@store');

Route::post('category', 'CategoriesController@store');
Route::post('ajaxCategory','CategoriesController@tempAdd');
Route::post('ajaxCategoryRemove','CategoriesController@categoryRemove');

Route::get('company-tabs-page', function(){
	return View::make('client.company-tabs-page');
});

Route::get('clone-of-index', function(){
	return View::make('client.clone-of-index');
});


Route::get('listing/{id}/{category?}/{location?}', function($id){
	return Business::find($id)->toArray();
});


Route::get('register', 'UsersController@create');
Route::post('register', 'UsersController@store');
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::post('login2', 'SessionsController@salesLogin');

Route::post("admin_settings_general", 'SettingsController@store');
Route::get('admin_settings_general', 'SettingsController@index');

Route::get('admin_settings_subscription', 'SubscriptionController@index');
Route::post('admin_settings_subscription', 'SubscriptionController@store');
Route::post('editSubscription', 'SubscriptionController@edit');

Route::get('admin_manage_commission', 'SettingsController@show_commission');
Route::post('commissionAjax', 'SettingsController@edit_commission');

Route::get('admin_manage_categories', 'CategoriesController@index');
Route::post('categoryAjax', 'CategoriesController@add');
Route::put('socialmediaAjax', 'SocialMediaController@update');
Route::get('blogAjax', 'BlogController@yeah');
Route::post('addBlogAjax', 'BlogController@addBlogAjax');
Route::delete('deleteBlogAjax', 'BlogController@deleteBlogAjax');

Route::get('clear',function(){
	Auth::user()->logout();
	Auth::salesperson()->logout();

});


Route::get('register/activate/{token}','UsersController@activate');

//PASSWORD RESET FOR CLIENT

Route::get('password/remind','ClientPasswordController@remind');

Route::post('password/remind','ClientPasswordController@sendRemind');

Route::get('/password/reset/{type}/{token}','ClientPasswordController@reset');

Route::post('/password/reset/{type}/{token}','ClientPasswordController@saveReset');


Route::get('test',function(){

	return View::make('client.buy');
});
Route::post('test',function(){

	
	Stripe::setApiKey(Config::get('stripe.secret_key'));

	// Get the credit card details submitted by the form
	$token = $_POST['stripeToken'];

	// Create the charge on Stripe's servers - this will charge the user's card
	try {
	$charge = Stripe_Charge::create(array(
	  "amount" => 1000, // amount in cents, again
	  "currency" => "eur",
	  "card" => $token,
	  "description" => "payinguser@example.com")
	);
	} catch(Stripe_CardError $e) {
	  // The card has been declined
		var_dump($e);
	}

	return 'Thank you for your purchasing our services.';
});

Route::get('resetMigration', function(){
    return View::make('db_resetScript');
});


Route::get('sales', 'salespersonsController@index');
Route::get('sales/invite','salespersonsController@invite');

Route::post('sales/invite','salespersonsController@store');

Route::get('try',function(){
	
	return dd(is_null(User::with('subscription')->find(1)->first()->subscription->first()));
	
});