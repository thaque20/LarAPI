<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_logs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('light')->nullable();
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->string('soil')->nullable();
            $table->integer('moisture')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('alive')->default(true);
            $table->timestamps();

            $table->bigInteger('plant_id')->unsigned()->index()->nullable();
            $table->foreign('plant_id')->references('id')->on('plants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_logs');
    }
}
