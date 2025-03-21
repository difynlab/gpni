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
        Schema::create('cec_point_activities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('course_id');
            $table->enum('type', ['Addition', 'Deduction']);
            $table->date('date');
            $table->time('time');
            $table->decimal('points', 10, 2);
            $table->text('admin_comment')->nullable();
            $table->text('user_comment')->nullable();
            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cec_point_activities');
    }
};
