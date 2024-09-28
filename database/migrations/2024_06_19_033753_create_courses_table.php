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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('duration');
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->enum('type', ['Certification', 'Masters']);
            $table->enum('course_status', ['Present', 'Upcoming']);
            $table->string('no_of_modules');
            $table->string('no_of_students_enrolled');
            $table->decimal('price', 10, 2);
            $table->string('image_video');
            $table->text('image_video_description');

            $table->string('instructor_name');
            $table->string('instructor_designation');
            $table->string('instructor_profile_image');

            $table->text('section_2_title')->nullable();
            $table->text('section_2_description')->nullable();
            $table->text('section_2_content')->nullable();

            $table->text('course_introduction')->nullable();
            $table->text('course_content')->nullable();
            $table->text('course_requirement')->nullable();

            $table->enum('status', [0, 1, 2])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
