<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //inserta mensajes falsos
        for($i=0; $i<15; $i++){

            DB::table('messages')->insert([
                [
                    'name' => $faker->name(),
                    'subject' => $faker->sentence(4,true),
                    'email' => $faker->unique()->safeEmail(),
                    'phone' =>random_int(3221111111, 3229999999),
                    'type' =>'General',
                    'unit' => random_int(1, 100),
                    'content' => $faker->paragraph(3,true),
                    'created_at' => $faker->date(),
                ],
           ]);

        }
       
    }
}
