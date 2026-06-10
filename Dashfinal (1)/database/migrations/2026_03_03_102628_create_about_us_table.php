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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('main_image')->nullable();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->integer('products_count')->default(250);
            $table->integer('customers_count')->default(1200);
            $table->integer('success_percentage')->default(100);
            $table->string('action_text')->nullable();
            $table->string('action_button_text')->nullable();
            $table->string('action_button_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
