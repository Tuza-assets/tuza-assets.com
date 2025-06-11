<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Lead;

class LeadsTableSeeder extends Seeder
{
    public function run()
    {
        // Truncate the leads table
        Lead::truncate();

        for ($i = 0; $i < 12; $i++) {
            $now = Carbon::now()->subMonths($i); // Adjust the date for each iteration
            Lead::create([
                'rental_properties' => rand(0, 20),
                'letting_properties' => rand(0, 20),
                'completed_projects' => rand(0, 10),
                'plots_on_bid' => rand(0, 15),
                'date' => $now->toDateString(),
            ]);
        }
    }
}
