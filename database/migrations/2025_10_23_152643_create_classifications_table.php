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
        Schema::create('classifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name');
            $table->string('description')->nullable();
            $table->string('status');
            $table->date('creation_date');
            $table->date('modification_date');
            $table->string('reference_image');
            $table->string('by_user');
            
            $table->integer('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on
            ('products')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classifications');
    }
};
