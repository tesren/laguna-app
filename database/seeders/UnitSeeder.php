<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->insert([
            [
                'name' => '101',
                'tower_id' => '1',
                'type_id' => '1',
                'floor' =>'1',
                'price' => '900000',
                'status' => 'Disponible',
                'created_at' => now(),
            ],
            [
                'name' => '201',
                'tower_id' => '1',
                'type_id' => '2',
                'floor' =>'2',
                'price' => '1000000',
                'status' => 'Apartada',
                'created_at' => now(),
            ],
            [
                'name' => '301',
                'tower_id' => '1',
                'type_id' => '3',
                'floor' =>'3',
                'price' => '1200000',
                'status' => 'Vendida',
                'created_at' => now(),
            ],
            [
                'name' => '101',
                'tower_id' => '2',
                'type_id' => '1',
                'floor' =>'1',
                'price' => '1200000',
                'status' => 'Disponible',
                'created_at' => now(),
            ],
            [
                'name' => '201',
                'tower_id' => '2',
                'type_id' => '2',
                'floor' =>'2',
                'price' => '1000000',
                'status' => 'Apartada',
                'created_at' => now(),
            ],
            [
                'name' => '301',
                'tower_id' => '2',
                'type_id' => '3',
                'floor' =>'3',
                'price' => '1200000',
                'status' => 'Vendida',
                'created_at' => now(),
            ],
       ]);
    }
}
