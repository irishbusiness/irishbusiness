<?php

	
use IrishBusiness\Forms\Category;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\CategoryRepository;



class CategoriesController extends \BaseController {

	protected $categoryForm;
	protected $category;


	function __construct(Category $categoryForm,CategoryRepository $category)
	{
		$this->categoryForm = $categoryForm;
		$this->category = $category;
	}

	public function tempAdd()
	{
		if(Request::ajax())
		{
			$id = Input::get('category');
			Session::push('categories',$id);
			$category = \Category::findOrFail($id);
			return $category;	
		}
		
		return 'somethings wrong';
	}

	public function index()
	{
		//
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$this->categoryForm->validate(Input::all());

			$this->category->create(Input::all());

			$categories = \Category::all();

			return Redirect::to('settings')->withFlashMessage('Added  new category <em>' . ucwords(Input::get('category')) .'</em>! ')
			->with('title','IrishBusiness.ie | Settings')
			->with('categories',$categories);
		}
		catch(FormValidationException  $e)
		{
			
			return Redirect::back()->withInput()->withErrors($e->getErrors());
		}
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