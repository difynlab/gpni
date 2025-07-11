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
            AdvisoryBoardExpertLectureContentSeeder::class,
            ISSNOfficialPartnerAffiliateContentSeeder::class,
            FAQContentSeeder::class,
            OurPolicyContentSeeder::class,
            InsuranceProfessionalMembershipContentSeeder::class,
            ArticleContentSeeder::class,
            ConferenceContentSeeder::class,
            MembershipContentSeeder::class,
            ContactUsContentSeeder::class,
            NutritionistContentSeeder::class,
            GlobalEducationPartnerContentSeeder::class,
            TvContentSeeder::class,
            MasterClassContentSeeder::class,
            StudentDashboardContentENSeeder::class,
            StudentDashboardContentZHSeeder::class,
            StudentDashboardContentJASeeder::class,
            AuthenticationContentSeeder::class,
            ProductContentSeeder::class,
            CartContentSeeder::class,
            CertificationCourseContentSeeder::class,
            CommonContentSeeder::class,
        ]);
    }
}
