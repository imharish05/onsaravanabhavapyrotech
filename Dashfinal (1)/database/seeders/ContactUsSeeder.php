<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ContactUs::updateOrCreate(
            ['id' => 1],
            [
                'page_title' => 'Contact Us',
                'heading' => 'Have Any Questions?',
                'subheading' => 'Have a inquiry or some feedback for us? Fill out the form below to contact our team.',
                'address' => 'Wonder Street, USA, New York',
                'phone' => 'Phone: (+00) - 12543 - 4165',
                'email' => 'hello@xton.com',
                'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1m3!1d3000.7725920671603!2d-73.81881778465008!3d41.55286417924976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd3362095ccfad%3A0xe5452f862db4eb26!2sWonderland%20Dr%2C%20East%20Fishkill%2C%20NY%2012533%2C%20USA!5e0!3m2!1sen!2sin!4v1680108316270!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]
        );
    }
}
