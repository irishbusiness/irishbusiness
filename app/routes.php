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

Route::model('blog/{id}', 'Blog');
Route::model('blog/{id}/edit', 'Blog');

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

Route::get('admin/settings/cancellations',function(){
	return View::make('admin.admin_manage_cancellations');
});

Route::get('admin/settings/clients', function(){
	return View::make('admin.admin_manage_clients');
});

Route::get('admin/settings/regions', function(){
	return View::make('admin.admin_manage_regions');
});

Route::get('admin/settings/staff', function(){
	return View::make('admin.admin_manage_staff');
});

Route::get('admin/settings/payment-gateway', function(){
	return View::make('admin.admin_payment_gateway');
});



Route::get('admin/settings/socialmedia', function(){
    $social =   SocialMedia::first();
	return View::make('admin.admin_settings_socialmedia', compact('social'));
});

Route::get('admin/settings/blog', 'BlogController@manageblog');

Route::post('admin/settings/blog', 'BlogController@store');

Route::model('settings/{businessSlug}', 'Business');
Route::get('settings/{businessSlug}', 'BusinessesController@sample');
Route::get('settings', 'BusinessesController@sample2');
Route::post('settings', 'BusinessesController@store');
// Route::post('search','BusinessesController@search');
Route::get('search', 'BusinessesController@search');
Route::get('listings','BusinessesController@index');
// Route::get('company-tab', 'BusinessesController@companytab');

// Route::get('company', 'BusinessesController@companytab');
Route::get('company/{name}', 'BusinessesController@companytab2');
Route::post('company/{name}', 'ReviewsController@store');

Route::get('edit/company/{slug}', 'BusinessesController@editcompany');
Route::post('edit/company/{slug}', 'BusinessesController@update');
Route::post('ajaxUpdateCategoryRemove', 'BusinessesController@update_category_remove');

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

//Login
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');


Route::post("admin/settings/general", 'SettingsController@store');
Route::get('admin/settings/general', 'SettingsController@index');

Route::get('admin/settings/subscription', 'SubscriptionController@index');
Route::post('admin/settings/subscription', 'SubscriptionController@store');
Route::post('editSubscription', 'SubscriptionController@edit');

Route::get('admin/settings/commission', 'SettingsController@show_commission');
Route::post('commissionAjax', 'SettingsController@edit_commission');

Route::get('admin/settings/categories', 'CategoriesController@index');
Route::post('categoryAjax', 'CategoriesController@add');
Route::put('socialmediaAjax', 'SocialMediaController@update');
Route::get('blogAjax', 'BlogController@blogAjax');
Route::post('addBlogAjax', 'BlogController@addBlogAjax');
Route::delete('deleteBlogAjax', 'BlogController@deleteBlogAjax');
Route::post('updateBlogAjax','BlogController@updateBlogAjax');

Route::get('clear',function(){
	Auth::user()->logout();
	Auth::salesperson()->logout();

	return Redirect::to('/');

});


Route::get('register/activate/{token}','UsersController@activate');

//PASSWORD RESET FOR CLIENT

Route::get('password/remind','ClientPasswordController@remind');

Route::post('password/remind','ClientPasswordController@sendRemind');

Route::get('/password/reset/{type}/{token}','ClientPasswordController@reset');

Route::post('/password/reset/{type}/{token}','ClientPasswordController@saveReset');


Route::get('buy', 'PaymentsController@index');
Route::post('buy','PaymentsController@store');



Route::get('resetMigration', function(){
    return View::make('db_resetScript');
});


Route::get('sales', 'SalesPersonsController@index');
Route::get('sales/invite','SalesPersonsController@invite');

Route::post('sales/invite','SalesPersonsController@store');

Route::get('sales/password/edit','SalesPersonsController@changePassword');
Route::post('sales/password/edit','SalesPersonsController@updatePassword');

Route::get('try',function(){
	
	/*return dd(is_null(User::with('subscription')->find(1)->first()->subscription->first()));*/

	if(Auth::user()->check())
		{
			$business = Auth::user()->user()->business;
			if (!is_null($business))
				return Redirect::to('edit/company/'.$business->slug);
		}

	
});

App::missing(function($exception)
{
    return View::make('pagenotfound');
});
Route::get('notfound', function(){
	return View::make('pagenotfound');
});

Route::get('todo',function(){
	return View::make('todo');
});
