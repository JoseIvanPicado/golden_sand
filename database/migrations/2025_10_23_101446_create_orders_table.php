<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_status');
            $table->date('order_date');
            $table->time('order_time');
            $table->string('delivery_type');
            $table->string('delivery_address');
            $table->time('estimated_time');
<<<<<<< HEAD
            $table->integer('quantity');
=======
            $table->integer('cuantity');
>>>>>>> main
            $table->integer('unit_price');
            $table->integer('total_amount');
            $table->string('delivery_status');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on
            ('clients')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
