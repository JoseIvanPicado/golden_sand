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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('nationality');
            $table->string('residence_departament');
            $table->string('address');
            $table->string('identification')->unique();
            $table->string('mail')->unique();
            $table->integer('phone_number');
            $table->date('hire_date');
            $table->string('number_employee')->unique();
            $table->string('role_work');
            $table->string('account_status');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
