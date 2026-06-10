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
        Schema::table('payment_settings', function (Blueprint $table) {
            $table->string('hero_eyebrow')->nullable()->after('page_title');
            $table->string('hero_title')->nullable()->after('hero_eyebrow');
            $table->string('hero_subtitle')->nullable()->after('hero_title');
            $table->string('assist_1_text')->nullable();
            $table->string('assist_2_text')->nullable();
            $table->string('assist_3_text')->nullable();
            $table->string('whatsapp_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_eyebrow', 
                'hero_title', 
                'hero_subtitle', 
                'assist_1_text', 
                'assist_2_text', 
                'assist_3_text', 
                'whatsapp_number'
            ]);
        });
    }
};
