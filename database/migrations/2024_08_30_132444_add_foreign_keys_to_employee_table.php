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
        Schema::table('employees', function (Blueprint $table) {
            //
            $table->foreign('contract_type_id')->references('id')->on('work_contract_type')->onDelete('set null');
            $table->foreign('shift_id')->references('id')->on('work_shifts')->onDelete('set null');
            $table->foreign('supervisor_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('position_id')->references('id')->on('work_position')->onDelete('set null');
           
        });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee', function (Blueprint $table) {

            $table->dropForeign(['contract_type_id']);
            $table->dropForeign(['shift_id']);
            $table->dropForeign(['supervisor_id']);
            $table->dropForeign(['position_id']);

 
        });
    }
};
