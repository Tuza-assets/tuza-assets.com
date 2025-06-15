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
        Schema::table('designs', function (Blueprint $table) {
            // Rename columns
            $table->renameColumn('title', 'name');
            $table->renameColumn('description', 'package_includes');

            // Add new columns
            $table->string('zone')->after('price')->nullable();
            $table->string('size')->after('zone')->nullable();
            $table->string('dimensions')->after('size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('designs', function (Blueprint $table) {
            // Reverse the column name changes
            $table->renameColumn('name', 'title');
            $table->renameColumn('package_includes', 'description');

            // Drop the new columns
            $table->dropColumn(['zone', 'size', 'dimensions']);
        });
    }
};

