<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('towers')->insert([
            [
                'name' => 'Caoba',
                'units' => '30',
                'floors'=> 6,
                'created_at' => now(),
            ],
            [
                'name' => 'Cedro',
                'units' => '36',
                'floors'=> 7,
                'created_at' => now(),
            ],
       ]);
    }
}
