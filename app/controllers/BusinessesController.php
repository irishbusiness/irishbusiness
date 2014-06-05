<?php

use IrishBusiness\Repositories\CategoryRepository;
use IrishBusiness\Repositories\BusinessRepository;
use IrishBusiness\Forms\RegisterBusiness;
use IrishBusiness\Forms\UpdateBusiness;
use IrishBusiness\Forms\FormValidationException;

class BusinessesController extends \BaseController {

	protected $category;
	protected $business;
	protected $registerbusiness;

	function __construct(CategoryRepository $category, BusinessRepository $business, RegisterBusiness $registerbusiness,
			UpdateBusiness $updatebusiness)
	{
		$this->category = $category;
		$this->business = $business;
		$this->registerbusiness = $registerbusiness;
		$this->updatebusiness = $updatebusiness;
		$this->beforeFilter('user', ['only' => ['sample', 'sample2']]);
		$this->beforeFilter('subscribed', ['only' => ['sample', 'sample2']]);
		$this->beforeFilter('csrf', ['on' => 'post']);
	}

	public function index()
	{
		$businesses = $this->business->getAll();

		return View::make('searchpartial.listings')->with('title','Listings')
		->with('businesses',$businesses);
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
		
		$rating = array();
		foreach ($business5 as $business) {
			array_push($rating, Review::where('business_id', '=', $business->id)->avg('rating'));
		}
		Session::put('category', Input::get('category'));
		Session::put('location', Input::get('location'));
		return View::make('client.searchresults')->with('businesses',$business5)
			->with('category',$category)
			->with('location',Input::get('location'))
			->with('selected',$selected)
			->with('rating', $rating);
	}

	public function sample($businessSlug)
	{
		$business = Business::whereSlug($businessSlug)->first();
		$blogs = $business->blogs()->get();
		$reviews = $business->reviews()->orderBy('created_at', 'desc')->get();
		$categories = $this->category->getCategories();
		Session::forget('category');
		
		// return View::make('searchpartial.settings')->with('title','Settings')
		// ->with('categories',$categories);
		return View::make('client.settings')->with('title','Settings')
		->with('categories',$categories)
		->with('business', $business)
		->with('blogs', $blogs)
		->with('reviews', $reviews);
		
	}

	public function sample2(){
		$categories = $this->category->getCategories();
		Session::forget('category');

		return View::make('client.settings')->with('title','Settings')
		->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		try
		{
			$this->registerbusiness->validate(Input::all());

			$business_id = $this->business->create(Input::all());

			$business = Business::findOrFail($business_id);

			$categories = Session::get('categories');
			Session::forget('categories');

			if($categories != ''){
				foreach($categories as $category)
				{
					$business->categories()->attach($category);
				}
			}

			return Redirect::to('/company/'.$business->slug);
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
	
	}

	public function companytab(){
		$id = 1;
		$blog_id = 1;
		$businessinfo = Business::findOrFail($id)->first();
		$reviews = $businessinfo->reviews()->orderBy('created_at', 'desc')->get();
		// $reviews = Review::whereBusiness_id($businessinfo->id)->orderBy("created_at", "desc")->get();
		$blogs = Blog::where('business_id', '=', $blog_id)->orderBy('created_at', 'desc')->get();
		// $businessinfo = Business::all();
		return View::make('client.company-tab')->with('businessinfo', $businessinfo)->with('blogs', $blogs)
			->with('reviews', $reviews);
	}

	public function companytab2($name){
		$id = 1;
		$blog_id = 1;

		$businessinfo = Business::whereSlug($name)->first();
		if(is_null($businessinfo)){
			return Response::view('pagenotfound');
		}

		// $reviews = $businessinfo->reviews()->orderBy('created_at', 'desc')->get();
		$reviews = $businessinfo->reviews()->orderBy('created_at', 'desc')->get();

		$blogs = Blog::where('business_id', '=', $blog_id)->orderBy('created_at', 'desc')->get();

		return View::make('client.company-tab')->with('businessinfo', $businessinfo)->with('blogs', $blogs)
			->with('reviews', $reviews);
	}

	public function editcompany($slug){
		$businessinfo = Business::whereSlug($slug)->first();
		
		if( is_null($businessinfo) ){
			return Response::view('pagenotfound');
		}

		$categories = $this->category->getCategories();
		
		$selected_categories = $businessinfo->categories;
		$selected_categories = $selected_categories->toArray();
		$selected_categoriesraw = $businessinfo->categories;

		$notselected_categories = $this->category->getCategories();

		for($x=1; $x<count($categories); $x++){
			// echo "<hr>";
			for($y=0; $y<count($selected_categories); $y++){
				if($categories[$x] === $selected_categories[$y]["name"]){
					unset($notselected_categories[$x]);
				}
			}
			
		}

		$addresses = $businessinfo->address;
		$addresses = explode(",", $addresses);

		return View::make("client.editcompany")->with("businessinfo", $businessinfo)->with("addresses", $addresses)
			->with("categories", $notselected_categories)->with('selected_categories', $selected_categories);
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
		try
		{
			$this->updatebusiness->validate(Input::all());

			$slug = $this->business->update(Input::all(), $id);
			
			return Redirect::to('/company/'.$slug);
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
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