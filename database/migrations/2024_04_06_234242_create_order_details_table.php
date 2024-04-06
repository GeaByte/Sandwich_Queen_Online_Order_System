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
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('ProductID'); 
            $table->integer('Quantity');
            $table->timestamps();

            $table->foreign('OrderID')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('ProductID')->references('id')->on('products')->onDelete('cascade');
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
            $table->dropForeign(['OrderID']);
            $table->dropForeign(['ProductID']);
        });

        Schema::dropIfExists('order_details');
    }
};
