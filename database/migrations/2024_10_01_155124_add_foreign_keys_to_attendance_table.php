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
        Schema::table('attendances', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->after('id');
            $table->unsignedBigInteger('course_id')->after('student_id');
            $table->unsignedBigInteger('lecturer_id')->after('course_id');


             // Adding foreign key constraints
             $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
             $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
             $table->foreign('lecturer_id')->references('id')->on('lecturers')->onDelete('cascade');


            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['course_id']);
            $table->dropForeign(['lecturer_id']);
            $table->dropColumn(['student_id', 'course_id', 'lecturer_id']);

            //
        });
    }
};
