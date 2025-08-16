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
        Schema::create('membership_contents', function (Blueprint $table) {
            $table->id();

            $table->text('section_1_title_en')->nullable();
            $table->text('section_1_description_en')->nullable();
            $table->text('section_2_image_en')->nullable();
            $table->text('section_2_top_description_en')->nullable();
            $table->text('section_2_bottom_description_en')->nullable();
            $table->text('section_3_title_en')->nullable();
            $table->text('section_3_description_en')->nullable();
            $table->text('section_3_lifetime_proceed_en')->nullable();
            $table->text('section_3_annual_proceed_en')->nullable();
            $table->text('section_3_labels_contents_en')->nullable();
            $table->text('section_3_order_details_en')->nullable();
            $table->text('section_3_type_en')->nullable();
            $table->text('section_3_amount_en')->nullable();
            $table->text('section_3_total_en')->nullable();
            $table->text('section_3_coupon_code_en')->nullable();
            $table->text('section_3_pay_now_en')->nullable();
            $table->text('section_4_title_en')->nullable();
            $table->text('section_4_description_en')->nullable();
            $table->text('section_4_label_en')->nullable();
            $table->text('section_4_label_link_en')->nullable();
            $table->text('section_5_title_en')->nullable();
            $table->text('section_5_description_en')->nullable();

            $table->text('section_1_title_zh')->nullable();
            $table->text('section_1_description_zh')->nullable();
            $table->text('section_2_image_zh')->nullable();
            $table->text('section_2_top_description_zh')->nullable();
            $table->text('section_2_bottom_description_zh')->nullable();
            $table->text('section_3_title_zh')->nullable();
            $table->text('section_3_description_zh')->nullable();
            $table->text('section_3_lifetime_proceed_zh')->nullable();
            $table->text('section_3_annual_proceed_zh')->nullable();
            $table->text('section_3_labels_contents_zh')->nullable();
            $table->text('section_3_order_details_zh')->nullable();
            $table->text('section_3_type_zh')->nullable();
            $table->text('section_3_amount_zh')->nullable();
            $table->text('section_3_total_zh')->nullable();
            $table->text('section_3_coupon_code_zh')->nullable();
            $table->text('section_3_pay_now_zh')->nullable();
            $table->text('section_4_title_zh')->nullable();
            $table->text('section_4_description_zh')->nullable();
            $table->text('section_4_label_zh')->nullable();
            $table->text('section_4_label_link_zh')->nullable();
            $table->text('section_5_title_zh')->nullable();
            $table->text('section_5_description_zh')->nullable();

            $table->text('section_1_title_ja')->nullable();
            $table->text('section_1_description_ja')->nullable();
            $table->text('section_2_image_ja')->nullable();
            $table->text('section_2_top_description_ja')->nullable();
            $table->text('section_2_bottom_description_ja')->nullable();
            $table->text('section_3_title_ja')->nullable();
            $table->text('section_3_description_ja')->nullable();
            $table->text('section_3_lifetime_proceed_ja')->nullable();
            $table->text('section_3_annual_proceed_ja')->nullable();
            $table->text('section_3_labels_contents_ja')->nullable();
            $table->text('section_3_order_details_ja')->nullable();
            $table->text('section_3_type_ja')->nullable();
            $table->text('section_3_amount_ja')->nullable();
            $table->text('section_3_total_ja')->nullable();
            $table->text('section_3_coupon_code_ja')->nullable();
            $table->text('section_3_pay_now_ja')->nullable();
            $table->text('section_4_title_ja')->nullable();
            $table->text('section_4_description_ja')->nullable();
            $table->text('section_4_label_ja')->nullable();
            $table->text('section_4_label_link_ja')->nullable();
            $table->text('section_5_title_ja')->nullable();
            $table->text('section_5_description_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_contents');
    }
};
