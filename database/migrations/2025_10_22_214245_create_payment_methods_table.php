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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('method_name');
            $table->string('method_description');
            $table->string('type_typment');
            $table->string('status');
            $table->date('creation_date');
            $table->string('reference_transaction');
            $table->date('authorization_date');
            $table->date('registration_date');
            $table->integer('commision');

            $table->integer('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on
            ('orders')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('payments_id')->unsigned();
            $table->foreign('payments_id')->references('id')->on
            ('payments')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
