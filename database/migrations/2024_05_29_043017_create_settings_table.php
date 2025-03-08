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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email_en')->nullable();
            $table->string('whatsapp_en')->nullable();
            $table->string('email_zh')->nullable();
            $table->string('whatsapp_zh')->nullable();
            $table->string('email_ja')->nullable();
            $table->string('whatsapp_ja')->nullable();
            $table->string('logo');
            $table->string('footer_logo');
            $table->string('favicon');

            $table->string('fb_en')->nullable();
            $table->string('instagram_en')->nullable();
            $table->string('weibo_en')->nullable();
            $table->string('weixin_en')->nullable();
            $table->string('youtube_en')->nullable();
            $table->string('linkedin_en')->nullable();
            $table->string('twitter_en')->nullable();

            $table->string('fb_zh')->nullable();
            $table->string('instagram_zh')->nullable();
            $table->string('weibo_zh')->nullable();
            $table->string('weixin_zh')->nullable();
            $table->string('youtube_zh')->nullable();
            $table->string('linkedin_zh')->nullable();
            $table->string('twitter_zh')->nullable();

            $table->string('fb_ja')->nullable();
            $table->string('instagram_ja')->nullable();
            $table->string('weibo_ja')->nullable();
            $table->string('weixin_ja')->nullable();
            $table->string('youtube_ja')->nullable();
            $table->string('linkedin_ja')->nullable();
            $table->string('twitter_ja')->nullable();

            $table->string('guest_image');
            $table->string('no_image');
            $table->string('no_profile_image');

            $table->decimal('lifetime_membership_price_en', 10, 2);
            $table->decimal('lifetime_membership_price_zh', 10, 2);
            $table->decimal('lifetime_membership_price_ja', 10, 2);

            $table->decimal('annual_membership_price_en', 10, 2);
            $table->decimal('annual_membership_price_zh', 10, 2);
            $table->decimal('annual_membership_price_ja', 10, 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
