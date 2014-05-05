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

Route::get('/', function()
{
	return View::make('client.index');
});

Route::get('blog', function(){
	return View::make('client.blog');
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


Route::get('settings', 'BusinessesController@sample');
Route::post('settings', 'BusinessesController@store');
Route::post('search','BusinessesController@search');
Route::get('listings','BusinessesController@index');
Route::get('register', 'UsersController@create');
Route::post('register', 'UsersController@store');
Route::post('category', 'CategoriesController@store');
Route::post('ajaxCategory','CategoriesController@tempAdd');

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

