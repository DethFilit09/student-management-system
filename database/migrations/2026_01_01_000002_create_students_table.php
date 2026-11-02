<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');                    // PK
            $table->string('student_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('enrollment_date');
            $table->text('description')->nullable();

            // FK -> departments.department_id
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('departments')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
