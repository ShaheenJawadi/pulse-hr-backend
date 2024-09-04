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
        Schema::table('kanban_tasks', function (Blueprint $table) { 
            $table->integer('displayOrder')->nullable()->default(0)->after('column_id'); 
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kanban_tasks', function (Blueprint $table) {
            $table->dropColumn('displayOrder');
        });
    }
};
