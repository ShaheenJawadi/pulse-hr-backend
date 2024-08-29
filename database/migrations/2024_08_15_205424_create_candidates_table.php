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
            $table->string('resume_path');
            $table->enum('status', ['applied', 'interviewed', 'hired', 'rejected']);
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
