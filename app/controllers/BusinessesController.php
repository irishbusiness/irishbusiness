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

		$name = Input::get('name');
		$category = Input::get('category');
		$locations = explode(' ',Input::get('location'));
		$query1 = '';
		foreach($locations as $location)
		{
			$string = preg_replace('/,/', '', $location);
			$query1 .= " and address1 like '%$string%'"; 
		}
		
		$business5 = Business::whereRaw("name like '%$name%' $query1")->whereHas('categories', function($q) use($category)
		{
		    $q->where('name', 'like', '%'.$category.'%');		     
		})->get();
		
		return View::make('searchpartial.result')->with('businesses',$business5);
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