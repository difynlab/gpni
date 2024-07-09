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
        Schema::create('history_of_gpni_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title')->nullable();
            $table->string('section_1_image')->nullable();

            $table->text('section_2_title')->nullable();
            $table->text('section_2_sub_title')->nullable();
            $table->text('section_2_description')->nullable();

            $table->text('section_3_title')->nullable();
            $table->string('section_3_image')->nullable();
            $table->text('section_3_description')->nullable();

            $table->text('section_4_title')->nullable();
            $table->string('section_4_image')->nullable();
            $table->text('section_4_description')->nullable();

            $table->text('section_5_title')->nullable();
            $table->string('section_5_image')->nullable();
            $table->text('section_5_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_of_gpni_contents');
    }
};
