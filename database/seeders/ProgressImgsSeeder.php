<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressImgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('progress_imgs')->insert([
            [
                'progress_post_id' => '1',
                'image_title' => 'Inicio de Obra',
                'image_url' => '/assets/img/construction/inicio-obra.jpeg',
                'created_at' => now(),
            ],
            [
                'progress_post_id' => '2',
                'image_title' => 'Obra Negra',
                'image_url' => '/assets/img/construction/obra-negra.jpeg',
                'created_at' => now(),
            ],
            [
                'progress_post_id' => '3',
                'image_title' => 'Albañileria',
                'image_url' => '/assets/img/construction/albañiles.jpeg',
                'created_at' => now(),
            ],
       ]);
    }
}
