<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            HomepageContentSeeder::class,
            WhyWeAreDifferentContentSeeder::class,
            HistoryOfGpniContentSeeder::class,
            GiftCardContentSeeder::class,
            AdvisoryBoardContentSeeder::class,
            ISSNPartnerContentSeeder::class,
            FAQContentSeeder::class,
            PolicyContentSeeder::class
        ]);
    }
}
