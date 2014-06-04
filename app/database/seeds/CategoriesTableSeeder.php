<?php

class CategoriesTableSeeder extends Seeder {
    public function run()
    {
        Category::create(['name' => 'office']);
        Category::create(['name' => 'travel']);
        Category::create(['name' => 'food']);
        Category::create(['name' => 'beverages']);
        Category::create(['name' => 'sports']);
        Category::create(['name' => 'clothing']);
    }

}
