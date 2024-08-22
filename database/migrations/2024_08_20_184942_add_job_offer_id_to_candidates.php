<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->unsignedBigInteger('job_offer_id')->nullable()->after('employee_id');

            $table->foreign('job_offer_id')
                  ->references('id')
                  ->on('job_offers')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['job_offer_id']);

            $table->dropColumn('job_offer_id');
        });
    }
};
