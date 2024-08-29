<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('birthday');
            $table->enum('sexe', ["m", "f"]);
            $table->string('avatar')->nullable();




            $table->date('hire_date');
            $table->date('end_contract');

            $table->unsignedBigInteger('contract_type_id')->nullable();

            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();


            $table->text('additional_infos');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
