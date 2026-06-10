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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->string('hero_eyebrow')->nullable()->after('page_title');
            $table->string('hero_title')->nullable()->after('hero_eyebrow');
            $table->text('hero_subtitle')->nullable()->after('hero_title');
            
            // Order Steps
            $table->string('step1_title')->nullable();
            $table->text('step1_text')->nullable();
            $table->string('step2_title')->nullable();
            $table->text('step2_text')->nullable();
            $table->string('step3_title')->nullable();
            $table->text('step3_text')->nullable();
            $table->string('step4_title')->nullable();
            $table->text('step4_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn([
                'hero_eyebrow', 'hero_title', 'hero_subtitle',
                'step1_title', 'step1_text',
                'step2_title', 'step2_text',
                'step3_title', 'step3_text',
                'step4_title', 'step4_text'
            ]);
        });
    }
};
