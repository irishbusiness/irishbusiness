<?php

use IrishBusiness\Repositories\CategoryRepository;

class BusinessesController extends \BaseController {

	protected $category;

	function __construct(CategoryRepository $category)
	{
		
		$this->category = $category;
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
		
		$query1 = 'and ';
		foreach($addresses as $address)
		{
			$query1 .= '(';
			$string = trim(preg_replace('/,/', '', $address));
			$query1 .= "businesses.address1 like '%$string%' or businesses.address3 like '%$string%'"; 
			$query1 .= ')and ';
		}
		$query1 .= "businesses.address3 like '%%'";

		$business5 = Business::WhereHas('categories', function($q) use($category,$query1)
		{
		      $q->whereRaw("(name like '%$category%' or businesses.name like '%$category%' or businesses.address2 like '%$category%')  $query1");	     
		})->paginate(1);

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
		
		return View::make('searchpartial.settings')->with('title','Settings')
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
		$business->address1 = $address;
		$business->address2 = Input::get('keywords');
		$business->address3 = Input::get('locations');
		$business->user_id = 2;
		$business->save();

		$id = $business->id;

		$business = Business::findOrFail($id);

		$categories = Session::get('categories');
		Session::forget('categories');

		foreach($categories as $category)
		{
			$business->categories()->attach($category);
		}
		
		return Redirect::to('/listings');
	
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