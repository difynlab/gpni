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
        Schema::create('our_policy_contents', function (Blueprint $table) {
            $table->id();

            $table->text('title_en')->nullable();
            $table->text('description_en')->nullable();

            $table->text('cec_images_en')->nullable();
            $table->text('cec_images_description_en')->nullable();
            $table->text('cec_title_en')->nullable();
            $table->text('cec_first_column_title_en')->nullable();
            $table->text('cec_second_column_title_en')->nullable();
            $table->text('cec_third_column_title_en')->nullable();
            $table->text('cec_points_en')->nullable();
            $table->text('cec_points_description_en')->nullable();

            $table->text('title_zh')->nullable();
            $table->text('description_zh')->nullable();

            $table->text('cec_images_zh')->nullable();
            $table->text('cec_images_description_zh')->nullable();
            $table->text('cec_title_zh')->nullable();
            $table->text('cec_first_column_title_zh')->nullable();
            $table->text('cec_second_column_title_zh')->nullable();
            $table->text('cec_third_column_title_zh')->nullable();
            $table->text('cec_points_zh')->nullable();
            $table->text('cec_points_description_zh')->nullable();

            $table->text('title_ja')->nullable();
            $table->text('description_ja')->nullable();

            $table->text('cec_images_ja')->nullable();
            $table->text('cec_images_description_ja')->nullable();
            $table->text('cec_title_ja')->nullable();
            $table->text('cec_first_column_title_ja')->nullable();
            $table->text('cec_second_column_title_ja')->nullable();
            $table->text('cec_third_column_title_ja')->nullable();
            $table->text('cec_points_ja')->nullable();
            $table->text('cec_points_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_contents');
    }
};
