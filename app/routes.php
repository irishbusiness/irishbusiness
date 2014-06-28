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

Route::get('try',function(){

	$var = "&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;The Free TV Company was established in 2013 and is 100% Irish owned and operated. We have a team of highly experienced and qualified Installers nationwide.&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;line-height: 1.45em; background-color: initial;&quot;&gt;We carry out all types of repair work including replacing TV cable, aerials, satellite dishes. We offer a dish / aerial realignment service, as well as replacing old and grubby aerials and dishes which are an slightly feature on any home./business. We are specialists when it comes to the installation of Free To Air systems. We provide all the necessary equipment so that you can sit back and enjoy all your favourite FTA channels for a once off fee with no monthly bills or subscription. We are happy to install in 2nd or subsequent rooms so that you can avoid the multi room charges incurred with Subscription TV. We can install magic eye and offer a range of other services. Please visit our website &lt;a href=&quot;http://www.novatel.ie&quot;&gt;www.novatel.ie&lt;/a&gt; or email ftvc@novatel.ie.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;line-height: 1.45em; background-color: initial;&quot;&gt;The Free TV Company, a division of Novatel Direct Sales and Marketing Ltd. Novatel was established in 2007 and became incorporated in 2013, the two directors of Novatel have a combined 30 years&rsquo; experience in the cable and satellite TV business, having sold and installed thousands of systems nationwide.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;line-height: 1.45em; background-color: initial;&quot;&gt;The Free TV Company, is dedicated to providing a top class free to view television service to households and business, for a ONCE OFF payment with NO MONTHLY BILLS EVER. As an alternative to the very expensive dominant pay tv providers.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Many of the channels which other companies charge you for, are actually available FREE of charge NO subscription necessary.&lt;br&gt;With The FREE TV Company you pay us a once off fee, we send one of our highly trained installers to your home/business who will supply and install all the equipment which you immediately own, and you will NEVER get a bill in the door, never get switched off but yet get fantastic entertainment&lt;br&gt;Our motto, why pay for great tv when you can have it for FREE !!!!!!!!!!!!&lt;br&gt;As well as sales &amp;amp; Installations of Free to Air Systems, our nationwide team of highly skilled and experienced Installers can repair any problem you may have, from realigning dishes to replacing faulty aerials, you name it we can do it.&lt;br&gt;If you need extra caballing, want to move or add TV to additional rooms, move home call The FREE TV Company, we will give you an honest, reliable service that you can depend on.&lt;br&gt;We have our head office in Blackpool Cork with a retail outlet in Buttevant North Cork, but our installers work nationwide. We will always answer the phone and are available to speak with you long after we have done business with you, which is a problem in the Industry.&lt;br&gt;When you deal with The FREE TV Company you know you can trust, depend and rely on our service, not just on the day but in the future.&lt;br&gt;FREE TV EXPLAINED&lt;/p&gt;&lt;p&gt;WHAT IS FREE TO AIR SATELLITE ?&lt;br&gt;Freesat is a Free to Air Satellite service which was launched in May 2008. This service offers over 130 Digital and High Definition TV and Radio channels. Free to Air Satellite is a term used to describe Satellite signals which you can legally receive without a subscription. Free to Air programming is encoded with MPEG 2, but is not encrypted, and therefore freely available, hence the term Free to Air. This is the platform where all the UK and Free to Air channels come from.&lt;/p&gt;&lt;p&gt;WHAT IS SAORVIEW ?&lt;br&gt;Saorview is the Irish National TV service, which was launched in 2012 and required a receiver (or set top box) to receive the channels, and replaced the old Analogue service which did not require a set top box. This is the platform that provides all the Irish Saorview Digital and High Definition TV channels, and Digital Radio Channels (DAB).&lt;/p&gt;&lt;p&gt;WHAT IS THE FREE TV COMPANY COMBINATION SYSTEM ?&lt;br&gt;Freesat is available stand alone via a satellite dish, and provides all the UK and Free to air satellite channels, and is an option for someone who has purchased Saorview TV with built In receiver, who requires additional channels. Saorview provides the Irish channels via a Digital Aerial, and is an option for someone who has a Freesat system, who wants to receive the Irish channels also. THE COMBINATION SYSTEM, our best seller, combines both systems through a single, simple to use combination box, with just the one remote control (provided) required to operate.&lt;/p&gt;&lt;p&gt;Q &amp;amp; A&lt;br&gt;Q Can I have Free to Air multiroom.&lt;br&gt;A Yes.&lt;br&gt;Q Can I record.&lt;br&gt;A Yes&lt;br&gt;Q I have a dish/aerial, can they be used.&lt;br&gt;A Yes, If they are in good condition.&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;\r\n";
	echo decode($var);
	echo "<hr/>";
	echo "<br/>";
	$var2 = "&lt;p&gt;&lt;/p&gt;&lt;p&gt;We design and custom build glass design for domestic and commercial projects.&amp;nbsp;&lt;/p&gt;&lt;blockquote style=&quot;margin: 0 0 0 40px; border: none; padding: 0px;&quot;&gt;&lt;p&gt;&bull;Stained Glass &bull;Imitation Stained Glass &bull;Sand Blasted Products (mirrors, door units etc.) &bull;Double Glazing &bull;Full consultancy Service&amp;nbsp;&lt;span style=&quot;line-height: 1.45em; background-color: initial;&quot;&gt;&bull;Full Glazing Service&lt;/span&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;Andy&rsquo;s Glass design was founded buy one of Galway&rsquo;s best known glass designers Andy Keane! After graduating from Fine Art in the early 90&rsquo;s, expanded he skills into the stained Glass trade and quickly became popular for his work.&lt;/p&gt;&lt;p&gt;Now with his own business Andy deals with a range of customers from one off private homes to commercial and retail outlets. His one on one relaxed approach makes Andy very easy to deal with and gives you the sense of uniqueness that his work is renowned for. Take a look at some of Andy&rsquo;s past work in the gallery section of the website or click on contact to arrange a free consultation.&lt;/p&gt;&lt;p&gt;Products&amp;nbsp;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p class=&quot;profile-description-img-thumbnail&quot;&gt;&lt;img src=&quot;../../images/blog/2ea4e6852df883a70360ee61d00214a2.jpg&quot; class=&quot;video-thumbnail&quot;&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;Using the right amount of lead detail combined with the use of bevels, color or sandblast effects can produce a unique and eye-catching work of art. Whether it is of picturesque, ornate, abstract or minimal in theme, a carefully designed project helps capture ambiance and beauty that becomes a focal point for dwellers and visitors alike.&lt;/p&gt;&lt;p&gt;If you have any queries regarding products, design or pricing please call and help will be offered with an honest, professional, discrete and efficient manner. Thank You.&lt;/p&gt;&lt;br&gt;&lt;p&gt;&lt;/p&gt;\r\n";
	echo strip_tags(decode($var2));
});

Route::post('/approveReviewAjax', 'ReviewsController@approveReviewAjax');
Route::post('/disapproveReviewAjax', 'ReviewsController@disapproveReviewAjax');
Route::get('{businessSlug}/branch', 'BusinessesController@showBranches');
Route::get('/{branchId}/branch/delete', 'BusinessesController@deleteBranch');

Route::get('1/{slug}', 'BusinessesController@companytab2');
Route::get('1/{slug}/{branch}', 'BusinessesController@companytab2');

Route::get('{slug}', 'BusinessesController@companytab2');
Route::get('{slug}/{branch}', 'BusinessesController@companytab2');

