<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('subcategory_id');
            $table->string('name');
            $table->string('model');
            $table->float('price');
            $table->integer('qty');
            $table->text('description');
            $table->string('brand');
            $table->string('dimension');
            $table->string('review');
            $table->time('released');
            $table->integer('location');
            $table->text('img');
            $table->text('img2');
            $table->text('img3');
            $table->integer('new');
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
