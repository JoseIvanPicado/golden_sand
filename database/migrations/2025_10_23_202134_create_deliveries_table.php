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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('available_status');
            $table->string('assigned_zone');
            $table->string('delivery_person')->nullable();
            $table->date('admission_date');
            $table->time('departure_time');
            $table->time('arrival_time')->nullable();

            $table->integer('employees_id')->unsigned();
            $table->foreign('employees_id')->references('id')->on
            ('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('clients_id')->unsigned();
            $table->foreign('clients_id')->references('id')->on
            ('clients')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
