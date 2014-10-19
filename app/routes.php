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

 

Route::get('blog', 'AdminBlogController@index');

Route::get('bloglist', 'BlogController@bloglist');

Route::get('blog/add', 'AdminBlogController@add');
// Route::get('blog/add', 'BlogController@add');

Route::get('blog/{slug}/{id}', 'BlogController@show');

Route::get('blog/{slug}/edit/{id}', 'BlogController@edit');

Route::get('blog/{slug}/delete/{id}', 'BlogController@destroy');

Route::resource('blog', 'BlogController');

Route::get('blogpost', function(){
	return View::make('client.blogpost');
});

Route::post('addphoto', 'PhotogalleryController@addphoto');
Route::post('deletephoto', 'PhotogalleryController@deletephoto');


Route::get('contact-us', function(){
	return View::make('client.contact-us');
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

Route::get('admin/settings/invite', 'AdminController@invite');


Route::get('admin/settings/socialmedia', function(){
    $social =   SocialMedia::first();
	return View::make('admin.admin_settings_socialmedia', compact('social'));
});

// Route::get('admin/settings/blog', 'BlogController@manageblog');

// Route::post('admin/settings/blog', 'BlogController@store');

Route::get('admin/settings/blog', 'AdminBlogController@manageblog');

Route::post('admin/settings/blog', 'AdminBlogController@store');


Route::get('business/add', 'BusinessesController@addBusiness');
Route::post('ajaxDeleteBusiness', 'BusinessesController@delete_business');

Route::post('ajaxSaveCoupon', 'BusinessesController@save_coupon');
Route::post('ajaxDeleteCoupon', 'BusinessesController@delete_coupon');

Route::post('ajaxUpdateKeywords', 'BusinessesController@update_business_keywords');
Route::post('ajaxDeleteKeywords', 'BusinessesController@delete_business_keywords');

Route::post('settings', 'BusinessesController@store');

Route::get('search', 'BusinessesController@search');
Route::get('listings','BusinessesController@index');

Route::get('company', 'BusinessesController@search');
Route::post('company/{name}', 'ReviewsController@store');

Route::get('edit/business/{slug}/{branchId}', 'BusinessesController@editcompany');
Route::post('edit/company/{slug}/{branchId}', 'BusinessesController@update');

Route::post('ajaxUpdateCategoryRemove', 'BusinessesController@update_category_remove');
Route::post('ajaxUpdateCategoryAdd', 'BusinessesController@update_category_add');

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

Route::get('flush', function(){
	Session::flush();
	return Redirect::to('/');
});


Route::get('register/activate/{token}','UsersController@activate');


Route::get('password/remind','ClientPasswordController@remind');

Route::post('password/remind','ClientPasswordController@sendRemind');

Route::get('/password/reset/user/{token}','ClientPasswordController@reset');

Route::post('/password/reset/user/{token}','ClientPasswordController@saveReset');


Route::get('password/remind','SalesPasswordController@remind');

Route::post('password/remind/sales','SalesPasswordController@sendRemind');

Route::get('password/reset/salesperson/{token}','SalesPasswordController@reset');

Route::post('password/reset/salesperson/{token}','SalesPasswordController@saveReset');

Route::get('couponcode', 'PaymentsController@addcode');
Route::post('couponcode', 'PaymentsController@storecode');
Route::get('buy', 'PaymentsController@index');
Route::post('buy','PaymentsController@store');

Route::post('cashchk_couponcode', 'PaymentsController@store_cash_chk_coupon');


Route::get('resetMigration', function(){
    return View::make('db_resetScript');
});


Route::get('sales', 'SalesPersonsController@index');
Route::get('sales/invite','SalesPersonsController@invite');

Route::post('sales/invite','SalesPersonsController@store');

Route::get('sales/password/edit','SalesPersonsController@changePassword');
Route::post('sales/password/edit','SalesPersonsController@updatePassword');

Route::get('client/password/edit','UsersController@changePassword');
Route::post('client/password/edit','UsersController@updatePassword');


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


Route::get('business/{slug}/branch/add','BusinessesController@addBranch');

Route::post('business/{slug}/branch/add', 'BusinessesController@storeBranch');

Route::get('business/{slug}/branch/{id}/map', 'BusinessesController@setMap');

Route::get('business/{slug}/settings', 'BusinessesController@companytab2');
Route::post('business/{slug}/settings', 'BusinessesController@save_coupon');

Route::post('addmap','BusinessesController@storeMap');	

Route::get('try', function(){
	$x= "B&B  Clarecheap, accommodationennis hotels, Shannon hotels";
	// return removeCommonWords($x);
	 $x= "Bamp;B";
	// return preg_replace('/amp;/', replacement, subject)($x);
	
});
Route::get('/ajaxCategoryId', 'CategoriesController@returnCategoryId');
Route::post('/ajaxCategoryName', 'CategoriesController@returnCategoryName');


Route::post('/approveReviewAjax', 'ReviewsController@approveReviewAjax');
Route::post('/disapproveReviewAjax', 'ReviewsController@disapproveReviewAjax');
Route::get('{businessSlug}/branch', 'BusinessesController@showBranches');
Route::get('/{branchId}/branch/delete', 'BusinessesController@deleteBranch');

Route::get('1/{slug}', 'BusinessesController@companytab2');
Route::get('1/{slug}/{branch}', 'BusinessesController@companytab2');
Route::get('corporate/{slug}', 'BusinessesController@companytab2');

Route::get('{slug}', 'BusinessesController@companytab2');
Route::get('{slug}/{branch}', 'BusinessesController@companytab2');

Route::get('{slug}/blog/{id}', 'BusinessesController@specific_blog');

Route::get('review/confirm/{token}', 'ReviewsController@confirm');

Route::get('get-categories/{id}', 'BusinessesController@showCategories');

?>