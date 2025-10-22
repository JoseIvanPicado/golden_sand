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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_reference');
            $table->date('payment_date');
            $table->integer('total_amount');
            $table->string('payment_method');
            $table->integer('amount_paid');
            $table->string('change');
            $table->string('authorization_code');
            $table->date('authorization_date');
            $table->string('point_terminal');
            $table->string('payment_status');
            $table->string('commision');
            $table->string('due_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
