<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->integer('percent');

            $table->string('stage_1');
            $table->boolean('st1_done');

            $table->string('stage_2');
            $table->boolean('st2_done');

            $table->string('stage_3');
            $table->boolean('st3_done');

            $table->string('stage_4');
            $table->boolean('st4_done');

            $table->string('stage_5');
            $table->boolean('st5_done');

            $table->string('stage_6');
            $table->boolean('st6_done');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
