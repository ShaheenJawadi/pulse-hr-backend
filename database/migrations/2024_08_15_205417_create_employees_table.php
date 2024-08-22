<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->date('hire_date');
            $table->string('contract_type');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('position');
            $table->timestamps();
        });
    }
    


    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
