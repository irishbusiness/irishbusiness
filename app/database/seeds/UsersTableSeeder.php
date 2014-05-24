<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'stripe_id' =>  '',
            'active'    =>  0,
            'email'     =>  'lourdrivera123@gmail.com',
            'password'  =>  Hash::make('1235'),
            'phone'     =>  '09095331440',
        ]);
    }

}
