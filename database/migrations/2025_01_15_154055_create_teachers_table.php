<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned(); // Change to bigInteger
            $table->string('subjects')->nullable();
            $table->timestamps();

            // Add a foreign key constraint with cascade on delete
            $table->foreign('student_id')->references('student_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
