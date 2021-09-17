<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\CurrenciesSeederTable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CurrenciesSeederTable::class);
        $this->call(SettingsTableSeeder::class);
        \App\Models\User::factory(50)->create();
        \App\Models\Category::factory(20)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Product::factory(50)->create();
    }
}
