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
			Session::push('categories', $id);
			$category = \Category::findOrFail($id);

			return $category;	
		}
		
		return 'Something went wrong';
	}

	public function categoryRemove(){
		if(Request::ajax()){
			$id = Input::get('category');
			$categories = Session::get('categories');

			$x=0;

			for($x=count($categories)-1; $x>=0; $x--){
				if($categories[$x] == $id){
					unset($categories[$x]);
					Session::forget("categories");
					Session::set("categories", $categories);
					// return $categories;
					return Session::get("categories");
				}
			}
		}

		return 'Something went wrong';
	}

	public function index()
	{
		$categories = \Category::whereNull('deleted_at')->orderBy('name', 'ASC')->get();
		return View::make("admin.admin_manage_categories")->with('categories', $categories)
			->withTitle("IrishBusiness.ie | Manage Categories");
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
			->withTitle("IrishBusiness.ie | Manage Categories")
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

	public function returnCategoryId(){
		// if( Request::ajax() ){
			$name = htmlspecialchars_decode( Input::get('name') );
			$name = html_entity_decode($name);
			// return $name;
			if( $name != "" ){
				return getCategoryIdByName($name);
			}
		// }
	}

	public function returnCategoryName(){
		$id = Input::get('id');
		
		return getCategoryNameById($id);
		
	}

}