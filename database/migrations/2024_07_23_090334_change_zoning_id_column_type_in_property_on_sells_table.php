<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeZoningIdColumnTypeInPropertyOnSellsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            // Check if the column 'zoning_id' exists before changing the type
            if (Schema::hasColumn('property_on_sells', 'zoning_id')) {
                $table->unsignedBigInteger('zoning_id')->change();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            // Check if the column 'zoning_id' exists before changing the type back
            if (Schema::hasColumn('property_on_sells', 'zoning_id')) {
                $table->string('zoning_id')->change();
            }
        });
    }
}
