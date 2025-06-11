<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilterFieldsToPropertyOnSellsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            $table->enum('property_type', ['family_house', 'apartment'])->nullable()->after('status');
            $table->enum('house_type', ['one_story', 'two_story', 'three_plus_story'])->nullable()->after('property_type');
            $table->enum('availability', ['available', 'under_negotiation', 'sold'])->nullable()->after('house_type');
            $table->string('zoning')->nullable()->after('availability');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            $table->dropColumn([
                'property_type',
                'house_type',
                'availability',
                'zoning',
            ]);
        });
    }
}
