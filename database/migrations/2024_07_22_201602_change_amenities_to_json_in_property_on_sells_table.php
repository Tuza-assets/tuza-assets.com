<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAmenitiesToJsonInPropertyOnSellsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            $table->json('amenities')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            // Reverse the change by setting it back to an enum or text field
            // Use appropriate field type based on original definition
            $table->enum('amenities', [
                'central_heating_boiler',
                'bathtub',
                'renewable_energy',
                'fireplace',
                'swimming_pool',
                'roof_top',
                'cinema',
                'gym'
            ])->nullable()->change();
        });
    }
}

