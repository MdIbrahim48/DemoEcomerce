<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'logo' => 'logo.png',
            'email' => 'admin@gmail.com',
            'phone' => '01917364532',
            'mobile' => '01917364532',
            'address' => 'House#27, Sector#11, Uttara, Dhaka',
            'status' => '1',
            'created_by' => 'ibrahim',
        ]);
    }
}
