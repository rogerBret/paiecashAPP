<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('match_id')->constrained();
            $table->foreignId('stade_id')->constrained();
            $table->foreignId('place_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreign('match_id')
            ->references('id')
            ->on('matchs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('category_id')
            ->references('id')
            ->on('categori_places');
            $table->foreign('stade_id')
            ->references('id')
            ->on('stades');
            $table->foreign('place_id')
            ->references('id')
            ->on('places');
            $table->integer('price');
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
        Schema::dropIfExists('tickets');
    }
}
