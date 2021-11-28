<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("url")->nullable();
            $table->decimal("amount");
            $table->foreignId("user_id")->constrained()->onUpdate("cascade")->onDelete("cascade");
            $table->string("qrcode")->nullable();
            $table->string('description');
            $table->integer('discounte');
            $table->integer('quantity');
            $table->integer("'price");
            $table->string('color');
            $table->string('warranties');
            $table->string('manuel');
            $table->foreignId('brand_id')->constrained()->onUpdate("cascade");
            $table->foreignId('category_id')->constrained()->onUpdate("cascade");
            $table->string('code');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
