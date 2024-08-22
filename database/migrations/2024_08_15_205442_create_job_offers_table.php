<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
   public function up()
{
    Schema::create('job_offers', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->text('requirements');
        $table->date('posting_date');
        $table->enum('status', ['open', 'closed']);
        $table->timestamps();
    });
}


    
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
