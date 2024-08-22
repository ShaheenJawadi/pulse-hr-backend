<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::create('employee_documents', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('employee_id');
        $table->string('document_type');
        $table->string('document_path');
        $table->timestamp('uploaded_at');
        $table->timestamps();
    });
}


    
    public function down(): void
    {
        Schema::dropIfExists('employee_documents');
    }
};
