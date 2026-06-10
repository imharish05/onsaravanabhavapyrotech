<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\HomeSetting::updateOrCreate(
            ['id' => 1],
            [
                'welcome_heading' => 'Welcome to The Crackers!',
                'welcome_text' => "Since 2016, The Crackers has been the No.1 destination for all your celebration needs. Located in Sivakasi, the heart of India's fireworks industry, we are renowned for offering an impressive range of crackers that add magic to every occasion.\n\nWhether you're planning for a grand festival, a joyous event, or an intimate gathering, The Crackers has the perfect fireworks to make it unforgettable. Our vast selection, competitive prices, and commitment to safety ensure your festivities are nothing short of extraordinary.\n\nExperience the magic of celebrations with The Crackers. Trust us to light up your moments with pure joy and dazzling displays. Your ultimate cracker shopping experience starts here!",
                'welcome_button_text' => 'READ MORE',
                'welcome_button_link' => '/about',
            ]
        );
    }
}
