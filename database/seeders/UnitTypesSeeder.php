<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('unit_types')->insert([
            [
                'name' => 'Cuarzo',
                'bedrooms' => '2',
                'bathrooms' => '0',
                'half_baths' =>'0',
                'meters_total' => '91.2',
                'meters_int' => '0',
                'meters_ext' => '0',
                'created_at' => now(),
            ],
            [
                'name' => 'Mármol',
                'bedrooms' => '3',
                'bathrooms' => '0',
                'half_baths' =>'0',
                'meters_total' => '134',
                'meters_int' => '0',
                'meters_ext' => '0',
                'created_at' => now(),
            ],
            [
                'name' => 'Granito',
                'bedrooms' => '1+',
                'bathrooms' => '0',
                'half_baths' =>'0',
                'meters_total' => '80.4',
                'meters_int' => '0',
                'meters_ext' => '0',
                'created_at' => now(),
            ],
       ]);
    }
}
