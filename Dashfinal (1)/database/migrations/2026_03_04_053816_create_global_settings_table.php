<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('company_name');
            $table->string('whatsapp_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('footer_content')->nullable();
            $table->text('address')->nullable();
            $table->text('header_codes')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('global_settings');
    }
};
