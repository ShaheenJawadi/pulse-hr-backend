<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('request_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leave_type');
            $table->enum('status', ['approved', 'pending', 'rejected']);
            $table->text('manager_comments')->nullable();
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
