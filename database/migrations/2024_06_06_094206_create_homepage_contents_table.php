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
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            
            $table->text('section_1_title')->nullable();
            $table->text('section_1_description')->nullable();
            $table->string('section_1_image')->nullable();
            $table->text('section_1_labels_links')->nullable();

            $table->text('section_2_title')->nullable();
            $table->text('section_2_points')->nullable();
            $table->string('section_2_video')->nullable();

            $table->text('section_3_title')->nullable();
            $table->text('section_3_description')->nullable();

            $table->text('section_4_title')->nullable();
            $table->text('section_4_description')->nullable();

            $table->text('section_5_title')->nullable();
            $table->text('section_5_description')->nullable();
            $table->text('section_5_images')->nullable();

            $table->text('section_6_title')->nullable();
            $table->text('section_6_description')->nullable();
            $table->text('section_6_label_link')->nullable();

            $table->text('section_7_title')->nullable();
            $table->text('section_7_description')->nullable();

            $table->text('section_8_title')->nullable();
            $table->text('section_8_description')->nullable();
            $table->text('section_8_labels_links')->nullable();

            $table->text('section_9_title')->nullable();
            $table->text('section_9_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};
