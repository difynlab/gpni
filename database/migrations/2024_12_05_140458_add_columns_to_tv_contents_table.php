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
        Schema::table('tv_contents', function (Blueprint $table) {
            $table->dropColumn(['created_at', 'updated_at']);
        });

        Schema::table('tv_contents', function (Blueprint $table) {
            $table->text('page_name_en')->nullable()->after('id');
            $table->text('single_tv_page_name_en')->nullable()->after('page_name_en');
            $table->text('page_name_zh')->nullable()->after('single_tv_page_name_en');
            $table->text('single_tv_page_name_zh')->nullable()->after('page_name_zh');
            $table->text('page_name_ja')->nullable()->after('single_tv_page_name_zh');
            $table->text('single_tv_page_name_ja')->nullable()->after('page_name_ja');

            $table->text('section_11_instagram_en')->nullable()->after('section_11_sub_title_en');
            $table->text('section_11_twitter_en')->nullable()->after('section_11_instagram_en');
            $table->text('section_11_linkedin_en')->nullable()->after('section_11_twitter_en');
            $table->text('section_11_youtube_en')->nullable()->after('section_11_linkedin_en');
            $table->text('section_11_facebook_en')->nullable()->after('section_11_youtube_en');

            $table->text('section_11_instagram_zh')->nullable()->after('section_11_sub_title_zh');
            $table->text('section_11_twitter_zh')->nullable()->after('section_11_instagram_zh');
            $table->text('section_11_linkedin_zh')->nullable()->after('section_11_twitter_zh');
            $table->text('section_11_youtube_zh')->nullable()->after('section_11_linkedin_zh');
            $table->text('section_11_facebook_zh')->nullable()->after('section_11_youtube_zh');

            $table->text('section_11_instagram_ja')->nullable()->after('section_11_sub_title_ja');
            $table->text('section_11_twitter_ja')->nullable()->after('section_11_instagram_ja');
            $table->text('section_11_linkedin_ja')->nullable()->after('section_11_twitter_ja');
            $table->text('section_11_youtube_ja')->nullable()->after('section_11_linkedin_ja');
            $table->text('section_11_facebook_ja')->nullable()->after('section_11_youtube_ja');

            $table->text('already_purchased_en')->nullable();
            $table->text('enroll_now_en')->nullable();
            // $table->text('login_for_enroll_en')->nullable();
            $table->text('order_details_en')->nullable();
            $table->text('course_en')->nullable();
            $table->text('amount_en')->nullable();
            $table->text('total_en')->nullable();
            $table->text('coupon_code_en')->nullable();
            $table->text('pay_now_en')->nullable();

            $table->text('already_purchased_zh')->nullable();
            $table->text('enroll_now_zh')->nullable();
            // $table->text('login_for_enroll_zh')->nullable();
            $table->text('order_details_zh')->nullable();
            $table->text('course_zh')->nullable();
            $table->text('amount_zh')->nullable();
            $table->text('total_zh')->nullable();
            $table->text('coupon_code_zh')->nullable();
            $table->text('pay_now_zh')->nullable();

            $table->text('already_purchased_ja')->nullable();
            $table->text('enroll_now_ja')->nullable();
            // $table->text('login_for_enroll_ja')->nullable();
            $table->text('order_details_ja')->nullable();
            $table->text('course_ja')->nullable();
            $table->text('amount_ja')->nullable();
            $table->text('total_ja')->nullable();
            $table->text('coupon_code_ja')->nullable();
            $table->text('pay_now_ja')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tv_contents', function (Blueprint $table) {
            $table->dropColumn([
                'page_name_en', 
                'single_master_class_page_name_en',
                'page_name_zh', 
                'single_master_class_page_name_zh',
                'page_name_ja', 
                'single_master_class_page_name_ja',
    
                'section_11_instagram_en', 'section_11_twitter_en', 'section_11_linkedin_en', 'section_11_youtube_en', 'section_11_facebook_en',
                'section_11_instagram_zh', 'section_11_twitter_zh', 'section_11_linkedin_zh', 'section_11_youtube_zh', 'section_11_facebook_zh',
                'section_11_instagram_ja', 'section_11_twitter_ja', 'section_11_linkedin_ja', 'section_11_youtube_ja', 'section_11_facebook_ja',

                'already_purchased_en',
                'enroll_now_en',
                // 'login_for_enroll_en',
                'order_details_en',
                'course_en',
                'amount_en',
                'total_en',
                'coupon_code_en',
                'pay_now_en',

                'already_purchased_zh',
                'enroll_now_zh',
                // 'login_for_enroll_zh',
                'order_details_zh',
                'course_zh',
                'amount_zh',
                'total_zh',
                'coupon_code_zh',
                'pay_now_zh',

                'already_purchased_ja',
                'enroll_now_ja',
                // 'login_for_enroll_ja',
                'order_details_ja',
                'course_ja',
                'amount_ja',
                'total_ja',
                'coupon_code_ja',
                'pay_now_ja',
            ]);

            $table->dropTimestamps();
        });

        Schema::table('tv_contents', function (Blueprint $table) {
            $table->timestamps();
        });
    }
};
