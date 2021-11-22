<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement_modes', function (Blueprint $table) {
            $table->id();
            $table->boolean('singlePaiement');
            $table->boolean('paiementGroup');
            $table->foreignId('id_parametre')->constrained();
            $table->foreign('id_parametre')
            ->references('id')
            ->on('parametres')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('paiement_modes');
    }
}
