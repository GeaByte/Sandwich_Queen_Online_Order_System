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
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('CustomerID'); 
            $table->integer('Quantity');
            $table->timestamps();


            $table->foreign('ProductID')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('CustomerID')->references('id')->on('users')->onDelete('cascade');
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
            $table->dropForeign(['ProductID']);
            $table->dropForeign(['CustomerID']);
        });
        
        Schema::dropIfExists('carts');
    }
};
