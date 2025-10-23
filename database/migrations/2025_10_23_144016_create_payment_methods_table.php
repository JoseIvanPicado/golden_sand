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
        Schema::create('payment_method', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method_name');
            $table->string('description');
            $table->string('provider');
            $table->integer('account_number');
            $table->string('status');
            $table->date('creation_date');
            $table->date('expiration_date');
            $table->string('receiver_name');
            $table->integer('amount');
            $table->string('mail');
            $table->integer('commission_fee');

            $table->integer('payments_id')->unsigned();
            $table->foreign('payments_id')->references('id')->on
            ('payments')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on
            ('products')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method');
    }
};
