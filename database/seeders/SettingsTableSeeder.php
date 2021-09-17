<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'On-Mart Online Shopping',
            'meta_description' => 'On-Mart online Shopping.',
            'meta_keywords' => 'On-Mart, Online Shopping, Ecommerce',
            'logo' => 'frontend/assets/images/On-Mart.png',
            'favicon' => '',
            'address' => 'Islamabad, Pakistan',
            'email' => 'info@onmart.com',
            'phone' => '+923456789101',
            'fax' => '009 76576 57654',
            'footer' => 'Arslan Asghar',
            'facebook_url' => '',
            'twitter_url' => '',
            'linkedin_url' => '',
            'pinterest_url' => '',
        ]);
    }
}
