<?php

class MainSettingTableSeeder extends Seeder {

    public function run()
    {
        MainSetting::create([
            'headerlogo' => 'images/logo/header/default.png',
            'footerlogo' => 'images/logo/footer/default.png',
            'domain_name' => 'teamlaravel.com',
            'admin_email' => 'dec@irishbusiness.ie',
            'search_result_per_page' => 3,
            'view_statistics' => 1,
            'analytics_code' => '9012',
            'footer_text' => 'Welcome to Irishbusiness',
            'allow_statistics' => 1,
            'reviews_approval' => 0,
        ]);
    }

}