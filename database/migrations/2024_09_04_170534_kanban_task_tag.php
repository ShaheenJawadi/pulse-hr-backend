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
        Schema::create('kanban_task_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kanban_task_id')->constrained('kanban_tasks')->onDelete('cascade');
            $table->foreignId('kanban_tag_id')->constrained('kanban_tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanban_task_tag');
    }
};
