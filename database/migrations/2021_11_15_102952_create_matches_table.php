<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->enum('type_match', ['match de poule', 'huitième de final', 'quart de final', 'démi finala', 'final', 'match de classement'])->default('match de poule');
            $table->string('equipes');
            $table->string('date_match');
            $table->string('heure_match');
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
        Schema::dropIfExists('matches');
    }
}
