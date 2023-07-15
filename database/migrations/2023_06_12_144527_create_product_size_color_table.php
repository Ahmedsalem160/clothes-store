<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size_color', function (Blueprint $table) {
            $table->id();
            $table->integer('product_size_id')->unsigned()->references('id')->on('product_sizes');
            $table->integer('product_color_id')->unsigned()->references('id')->on('product_colors');
            $table->integer('quantity');
            $table->decimal('price',10,2)->nullable();// because the main price in product table
            $table->decimal('discount',10,2)->nullable();// because the main discount in product table
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('product_size_color');
    }
};
