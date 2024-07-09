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
        Schema::create('why_we_are_different_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title')->nullable();
            $table->string('section_1_video')->nullable();
            $table->text('section_1_description')->nullable();

            $table->text('section_2_title')->nullable();
            $table->string('section_2_image')->nullable();
            $table->text('section_2_top_description')->nullable();
            $table->text('section_2_bottom_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_we_are_different_contents');
    }
};
