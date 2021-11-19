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
                'bedrooms' => '1+',
                'bathrooms' => '2',
                'half_baths' =>'0',
                'created_at' => now(),
            ],
            [
                'name' => 'Mármol',
                'bedrooms' => '2',
                'bathrooms' => '2',
                'half_baths' =>'0',
                'created_at' => now(),
            ],
            [
                'name' => 'Granito',
                'bedrooms' => '3',
                'bathrooms' => '3',
                'half_baths' =>'0',
                'created_at' => now(),
            ],
       ]);
    }
}
