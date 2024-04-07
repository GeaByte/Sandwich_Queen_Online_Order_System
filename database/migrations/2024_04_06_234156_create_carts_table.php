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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->unsignedBigInteger('customerID'); 
            $table->integer('quantity');
            $table->timestamps();


            $table->foreign('productID')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customerID')->references('id')->on('users')->onDelete('cascade');
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
            $table->dropForeign(['productID']);
            $table->dropForeign(['customerID']);
        });
        
        Schema::dropIfExists('carts');
    }
};
