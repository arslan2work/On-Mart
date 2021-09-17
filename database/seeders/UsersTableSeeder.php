<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'full_name'=>'Arslan Asghar Customer',
                'username'=>'Customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('111'),
                'status'=>'active',

            ],
        ]);
        DB::table('admins')->insert([
            [
                'full_name'=>'Arslan Asghar Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('111'),
                'status'=>'active',

            ],
        ]);
        DB::table('sellers')->insert([
            [
                'full_name'=>'Arslan Asghar Seller',
                'username'=>'Seller',
                'email'=>'seller@gmail.com',
                'address'=>'Islamabad, Pakistan',
                'phone'=>'+923123456789',
                'photo'=>'',
                'password'=>Hash::make('111'),
                'is_verified' => 0,
                'status'=>'active',

            ],
        ]);
    }
}
