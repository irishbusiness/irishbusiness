<?php

class CategoriesTableSeeder extends Seeder {
    public function run()
    {
        Category::create(['office']);
        Category::create(['travel']);
    }

}
