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
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->decimal('unitary_price', 8, 2);
            $table->integer('available_quantity');
            $table->integer('sold_quantity');
            $table->integer('total_price');
            $table->date('authorization_date');

            $table->integer('payments_id')->unsigned();
            $table->foreign('payments_id')->references('id')->on
            ('payments')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on
            ('orders')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
