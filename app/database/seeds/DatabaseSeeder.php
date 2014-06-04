<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('UsersTableSeeder');
		$this->call('BusinessesTableSeeder');
		$this->call('BlogsTableSeeder');
        $this->call('SocialMediaTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('SubscriptionsTableSeeder');
	}

}
