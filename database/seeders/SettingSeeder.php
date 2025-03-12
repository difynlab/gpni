<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'name' => 'GPNi®',
            'email_en' => 'edu@thegpni.com',
            'logo' => 'logo.png',
            'footer_logo' => 'footer-logo.png',
            'favicon' => 'favicon.png',

            'fb_en' => 'https://www.facebook.com/thegpni',
            'instagram_en' => 'https://www.instagram.com/thegpni',
            'weibo_en' => 'https://weibo.com/issnasia',
            'weixin_en' => 'https://mp.weixin.qq.com/s/87S5aiHRccNawo_-MsIhbQ',
            'youtube_en' => 'https://www.youtube.com/@GPNiFIT',

            'fb_ja' => 'https://www.facebook.com/jp.gpni',
            'instagram_ja' => 'https://www.instagram.com/jp.gpni',

            'guest_image' => 'guest-image.jpeg',
            'no_image' => 'no-image.jpg',
            'no_profile_image' => 'no-profile-image.png',

            'lifetime_membership_price_en' => '249.00',
            'lifetime_membership_price_zh' => '1850.00',
            'lifetime_membership_price_ja' => '37350.00',

            'annual_membership_price_en' => '99.00',
            'annual_membership_price_zh' => '700.00',
            'annual_membership_price_ja' => '15500.00',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
