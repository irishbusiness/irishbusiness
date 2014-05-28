<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'stripe_id' =>  '',
            'firstname' =>  'John',
            'lastname'  =>  'Doe',
            'confirmed' =>  1,
            'email'     =>  'lourdrivera123@gmail.com',
            'password'  =>  Hash::make('1234'),
            'phone'     =>  '09095331440',
            'remember_token'  =>  '',
        ]);
    }

}
