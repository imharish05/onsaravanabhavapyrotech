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
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('banner_image');
            $table->string('hero_subtitle')->nullable()->after('hero_title');
            $table->text('action_description')->nullable()->after('action_button_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn(['hero_title', 'hero_subtitle', 'action_description']);
        });
    }
};
