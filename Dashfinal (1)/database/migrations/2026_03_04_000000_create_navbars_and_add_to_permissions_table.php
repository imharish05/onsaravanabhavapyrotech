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
        if (!Schema::hasTable('navbars')) {
            Schema::create('navbars', function (Blueprint $table) {
                $table->id();
                $table->string('navbar_name');
                $table->timestamps();
            });
        }

        Schema::table('permissions', function (Blueprint $table) {
            if (!Schema::hasColumn('permissions', 'navbar_id')) {
                $table->unsignedBigInteger('navbar_id')->nullable()->after('guard_name');
                $table->foreign('navbar_id')->references('id')->on('navbars')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign(['navbar_id']);
            $table->dropColumn('navbar_id');
        });

        Schema::dropIfExists('navbars');
    }
};
