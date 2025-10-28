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
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->string('description')->nullable();
            $table->integer('quantity');
            $table->string('location');
            $table->integer('unitary_price');
            $table->string('supplier')->nullable();
            $table->string('status_item');
            $table->date('expiration_date')->nullable();
            $table->string('unit_measure');
            $table->string('added_by_user');

            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on
            ('products')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('employees_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on
            ('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('order_details_id')->unsigned();
            $table->foreign('order_details_id')->references('id')->on
            ('order_details')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('ingredients_id')->unsigned();
            $table->foreign('ingredients_id')->references('id')->on
            ('ingredients')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
