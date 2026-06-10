<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\AboutUs::updateOrCreate(
            ['id' => 1],
            [
                'heading' => 'ABOUT THE CRACKERS',
                'description' => 'Located in the heart of Sivakasi, The Boys Crackers has been a symbol of festivity since 2016. Renowned for providing top-notch fireworks that light up the sky with dazzling colors and joy, we are the go-to choice for all celebrations. Our dedication to quality, affordability, variety, timely delivery, and safety has established us as the preferred destination for your celebratory needs.',
                'products_count' => 250,
                'customers_count' => 1200,
                'success_percentage' => 100,
                'action_text' => 'Let\'s Make a Difference in the Lives of Others',
                'action_button_text' => 'ESTIMATE NOW',
                'action_button_link' => '/estimate',
            ]
        );
    }
}
