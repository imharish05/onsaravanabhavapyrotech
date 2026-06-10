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
        if (!Schema::hasColumn('payment_settings', 'gpay_label')) {
            Schema::table('payment_settings', function (Blueprint $table) {
                $table->string('gpay_label')->nullable()->after('heading');
                $table->string('phonepe_label')->nullable()->after('gpay_qr_code');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment_settings', function (Blueprint $table) {
            $table->dropColumn(['gpay_label', 'phonepe_label']);
        });
    }
};
