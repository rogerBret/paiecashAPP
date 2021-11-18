<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categori_places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('place_id')->constrained();
            $table->foreignId('stade_id')->constrained();
            $table->foreign('place_id')
            ->references('id')
            ->on('places');
            $table->foreign('stade_id')
            ->references('id')
            ->on('stades');
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
        Schema::dropIfExists('categori_places');
    }
}
