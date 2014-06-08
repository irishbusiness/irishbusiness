<?php

class CommissionsTableSeeder extends Seeder {
    public function run()
    {
        Commission::create(['type' => 'Sales Team', 'commission' => 10]);
        Commission::create(['type' => 'Team Leader', 'commission' => 9]);
        Commission::create(['type' => 'Sales Person', 'commission' => 8]);
    }

}
