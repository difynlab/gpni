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
            'name' => 'GPNi',
            'address' => 'Pottuvil, Sri Lanka',
            'email' => 'gpni@gmail.com',
            'phone' => '0000000000',
            'mobile' => '0123456789',
            'postal_code' => '32500',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
