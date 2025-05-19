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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->string('article_category_id');
            $table->enum('recommending', ['Yes', 'No']);
            $table->mediumText('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_designation')->nullable();
            $table->string('author_description')->nullable();
            $table->string('author_image')->nullable();
            $table->string('reading_time')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('view_count')->default(0);
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
