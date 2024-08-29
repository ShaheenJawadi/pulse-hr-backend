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
        $table->unsignedBigInteger('department_id')->nullable();
        $table->string('location');
        $table->int('min_experience');
        $table->int('max_experience')->nullable();
        $table->string('tags')->nullable();



        $table->text('short_description');
        $table->text('requirements');
        $table->date('expire_at');
        $table->enum('status', ['open', 'closed']);
        $table->timestamps();
    });
}


    
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
