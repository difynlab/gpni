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
        Schema::create('refer_friends', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('email');
            $table->enum('is_new', [0, 1])->default('1');
            $table->enum('status', [0, 1])->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refer_friends');
    }
};
