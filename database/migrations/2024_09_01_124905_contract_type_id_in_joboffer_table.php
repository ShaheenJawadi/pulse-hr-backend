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
        Schema::table('job_offers', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('contract_type_id')->nullable();
            $table->foreign('contract_type_id')->references('id')->on('work_contract_type')->onDelete('set null');
           
           
        });
 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee', function (Blueprint $table) {

            $table->dropForeign(['contract_type_id']);
            
 
        });
    }
};
