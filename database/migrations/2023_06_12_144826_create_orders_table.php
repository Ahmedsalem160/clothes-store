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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();// foreign
            $table->integer('status')->default(0); // 0 > initiated, 1 > processing, 2 > terminated
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('payment_id');
            $table->string('total_price');
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->string('shipping_price');  //سعر للشحن
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
        Schema::dropIfExists('orders');
    }
};
