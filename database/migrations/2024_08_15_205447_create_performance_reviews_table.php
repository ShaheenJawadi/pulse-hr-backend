<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up()
{
    Schema::create('performance_reviews', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('employee_id');
        $table->date('review_date');
        $table->string('reviewer');
        $table->text('objectives');
        $table->text('comments');
        $table->integer('rating');
        $table->timestamps();
    });
}


    
    public function down(): void
    {
        Schema::dropIfExists('performance_reviews');
    }
};
