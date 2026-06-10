<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PaymentSetting::updateOrCreate(
            ['id' => 1],
            [
                'page_title' => 'Payment Information',
                'heading' => 'Please select an option to pay',
                'gpay_number' => '+00 - 12345 - 67890',
                'bank_name' => 'Demo Bank',
                'account_name' => 'The Boys Crackers',
                'account_number' => '0000 1234 5678',
                'ifsc_code' => 'DEMO0001234',
                'branch_name' => 'Sivakasi Main Branch',
                'additional_notes' => 'After successful payment, please send the screenshot to our Whatsapp number.',
            ]
        );
    }
}
