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

Route::get('pdf', function(){


		$name = "John Doe";
		$address = "Downtown Street 12";
		$city = "City";
		$zipcode = "10010";
		$country = "Norway";

		$txn_id = "taxation id";
		$item_name = "item name";
		$business_name = "business name";
		$amt = "229";
		$tax = "23"; 
		$amount = "229";

		$vat = ((float) $tax / 100 ) * (float) $amount;
		$totalAmount = $vat + (float) $amount;
		$balance = $totalAmount;

		// the template PDF file
		$filename = public_path()."/invoices/Invoice_Blank.pdf";

		$pdf = new \fpdi\FPDI();
		$pdf->AddPage();

		// import the template PFD
		$pdf->setSourceFile($filename);

		// select the first page
		$tplIdx = $pdf->importPage(1);

		// use the page we imported
		$pdf->useTemplate($tplIdx);

		//====================================================================
		// Write to the document
		//
		// The following section writes the actual texts into the document
		// template. Expect some trying and failing when placing the texts :)
		//
		// References:
		// http://www.fpdf.org/
		// http://www.fpdf.org/en/doc/setfont.htm
		// http://www.fpdf.org/en/doc/setxy.htm
		// http://www.fpdf.org/en/doc/setx.htm
		// http://www.fpdf.org/en/doc/ln.htm
		//====================================================================

		// set font, font style, font size.
		$pdf->SetFont('Times','B',10);

		$pdf->SetXY(138, 58);
		$pdf->Write(0, ucwords($txn_id));
		$pdf->Ln(4);

		$pdf->SetXY(138, 64);
		$pdf->Write(0, ucwords(date("Y-m-d")));
		$pdf->Ln(4);


		$pdf->SetXY(13, 123);
		$pdf->Write(0, ucwords($item_name));
		$pdf->Ln(8);

		$pdf->SetXY(58, 123);
		$pdf->Write(0, ucwords($business_name));
		$pdf->Ln(8);

		$pdf->SetXY(91, 123);
		$pdf->Write(0, ucwords($amt));
		$pdf->Ln(8);

		$pdf->SetXY(117, 123);
		$pdf->Write(0, ucwords("1"));
		$pdf->Ln(8);

		$pdf->SetXY(144, 123);
		$pdf->Write(0, ucwords($tax));
		$pdf->Ln(8);

		$pdf->SetXY(170, 123);
		$pdf->Write(0, ucwords($amount));
		$pdf->Ln(8);


		// set initial placement
		$pdf->SetXY(13, 70);

		// go to 25 X (indent)
		$pdf->SetX(25);

		// write
		$pdf->Write(0, ucwords(strtolower($name)));

		// move to next line
		$pdf->Ln(5);

		// The following section is basically a repetition of the previous for inserting more text.
		// repeat for more text:
		$pdf->SetX(25);
		$pdf->Write(0, ucwords(strtolower($address)));
		$pdf->Ln(5);
		$pdf->SetX(25);
		$pdf->Write(0, $zipcode . " " . ucwords(strtolower($city)));
		$pdf->Ln(5);
		$pdf->SetX(25);
		$pdf->Write(0,  ucwords(strtolower($country)));
		$pdf->Ln(5);

		$pdf->SetXY(170, 136);
		$pdf->Write(0, ucwords(strtolower('229')));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords($vat));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords($totalAmount));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords(strtolower('0.00')));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords($balance));
		$pdf->Ln(8);

		// all changes to PDF is now complete.


		//====================================================================
		// Output document
		// This section will give the user a download file dialog with the
		// generated document. The filename will be document.pdf
		//====================================================================

		// MSIE hacks. Need this to be able to download the file over https
		// All kudos to http://in2.php.net/manual/en/function.header.php#74736
		header("Content-Transfer-Encoding", "binary");
		header('Cache-Control: maxage=3600'); //Adjust maxage appropriately
		header('Pragma: public');
		$pdf->Output(public_path().'/invoices/invoice.pdf', 'F');
		exit;
});


