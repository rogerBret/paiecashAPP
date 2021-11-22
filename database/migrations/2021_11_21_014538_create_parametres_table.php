<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametres', function (Blueprint $table) {
            $table->id();
            $table->string('urlReturn')->unique();
            $table->boolean('acceptePaiement');
            $table->boolean('billing');
            $table->boolean('litigeManagement');
            $table->boolean('paiementCard');
            $table->boolean('paiementHistry');
            $table->foreignId('id_paiement_mode')->constrained();
            $table->foreign('id_paiement_mode')
            ->references('id')
            ->on('paiement_modes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_app')->constrained();
            $table->foreign('id_app')
            ->references('id')
            ->on('apps')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_service')->constrained();
            $table->foreign('id_service')
            ->references('id')
            ->on('services')
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
        Schema::dropIfExists('parametres');
    }
}
