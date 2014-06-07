<?php

use IrishBusiness\Repositories\CategoryRepository;
use IrishBusiness\Repositories\BusinessRepository;
use IrishBusiness\Forms\RegisterBusiness;
use IrishBusiness\Forms\AddBranch;
use IrishBusiness\Forms\UpdateBusiness;
use IrishBusiness\Forms\FormValidationException;

class BusinessesController extends \BaseController {

	protected $category;
	protected $business;
	protected $registerbusiness;
	protected $addbranch;

	function __construct(CategoryRepository $category, BusinessRepository $business, RegisterBusiness $registerbusiness,
			UpdateBusiness $updatebusiness, AddBranch $addbranch)
	{
		$this->addbranch = $addbranch;
		$this->category = $category;
		$this->business = $business;
		$this->registerbusiness = $registerbusiness;
		$this->updatebusiness = $updatebusiness;
		// $this->beforeFilter('hasBusiness',['only' => ['sample2']]);
		$this->beforeFilter('user', ['only' => ['showBusiness', 'addBusiness']]);
		$this->beforeFilter('subscribed', ['only' => ['showBusiness', 'addBusiness']]);
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
		// 	 $category = trim(Input::get('category'))-;
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
			->with('rating', $rating)->with("title", "Search results");
	}

	public function showBusiness($businessSlug)
	{
		$business = Business::whereSlug($businessSlug)->first();		
		Session::forget('category');
		
		if( is_null($business) ){
			return Response::view('pagenotfound');
		}

		$blogs = $business->blogs()->orderBy('created_at', 'desc')->get();
		$reviews = $business->reviews()->orderBy('created_at', 'desc')->get();
		$categories = $this->category->getCategories();
		
		$selected_categories = $business->categories;
		$selected_categories = $selected_categories->toArray();
		$selected_categoriesraw = $business->categories;

		$notselected_categories = $this->category->getCategories();

		for($x=1; $x<count($categories); $x++){
			// echo "<hr>";
			for($y=0; $y<count($selected_categories); $y++){
				if($categories[$x] === $selected_categories[$y]["name"]){
					unset($notselected_categories[$x]);
				}
			}
			
		}

		$addresses = $business->address;
		$addresses = explode(",", $addresses);

		
		// return View::make('searchpartial.settings')->with('title','Settings')
		// ->with('categories',$categories);
		return View::make('client.business_settings')->with('title','Settings')
		->with('categories',$categories)
		->with('businessinfo', $business)
		->with('business', $business)
		->with('blogs', $blogs)
		->with('reviews', $reviews)
		->with("addresses", $addresses)
		->with("categories", $notselected_categories)
		->with('selected_categories', $selected_categories);
		
	}

	
	public function addBusiness()
	{
		$categories = $this->category->getCategories();
		Session::forget('category');

		return View::make('client.addBusiness')->with('title','Add Business')
		->with('categories', $categories)
		->with('reviews', NULL);
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

			$business = $this->business->create(Input::all());

			/*$business = Business::findOrFail($business_id);*/

			$categories = Session::get('categories');
			Session::forget('categories');

			if($categories != ''){
				foreach($categories as $category)
				{
					$business->categories()->attach($category);
				}
			}

			return Redirect::to('business/'.$business->slug .'/branch/add')->with('flash_message','Thank you for adding your business! Please fill up the branch information. <br> You can add more branches later.');
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
			->with('reviews', $reviews)->with('title', html_entity_decode(stripcslashes($businessinfo->name)));
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
			->with('reviews', $reviews)->with('title', html_entity_decode(stripcslashes($businessinfo->name)));
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

		return View::make("client.editcompany")
		->with("businessinfo", $businessinfo)
		->with("addresses", $addresses)
		->with("categories", $notselected_categories)
		->with('selected_categories', $selected_categories)->with('title', "Edit - ".html_entity_decode(stripcslashes($businessinfo->name)));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addBranch($slug)
	{
		return View::make('client.branch_add')->withTitle('Add Branch')->withSlug($slug);
	}

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

	public function update_category_remove(){
		if(Request::ajax()){

			$business = Business::find(Input::get("bid"));
			$business_category =  $business->with(['categories' => function($q){
					$q->where('category_id', '=', Input::get("category"));
				}])->first();


			foreach ($business_category->categories as $role)
			{
			    if($role->pivot->delete()){
			    	return "deleted.";
			    }
				
			}
			return "deletion failed.";
		}
	}

	public function update_category_add(){
		if(Request::ajax()){
			$business_id = Input::get("bid");
			$category_id = Input::get("category");
			$name = Input::get("name");

			$business = Business::find($business_id);
			
			$data = array("id"=>$category_id, "name"=>$name);
			$success = $business->categories()->attach($category_id);
			
			return "added";		
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function storeBranch($slug)
	{
		try
		{
			$this->addbranch->validate(Input::all());
			$branch_id = $this->business->storeBranch(Input::all(),$slug);
			return Redirect::to('business/'.$slug.'/branch/'. $branch_id.'/map')->with('branch_id',$branch_id);
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}		
	}

	public function setMap($slug, $id)
	{
		$address = Branch::find($id)->address;
		return View::make('client.map')->withSlug($slug)->with('branch_id',$id)->with('address',$address);
	}

	public function storeMap()
	{
		if(!$this->business->isOwnder(Input::get('slug')))
			return Response::make('pagenotfound');

		$this->business->storeMap(Input::get('latlng'),Input::get('branch_id'));

		return Redirect::to('company/'.Input::get('slug'))->with('flash_message','Congratulations! You have completed your profile.');

		
	}

}