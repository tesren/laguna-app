<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->double('down_payment')->unsigned()->nullable();
            $table->double('months')->unsigned()->nullable();
            $table->double('month_percent')->unsigned()->nullable();
            $table->double('closing_payment')->unsigned()->nullable();
            $table->double('discount')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_plans');
    }
}
