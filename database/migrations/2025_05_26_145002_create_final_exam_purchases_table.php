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
        Schema::create('final_exam_purchases', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('course_id');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('mode')->nullable();
            $table->string('transaction_id')->nullable()->unique();
            $table->string('currency');
            $table->decimal('amount_paid', 8, 2)->nullable();
            $table->decimal('wallet_amount', 8, 2)->nullable();
            $table->enum('payment_status', ['Completed', 'Pending', 'Failed'])->default('Pending');
            $table->string('receipt_url')->nullable();
            $table->enum('refund_status', ['Refunded', 'Not Refunded'])->default('Not Refunded');
            $table->enum('attempted', ['Yes', 'No'])->default('No');

            $table->enum('status', [0, 1])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_exam_purchases');
    }
};
