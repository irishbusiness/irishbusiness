<?php

	
use IrishBusiness\Forms\Category;
use IrishBusiness\Forms\FormValidationException;
use IrishBusiness\Repositories\CategoryRepository;



class CategoriesController extends \BaseController {

	protected $categoryForm;
	protected $category;


	function __construct(Category $categoryForm, CategoryRepository $category)
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
		
		return 'Something went wrong';
	}

	public function categoryRemove(){
		if(Request::ajax()){
			$id = Input::get('category');
			// Session::pop('categories', $id);
			$categories = Session::get('categories');
			foreach ( $categories as $category ) {
				if(!$category = $id){
					Session::push("newcategories", $category);
				}
			}
			Session::forget("categories");
			Session::push("categories", Session::get("newcategories"));
			$category = \Category::findOrFail($id);
			return $category;
		}

		return 'Something went wrong';
	}

	public function index()
	{
		$categories = \Category::whereNull('deleted_at')->orderBy('name', 'ASC')->get();
		return View::make("admin.admin_manage_categories")->with('categories', $categories);
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

	
	public function add(){
		if(Request::ajax()){
			$operation = Input::get("op");
			
			if( $operation=="add" ){
				$name = Input::get("name");

				$category = new \Category;
				$category->name = $name;
				$category->save();

				$id = $category->id;
				$data = ["id"=>$id, "name"=>$name];

				return $data;

			}
			
			$id = Input::get("id");
			$name = Input::get("name");

			$category = \Category::findOrFail($id);
			
			if( $operation=="delete" ){
				$category->delete();
				return "deleted";
			}
			$name = Input::get("name");
			$category->name = $name;
			$category->save();
			
			$data = ["id"=>$id, "name"=>$name];
			return $data;
		}
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