<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GlobalSetting;

class GlobalSettingSeeder extends Seeder
{
    public function run(): void
    {
        GlobalSetting::firstOrCreate(
            ['id' => 1],
            [
                'meta_title' => 'Default Site Title',
                'company_name' => 'Default Company',
                'whatsapp_number' => '',
                'phone_number' => '',
                'footer_content' => '© 2026 Default Company',
                'address' => '123 Site Address',
                'header_codes' => '',
                'favicon' => null,
                'logo' => null,
                'facebook_link' => '',
                'instagram_link' => '',
                'twitter_link' => '',
                'linkedin_link' => '',
                'youtube_link' => '',
            ]
        );
    }
}
