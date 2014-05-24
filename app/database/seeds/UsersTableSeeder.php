<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'stripe_id' =>  '',
            'active'    =>  1,
            'email'     =>  'lourdrivera123@gmail.com',
            'password'  =>  Hash::make('1235'),
            'phone'     =>  '09095331440',
        ]);
    }

}
