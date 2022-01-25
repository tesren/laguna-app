<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PaymentPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('payment_plans')->insert([
            [
                'name' => 'De Contado',
                'name_en' => 'Cash',
                'down_payment' => 90,
                'months' => null,
                'month_percent' =>null,
                'closing_payment' => 10,
                'discount' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'En Mensualidades',
                'name_en' => 'In Monthly Payments',
                'down_payment' => 40,
                'months' => 24,
                'month_percent' =>50,
                'closing_payment' => 10,
                'discount' => 8,
                'created_at' => now(),
            ],
            [
                'name' => 'En Mensualidades',
                'name_en' => 'In Monthly Payments',
                'down_payment' => 35,
                'months' => 24,
                'month_percent' =>55,
                'closing_payment' => 10,
                'discount' => 7,
                'created_at' => now(),
            ],
            [
                'name' => 'En Dos Pagos',
                'name_en' => 'In Two Payments',
                'down_payment' => 60,
                'months' => null,
                'month_percent' =>null,
                'closing_payment' => 40,
                'discount' => 5,
                'created_at' => now(),
            ],
            [
                'name' => 'A la Entrega',
                'name_en' => 'Upon Delivery',
                'down_payment' => 35,
                'months' => null,
                'month_percent' =>null,
                'closing_payment' => 65,
                'discount' => null,
                'created_at' => now(),
            ],
       ]);
    }
}
