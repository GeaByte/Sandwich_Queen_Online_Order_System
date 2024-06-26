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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orderID');
            $table->unsignedBigInteger('productID'); 
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('orderID')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('productID')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['orderID']);
            $table->dropForeign(['productID']);
        });

        Schema::dropIfExists('order_details');
    }
};
