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
        Schema::create('refer_point_activities', function (Blueprint $table) {
            $table->id();
            $table->string('refer_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('referred_by_id');
            $table->text('activity');
            $table->date('date');
            $table->time('time');
            $table->decimal('points', 10, 2);
            $table->decimal('balance', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->enum('type', ['Addition', 'Deduction']);
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refer_point_activities');
    }
};
