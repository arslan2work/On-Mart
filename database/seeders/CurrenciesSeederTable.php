<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert(
            [
                [
                'name' => 'Pakistan Rupee',
                'symbol' => 'Pkr',
                'exchange_rate' => 165,
                'code' => 'PKR',
                ],
                [
                'name' => 'US Dollar',
                'symbol' => '$',
                'exchange_rate' => 1,
                'code' => 'USD',
                ]
            ]
        );
    }
}
