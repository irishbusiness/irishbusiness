<?php

class AdminUserTableSeeder extends Seeder {
public function run()
    {
        User::create([
            'stripe_id' =>  '',
            'firstname' =>  'Declan',
            'lastname'  =>  'Glynn',
            'confirmed' =>  1,
            'email'     =>  'dec@irishbusiness.ie',
            'password'  =>  Hash::make('1234'),
            'phone'     =>  '0909131',
            'remember_token'  =>  '',
            'access_level' => 3,
        ]);
    }

}
