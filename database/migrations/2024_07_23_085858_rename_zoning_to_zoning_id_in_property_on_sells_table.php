<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameZoningToZoningIdInPropertyOnSellsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            // Check if the column 'zoning' exists before renaming
            if (Schema::hasColumn('property_on_sells', 'zoning')) {
                $table->renameColumn('zoning', 'zoning_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            // Check if the column 'zoning_id' exists before renaming back
            if (Schema::hasColumn('property_on_sells', 'zoning_id')) {
                $table->renameColumn('zoning_id', 'zoning');
            }
        });
    }
}

