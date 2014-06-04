<?php namespace IrishBusiness\Repositories;


use Category;

class CategoryRepository {


	function __construct()
	{
		
	}

	public function create($input)
	{
		$category = new Category;
		$category->name = $input['name'];
		$category->save();
	}

	public function getCategories()
	{


		$categoriesraw = Category::all();
		$categories = array('0' => 'Select a category...');

		foreach($categoriesraw as $category)
		{
			$categories[$category->id] = $category->name;
		}

		return $categories;
	}
}