<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('scientific_name')->nullable();

            $table->string('kingdom')->nullable();
            $table->string('sub_kingdom')->nullable();

            $table->string('super_division')->nullable();
            $table->string('division')->nullable();

            $table->string('phylum')->nullable();

            $table->string('class')->nullable();
            $table->string('sub_class')->nullable();

            $table->string('order')->nullable();
            $table->string('family')->nullable();
            $table->string('genus')->nullable();
            $table->string('species')->nullable();
            $table->string('variety')->nullable();

            $table->text('description')->nullable();

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
        Schema::dropIfExists('plants');
    }
}
