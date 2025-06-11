<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdatePropertyTypeAndAdditionalFieldsToPropertyOnSellsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('property_on_sells', function (Blueprint $table) {
            // Drop the existing enum column first if it exists
            if (Schema::hasColumn('property_on_sells', 'property_type')) {
                $table->dropColumn('property_type');
            }
        });

        Schema::table('property_on_sells', function (Blueprint $table) {
            // Recreate the enum column with the new values
            $table->enum('property_type', [
                'family_house',
                'apartment',
                'parking',
                'land',
                'storage_space',
                'storage',
                'berth',
                'substructure',
                'pitch',
            ])->nullable()->after('status');

            // Only add house_type column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'house_type')) {
                $table->enum('house_type', [
                    'one_story',
                    'two_story',
                    'three_plus_story'
                ])->nullable()->after('property_type');
            }

            // Only add availability column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'availability')) {
                $table->enum('availability', [
                    'available',
                    'under_negotiation',
                    'sold'
                ])->nullable()->after('house_type');
            }

            // Only add zoning column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'zoning')) {
                $table->string('zoning')->nullable()->after('availability');
            }

            // Only add amenities column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'amenities')) {
                $table->enum('amenities', [
                    'central_heating_boiler',
                    'bathtub',
                    'renewable_energy',
                    'fireplace',
                    'swimming_pool',
                    'roof_top',
                    'cinema',
                    'gym'
                ])->nullable()->after('zoning');
            }
            
            // Only add garage_type column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'garage_type')) {
                $table->enum('garage_type', [
                    'in_the_compound',
                    'on_street',
                    'build_in_garage'
                ])->nullable()->after('amenities');
            }

            // Only add rooms column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'rooms')) {
                $table->integer('rooms')->nullable()->after('garage_type');
            }

            // Only add bedrooms column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'bedrooms')) {
                $table->integer('bedrooms')->nullable()->after('rooms');
            }

            // Only add kitchen column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'kitchen')) {
                $table->integer('kitchen')->nullable()->after('bedrooms');
            }

            // Only add dining_room column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'dining_room')) {
                $table->integer('dining_room')->nullable()->after('kitchen');
            }

            // Only add storage column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'storage')) {
                $table->integer('storage')->nullable()->after('dining_room');
            }

            // Only add construction_type column if it does not exist
            if (!Schema::hasColumn('property_on_sells', 'construction_type')) {
                $table->enum('construction_type', [
                    'Resale',
                    'Newly built'
                ])->nullable()->after('storage');
            }
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
                'amenities',
                'garage_type',
                'rooms',
                'bedrooms',
                'kitchen',
                'dining_room',
                'storage',
                'construction_type'
            ]);
        });

        Schema::table('property_on_sells', function (Blueprint $table) {
            // Recreate the old property_type enum column
            $table->enum('property_type', ['family_house', 'apartment'])->nullable()->after('status');
        });
    }
}
