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
        Schema::create('preparation_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->time('end_time');
            $table->date('preparation_date');
            $table->string('status');
            $table->string('observations')->nullable();
            $table->integer('priority_level');
            $table->string('assigned_to')->nullable();
            $table->integer('amount_items');
            $table->time('start_time');
            $table->date('assignment_date');

            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on
            ('products')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('employees_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on
            ('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preparation_orders');
    }
};
