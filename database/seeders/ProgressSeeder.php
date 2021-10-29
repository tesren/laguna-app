<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('progress')->insert([
            [
                'percent' => '0',
                'stage_1' => 'Obra Iniciada',
                'st1_done' => '0',

                'stage_2' => 'Excavación',
                'st2_done' => '0',

                'stage_3' => 'Estructuras',
                'st3_done' => '0',

                'stage_4' => 'Albañilerias',
                'st4_done' => '0',

                'stage_5' => 'Instalaciones y Acabados',
                'st5_done' => '0',

                'stage_6' => 'Obra Terminada',
                'st6_done' => '0',
               
                'created_at' => now(),
            ],
       ]);
    }
}
