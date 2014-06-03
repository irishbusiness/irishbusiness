<?php

use IrishBusiness\Repositories\CategoryRepository;

class BusinessesController extends \BaseController {

	protected $category;

	function __construct(CategoryRepository $category)
	{
		$this->category = $category;
		// $this->beforeFilter('user', ['only' => ['sample']]);
		// $this->beforeFilter('subscribed',['only' => ['sample']]);
		$this->beforeFilter('csrf', ['on' => 'post']);
	}

	public function index()
	{
		$businesses = Business::all();
		return View::make('searchpartial.listings')->with('title','Listings')
		->with('businesses',$businesses);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	public function search()
	{

		$category = trim(Input::get('category'));
		$addresses = explode(' ',Input::get('location'));
		$selected = Input::get('category-default');
		
		// if (intval(Input::get('page'))>0){
		// 	$category = Session::get('category');
		// 	$addresses = Session::get('addresses');
		// }else{
		// 	 $category = trim(Input::get('category'));
		// 	  $addresses = explode(' ',Input::get('location'));
		// 	  $selected = Input::get('category-default');
		// }


		$query1 = 'and ';
		foreach($addresses as $address)
		{
			$query1 .= '(';
			$string = trim(preg_replace('/,/', '', $address));
			$query1 .= "businesses.address like '%$string%' or businesses.locations like '%$string%'"; 
			$query1 .= ')and ';
		}
		$query1 .= "businesses.locations like '%%'";

		$business5 = Business::WhereHas('categories', function($q) use($category,$query1)
		{
		      $q->whereRaw("(name like '%$category%' or businesses.name like '%$category%' or businesses.keywords like '%$category%')  $query1");	     
		})->paginate(3);

	/*	$business5 = Business::WhereHas('categories', function($q) use($category)
		{
		      $q->whereRaw("name like '%$category%' or businesses.name like '%$category%'");	     
		})->WhereRaw("name like '%' $query1")->get();*/
		/*$business5 = Business::WhereHas('categories', function($q) use($category)
		{
		      $q->whereRaw("MATCH(name) AGAINST('+*$category*' IN BOOLEAN MODE)");    
		})->get();*/
		Session::put('category', Input::get('category'));
		Session::put('location', Input::get('location'));
		return View::make('client.searchresults')->with('businesses',$business5)
		->with('category',$category)
		->with('location',Input::get('location'))
		->with('selected',$selected);
	}

	public function sample()
	{
		$categories = $this->category->getCategories();
		Session::forget('category');
		
		// return View::make('searchpartial.settings')->with('title','Settings')
		// ->with('categories',$categories);
		return View::make('client.settings')->with('title','Settings')
		->with('categories',$categories);
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$address = Input::get('address1') . ',' . Input::get('address2') . ',' . Input::get('address3')  . ',' .Input::get('address4');
		$business = new Business;
		$business->name = Input::get('businessname');
		$business->address = $address;
		$business->keywords = Input::get('keywords');
		$business->locations = Input::get('locations');
		$business->phone    =   Input::get('phone');
		$business->website    =   Input::get('website');
		$business->email    =   Input::get('email');
        $business->business_description    =   Input::get('business_description');
		$business->profile_description   =   Input::get('profile_description');
		$business->mon_fri   =   Input::get('mon_fri');
		$business->sat   =   Input::get('sat');
		$business->facebook   =   Input::get('facebook');
		$business->twitter  =   Input::get('twitter');
		$business->google  =   Input::get('google');
        // $business->user_id = Auth::user()->get()->id;
        $business->user_id = 1;


        $business->slug = Input::get('businessurl');

        // logo
        if( Input::hasFile('logo'))
        {
            $dir = $dir = public_path().'/images/companylogos/';
            $image  =   Input::file('logo');
            $imagename = md5(date('YmdHis')).'.jpg';
            $filename = $dir.$imagename;

            if ($image->getMimeType() == 'image/png'
                || $image->getMimeType() == 'image/jpg'
                || $image->getMimeType() == 'image/gif'
                || $image->getMimeType() == 'image/jpeg'
                || $image->getMimeType() == 'image/pjpeg')
            {
                $image->move($dir, $filename);
                $business->logo  =   'images/companylogos/'.$imagename;
            } else {
                $business->logo  =   'images/companylogos/'.$imagename;
            }

        } else {
            $business->logo  =   'images/companylogos/sample_company.jpg';
        }

		$business->save();

		$id = $business->id;

		$business = Business::findOrFail($id);

		$categories = Session::get('categories');
		Session::forget('categories');

		if($categories != ''){
        foreach($categories as $category)
		{
			$business->categories()->attach($category);
		}
        }
		return Redirect::to('/listings');
	
	}

	public function companytab(){
		$id = 1;
		$blog_id = 1;
		$reviews = Review::orderBy("created_at", "desc")->get();
		$businessinfo = Business::findOrFail($id)->first();
		$blogs = Blog::where('business_id', '=', $blog_id)->orderBy('created_at', 'desc')->get();
		// $businessinfo = Business::all();
		return View::make('client.company-tab')->with('businessinfo', $businessinfo)->with('blogs', $blogs)
			->with('reviews', $reviews);
	}

	public function companytab2($name){
		$id = 1;
		$blog_id = 1;
		$reviews = Review::orderBy("created_at", "desc")->get();
		$businessinfo = Business::whereSlug($name)->first();
		$blogs = Blog::where('business_id', '=', $blog_id)->orderBy('created_at', 'desc')->get();
		// $businessinfo = Business::all();
		return View::make('client.company-tab')->with('businessinfo', $businessinfo)->with('blogs', $blogs)
			->with('reviews', $reviews);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}