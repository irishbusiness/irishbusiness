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

//bloglist = localhost:8000/blog    method=get
//blogpost = localhost:8000/blog/{id}   method=get
//editblogpost = localhost:8000/blog/{id}/edit  method=get
//addblog   =   localhost:8000/blog/    => method=post
//updateblog   =   localhost:8000/blog/    => method=put

Route::resource('blog', 'BlogController');

Route::get('gettweets', function()
{
    return Twitter::getUserTimeline(array('screen_name' => '_IrishBusiness', 'count' => 3, 'format' => 'json'));
});

Route::get('/', function()
{
	return View::make('client.index');
});

//Route::get('bloglist', 'BlogController@bloglist');
//
//Route::get('blog/{id}', 'BlogController@show');
//
//Route::get('blogpost', function(){
//	return View::make('client.blogpost');
//});

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

Route::get('admin_manage_categories',function(){
	return View::make('admin.admin_manage_categories');
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
	return View::make('admin.admin_settings_socialmedia');
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
Route::post("admin_settings_general", 'SettingsController@store');
Route::get('admin_settings_general', 'SettingsController@index');

