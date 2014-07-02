<?php

use IrishBusiness\Repositories\CategoryRepository;
use IrishBusiness\Repositories\BusinessRepository;
use IrishBusiness\Forms\RegisterBusiness;
use IrishBusiness\Forms\AddBranch;
use IrishBusiness\Forms\UpdateBusiness;
use IrishBusiness\Forms\FormValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;



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
		/*$query1='';*/
		foreach($addresses as $address)
		{
			$query1 .= '(';
			$string = trim(preg_replace('/\*/', '', $address));
			$query1 .= "branches.address like '%$string%' or branches.locations like '%$string%'"; 
			$query1 .= ')and ';
		}
		$query1 .= "branches.locations like '%%'";



		$branches = Branch::Join('businesses','businesses.id', '=', 'branches.business_id')
					->with('business.categories')
				  ->join('business_category','business_category.business_id', '=', 'businesses.id'  )
				  ->join('categories','business_category.category_id', '=', 'categories.id'  )
				  ->whereRaw("(businesses.name like '%$category%' or businesses.keywords like '%$category%' or categories.name like '$category') $query1 ")
				  ->groupBy('branches.id')
				  ->paginate(7, ['branches.*','businesses.id as bid','businesses.name','businesses.business_description','businesses.profile_description','businesses.slug','businesses.logo']);

		
		
		$rating = array();

		foreach ($branches as $branch) {
			
			array_push($rating, Review::where('business_id', '=', $branch->bid)->where('confirmed', '=', 1)->avg('rating'));
			
		}
		

		Session::put('category', Input::get('category'));
		Session::put('location', Input::get('location'));
		return View::make('client.searchresults')->with('branches',$branches)
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
		if(Auth::guest()){
			$reviews = $business->reviews()->orderBy('created_at', 'desc')->get();
		} else {
			$reviews = $business->reviews()->withTrashed()->orderBy('created_at', 'desc')->get();
		}
		$categories = $this->category->getCategories();
		$coupons = $business->coupons()->orderBy('created_at', 'desc')->get();

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
		$addresses = explode("*", $addresses);

		
		// return View::make('searchpartial.settings')->with('title','Settings')
		// ->with('categories',$categories);

		return View::make('client.company-tab')->with('title','Settings')
		->with('categories',$categories)
		->with('businessinfo', $business)
		->with('blogs', $blogs)
		->with('reviews', $reviews)
		->with("addresses", $addresses)
		->with("categories", $notselected_categories)
		->with('selected_categories', $selected_categories)
		->with('coupons', $coupons);
		
	}

	public function businessSettings($slug)
	{
		$business = Business::whereSlug($slug)->first();		
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
		$addresses = explode("*", $addresses);

		
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
			return Redirect::to("business/add")->withInput()->withErrors($e->getErrors());
		}
	
	}

	public function companytab2($name){
		
			

			$branch = Branch::join('businesses','businesses.id', '=', 'branches.business_id')
 					->whereRaw("branches.branchslug = '".$name."'")->first();
			
			if(is_null($branch))	return Response::view("pagenotfound");				
		

			// $reviews = $branch->business->reviews()->withTrashed()->orderBy('created_at', 'desc')->get();
			$reviews = $branch->business->reviews()->withTrashed()->where('confirmed', 1)->orderBy('created_at', 'desc')->get();
			$blogs = $branch->business->blogs()->orderBy('created_at', 'desc')->get();
			$coupons = $branch->business->coupons()->orderBy('created_at', 'desc')->get();

			$rating = array();

			$business = Business::with('branches', 'reviews')->whereSlug($branch->business->slug)->first();
			$branches1 = $business->branches;

			foreach ($branches1 as $branch1) {
				array_push($rating, Review::where('business_id', '=', $branch1->business->id)->where('confirmed', '=', 1)->avg('rating'));
			}

			$categories = $this->category->getCategories();
		
			$selected_categories = $branch->business->categories;
			$selected_categories = $selected_categories->toArray();
			$selected_categoriesraw = $branch->business->categories;

			$notselected_categories = $this->category->getCategories();

			for($x=1; $x<count($categories); $x++){
				// echo "<hr>";
				for($y=0; $y<count($selected_categories); $y++){
					if($categories[$x] === $selected_categories[$y]["name"]){
						unset($notselected_categories[$x]);
					}
				}
				
			}

			$addresses = $branch->address;
			$addresses = explode("*", $addresses);

			return View::make('client.company-tab')
				->with('branch', $branch)
				->with('business', $business)
				->with('blogs', $blogs)
				->with('reviews', $reviews)
				->with('title', decode($branch->business->name))
				->with('rating', $rating)
				->with('coupons', $coupons)
				->with('businessinfo', $business)
				->with("addresses", $addresses)
				->with("categories", $notselected_categories)
				->with('selected_categories', $selected_categories);
	}

	public function editcompany($slug, $branchslug){

		// $businessinfo = Business::whereSlug($slug)->first();
		
		$branch = Branch::with('business')->where('branchslug', $branchslug)->first();

	
		if( is_null($branch) ){
			return Response::view('pagenotfound');
		}

		$categories = $this->category->getCategories();
		
		$selected_categories = $branch->business->categories;
		$selected_categories = $selected_categories->toArray();
		$selected_categoriesraw = $branch->business->categories;

		$notselected_categories = $this->category->getCategories();

		for($x=1; $x<count($categories); $x++){
			// echo "<hr>";
			for($y=0; $y<count($selected_categories); $y++){
				if($categories[$x] === $selected_categories[$y]["name"]){
					unset($notselected_categories[$x]);
				}
			}
			
		}

		$addresses = $branch->address;
		$addresses = explode("*", $addresses);

		return View::make("client.editcompany")
			->with("businessinfo", $branch->business)
			->with("addresses", $addresses)
			->with("categories", $notselected_categories)
			->with('selected_categories', $selected_categories)->withBranch($branch)
			->with('title', "Edit - ".html_entity_decode(stripcslashes($branch->business->name)));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addBranch($slug)
	{
		$business = Business::whereSlug($slug)->first();
		$branch = $business->branches->first();
		
		
		if(is_null($branch))
		{
			$branchSlug = $this->business->keywordExplode($business->keywords);
			return View::make('client.branch_add')->withTitle('Add Branch')->withSlug($slug)->with('branchSlug', $branchSlug);
		}

			$branchSlug = strtolower($this->business->keywordExplode($business->keywords)."-".str_random(3));

		return View::make('client.branch_add')->withTitle('Add Branch')->withSlug($slug)->withBranch($branch)->with('branchSlug', $branchSlug);
	}

	public function update($slug, $branchId)
	{
		try
		{
			$branch = Branch::find($branchId);

			$this->updatebusiness->validate(Input::all());

			$slug = $this->business->update($slug, Input::all(), $branchId);
			
			return Redirect::to($slug);
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
			$branchSlug = $this->business->storeBranch(Input::all(),$slug);
			return Redirect::to('business/'.$slug.'/branch/'. $branchSlug.'/map');
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}		
	}

	public function setMap($slug, $branchslug)
	{
		$q = "0";
		if(!isOwner($slug))
		{
			return Redirect::to('/');
		}

		$branch = Branch::whereBranchslug($branchslug)->first();
		
		if(Input::has('q'))
			$q = Input::get('q');

		return View::make('client.map')->withSlug($slug)->with('branch',$branch)->withQ($q);
	}

	public function storeMap()
	{
		if(!isOwner(Input::get('slug')))
		{
			return Redirect::to('/');
		}

		if(!$this->business->isOwnder(Input::get('slug')))
			return Response::make('pagenotfound');

		$this->business->storeMap(Input::get('latlng'),Input::get('branchSlug'));

		return Redirect::to(Input::get('branchSlug'))
			->with('flash_message','Congratulations! You have completed your profile.');	
	}

	public function save_coupon(){
		if(Request::ajax()){
			$response = $this->business->createCoupon(Input::all(), "ajax");
			return Redirect::back()->withTitle($response);
		}

		$branch = Branch::find(Input::get("br"));
		$response = $this->business->createCoupon(Input::all(), "other");
		return Redirect::to($branch->branchslug."#company-tabs-coupon")->with("flash_message", $response)->withTitle($response);	
	}

	public function delete_coupon(){
		if(Request::ajax()){
			$coupon_id = Input::get("coupon");
			$coupon = Coupon::find($coupon_id);
			unlink(public_path().$coupon->name);
			$coupon->delete();

			return "Deleted";
		}
	}

	public function showBranches($businessSlug){
		$business = Business::with('branches', 'reviews')->whereSlug($businessSlug)->first();	
		
		$branches1 = $business->branches;
		$rating = array();
		foreach ($branches1 as $branch1) {
			array_push($rating, Review::where('business_id', '=', $branch1->business->id)->avg('rating'));
		}

		return View::make('client.tabcontents.tabcontent-branch')
		->with('business', $business)
		->with('rating', $rating);

	}

	public function deleteBranch($branchId)
	{
		$branch = Branch::find($branchId);
		$branch->delete();

		return Redirect::back();
	}
	
	public function delete_business(){
		if(Request::ajax()){
			$response = $this->business->delete_business(Input::get("id"));

			if( $response = true ){
				return "true";
			}

			return "false";
		}
	}
}
