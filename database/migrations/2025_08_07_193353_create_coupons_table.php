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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('code');
            $table->enum('language', ['English', 'Chinese', 'Japanese']);
            $table->enum('coupon_for', ['Course Purchase', 'Membership Purchase', 'Product Purchase', 'Already Purchased Course']);
            $table->enum('coupon_validity', ['Fix Time', 'Life Time']);
            $table->enum('coupon_type', ['Amount', 'Percentage']);

            $table->string('old_course_id')->nullable();
            $table->string('new_course_id')->nullable();
            $table->date('expiry_date')->nullable();
            $table->time('expiry_time')->nullable();
            $table->decimal('value', 8, 2)->nullable();

            $table->enum('status', [0, 1, 2])->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
