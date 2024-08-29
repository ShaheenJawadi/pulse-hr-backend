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
        Schema::create('attendance', function (Blueprint $table) {
       
                $table->id();
                $table->unsignedBigInteger('employee_id');
                $table->date('date');
                $table->time('clock_in_time');
                $table->time('clock_out_time');
                $table->time('expected_clock_in_time');
                $table->time('expected_clock_out_time');
                $table->enum('status', ['present', 'absent', 'late']); 
                $table->timestamps();
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
