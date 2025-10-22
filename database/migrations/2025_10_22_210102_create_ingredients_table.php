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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ingredient_name');
            $table->string('ingredient_description');
            $table->integer('stock_quantity');
            $table->string('ingredient_status');
            $table->string('supplier');
            $table->date('purchase_date');
            $table->integer('unit_price');
            $table->string('measurement_unit');
            $table->integer('total_cost');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
