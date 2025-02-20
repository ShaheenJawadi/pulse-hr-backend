<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id(); 
            $table->string('full_name'); 
            $table->string('email'); 
            $table->string('phone'); 
            $table->string('actual_position'); 
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->text('motivation')->nullable(); 



            $table->date('birthday');

            $table->string('resume_path');
            $table->enum('status', ['pending','accepted','rejected','shortlisted']);
            $table->timestamp('submitted_at');
            $table->timestamp('last_status_change')->nullable();
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
