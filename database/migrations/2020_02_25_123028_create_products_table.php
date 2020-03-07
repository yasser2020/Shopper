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
             $table->Increments('id');
              $table->string('product_name');
             $table->Integer('category_id');
             $table->Integer('manufacture_id');
             $table->string('product_short_description');
             $table->string('product_long_description');
             $table->float('product_price');
             $table->string('product_image');
             $table->string('product_size');
             $table->string('product_color');
             $table->tinyInteger('publiction_status');
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
