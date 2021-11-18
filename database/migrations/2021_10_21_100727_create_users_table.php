<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('statut')->nullable();
            $table->string('nui')->nullable();
            $table->string('cni')->nullable();
            $table->string('structureName')->nullable();
            $table->integer('longitude')->nullable();
            $table->integer('latitude')->nullable();
            $table->string("country")->nullable();
            $table->string('internalPicture')->nullable();
            $table->string('externalPicture')->nullable();
            $table->integer("user_id")->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->string('picture')->nullable();
            $table->foreignId("town_id")->nullable()->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->boolean('address_verified')->nullable();
            $table->boolean('identity_verified')->nullable();
            $table->boolean('is_network_active')->nullable();
            $table->string('codeParrainage')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
