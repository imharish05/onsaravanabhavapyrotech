<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('offer_heading')->nullable()->after('welcome_button_link');
            $table->text('offer_subheading')->nullable()->after('offer_heading');
            $table->dateTime('offer_end_date')->nullable()->after('offer_subheading');
            $table->string('offer_button_text')->nullable()->after('offer_end_date');
            $table->string('offer_button_link')->nullable()->after('offer_button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn(['offer_heading', 'offer_subheading', 'offer_end_date', 'offer_button_text', 'offer_button_link']);
        });
    }
};
