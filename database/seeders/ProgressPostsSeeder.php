<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProgressPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

         //inserta Posts falsos
         for($i=0; $i<3; $i++){

            DB::table('progress_posts')->insert([
                [
                    'title' => $faker->sentence(4,true),
                    'date' => $faker->date(),
                    'description' => $faker->paragraph(3,true),
                    //'visible' =>'1',
                    'created_at' => now(),
                ],
           ]);

        }
    }
}
