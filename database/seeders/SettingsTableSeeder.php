<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageUrl = asset('default-images/logo.png');

        Setting::create(['key' => 'app_name', 'value' => 'HMS']);
        Setting::create(['key' => 'app_logo', 'value' => $imageUrl]);
        Setting::create(['key' => 'company_name', 'value' => 'InfyOmLabs']);
        Setting::create(['key' => 'current_currency', 'value' => 'inr']);
        Setting::create(['key' => 'hospital_address', 'value' => '16/A saint Joseph Park']);
        Setting::create(['key' => 'hospital_email', 'value' => 'cityhospital@gmail.com']);
        Setting::create(['key' => 'hospital_phone', 'value' => '1234567890']);
        Setting::create(['key' => 'hospital_from_day', 'value' => 'Mon to Fri']);
        Setting::create(['key' => 'hospital_from_time', 'value' => '9 AM to 9 PM']);
    }
}
