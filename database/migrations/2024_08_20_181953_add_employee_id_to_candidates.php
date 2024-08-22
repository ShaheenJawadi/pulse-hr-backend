<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->nullable()->after('id'); 
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('set null'); 
        });
    }

    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['employee_id']); 
            $table->dropColumn('employee_id'); 
        });
    }
};
