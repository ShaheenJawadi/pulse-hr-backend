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
            //
            $table->foreign('column_id')->references('id')->on('kanban_columns')->onDelete('cascade');
            $table->foreign('assigned_by')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('employees')->onDelete('cascade');

       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kanban_tasks', function (Blueprint $table) {
            //
            $table->dropForeign(['column_id']);
            $table->dropForeign(['assigned_by']);
            $table->dropForeign(['assigned_to']);


        });
       
    }
};
