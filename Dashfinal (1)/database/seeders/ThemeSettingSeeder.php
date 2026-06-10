<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ThemeSetting;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThemeSetting::updateOrCreate(
            ['id' => 1],
            [
                'primary_color' => '#000000',
                'secondary_color' => '#ffffff'
            ]
        );
    }
}
