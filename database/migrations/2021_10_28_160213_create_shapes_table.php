<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shapes', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->index();
            $table->integer('tower_id')->index();
            $table->string('points')->nullable();
            $table->integer('rect_x')->nullable();
            $table->integer('rect_y')->nullable();
            $table->integer('rect_width')->nullable();
            $table->integer('rect_height')->nullable();
            $table->integer('text_x')->nullable();
            $table->integer('text_y')->nullable();
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
        Schema::dropIfExists('shapes');
    }
}
