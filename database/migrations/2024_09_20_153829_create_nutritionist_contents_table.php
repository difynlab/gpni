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
        Schema::create('nutritionist_contents', function (Blueprint $table) {
            $table->id();

            $table->text('title_en')->nullable();
            $table->text('sub_title_en')->nullable();

            $table->text('title_zh')->nullable();
            $table->text('sub_title_zh')->nullable();
            
            $table->text('title_ja')->nullable();
            $table->text('sub_title_ja')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritionist_contents');
    }
};
