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
        Schema::create('kanban_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('column_id');
            $table->string('title'); 
            $table->timestamps();
            $table->unsignedBigInteger('assigned_by')->nullable(); 
            $table->unsignedBigInteger('assigned_to')->nullable(); 

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanban_tasks');
    }
};