Route::get('gettweets', function()
{
    return Twitter::getUserTimeline(array('screen_name' => '_IrishBusiness', 'count' => 3, 'format' => 'json'));
});

Route::get('/', function()
{
	return View::make('client.index');
});

// Route::get('/', 'HomeController@index');

// 

Route::get('blog', 'BlogController@index');

Route::get('bloglist', 'BlogController@bloglist');

Route::get('blog/add', 'BlogController@add');

Route::get('blog/{id}', 'BlogController@show');

Route::get('blog/{id}/edit', 'BlogController@edit');

Route::get('blog/{id}/delete', 'BlogController@destroy');

Route::resource('blog', 'BlogController');

Route::get('blogpost', function(){
	return View::make('client.blogpost');
});

Route::get('contact-us', function(){
	return View::make('client.contact-us');
});


/*Route::get('login', function(){
	return View::make('client.login');
});*/

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

Route::get('admin/settings/invite', 'AdminController@invite'); /*function(){
	return View::make('admin.admin_invite');
});*/



Route::get('admin/settings/socialmedia', function(){
    $social =   SocialMedia::first();
	return View::make('admin.admin_settings_socialmedia', compact('social'));
});

Route::get('admin/settings/blog', 'BlogController@manageblog');

Route::post('admin/settings/blog', 'BlogController@store');

Route::get('business/add', 'BusinessesController@addBusiness');
Route::post('ajaxDeleteBusiness', 'BusinessesController@delete_business');

Route::get('business/{businessSlug}', 'BusinessesController@showBusiness');
Route::post('ajaxSaveCoupon', 'BusinessesController@save_coupon');
Route::post('ajaxDeleteCoupon', 'BusinessesController@delete_coupon');

//post create business
Route::post('settings', 'BusinessesController@store');

// Route::post('search','BusinessesController@search');
Route::get('search', 'BusinessesController@search');
Route::get('listings','BusinessesController@index');
// Route::get('company-tab', 'BusinessesController@companytab');

Route::get('company', 'BusinessesController@search');
// Route::get('{slug}?', 'BusinessesController@companytab2');
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


Route::get('register/activate/{token}','UsersController@activate');

//PASSWORD RESET FOR CLIENT

Route::get('password/remind','ClientPasswordController@remind');

Route::post('password/remind','ClientPasswordController@sendRemind');

Route::get('/password/reset/user/{token}','ClientPasswordController@reset');

Route::post('/password/reset/user/{token}','ClientPasswordController@saveReset');

//PASSWORD RESET FOR SALES

Route::get('password/remind','SalesPasswordController@remind');

Route::post('password/remind/sales','SalesPasswordController@sendRemind');

Route::get('password/reset/salesperson/{token}','SalesPasswordController@reset');

Route::post('password/reset/salesperson/{token}','SalesPasswordController@saveReset');

Route::get('couponcode', 'PaymentsController@addcode');
Route::post('couponcode', 'PaymentsController@storecode');
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

Route::get('try',function(){

	$slug = "Glass Design, Stained Glass, Imitation Stained Glass, Sand Blasted Products, Double Glazing, Full consultancy Service, Full Glazing Service";
	echo keywordExplode($slug);

});

Route::post('/approveReviewAjax', 'ReviewsController@approveReviewAjax');
Route::post('/disapproveReviewAjax', 'ReviewsController@disapproveReviewAjax');
Route::get('{businessSlug}/branch', 'BusinessesController@showBranches');
Route::get('/{branchId}/branch/delete', 'BusinessesController@deleteBranch');

Route::get('1/{slug}', 'BusinessesController@companytab2');
Route::get('1/{slug}/{branch}', 'BusinessesController@companytab2');

Route::get('{slug}', 'BusinessesController@companytab2');
Route::get('{slug}/{branch}', 'BusinessesController@companytab2');

