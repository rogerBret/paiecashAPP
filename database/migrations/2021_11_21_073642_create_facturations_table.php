<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('price');
            $table->foreignId('id_service')->constrained();
            $table->foreign('id_service')
            ->references('id')
            ->on('services')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('id_app')->constrained();
            $table->foreign('id_app')
            ->references('id')
            ->on('apps')
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
        Schema::dropIfExists('facturations');
    }
}
