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
        Schema::table('property_on_sells', function (Blueprint $table) {
            $table->string('upi')->nullable()->after('property_code'); // Add the 'upi' column
            $table->string('mainimage')->nullable()->after('upi');     // Add the 'mainimage' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            $table->dropColumn(['upi', 'mainimage']); // Remove the columns
        });
    }
};
