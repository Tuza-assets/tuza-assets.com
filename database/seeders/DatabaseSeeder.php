<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@tuza-assets.com',
            'status'=>'1',
            'user_role'=>'admin',
            'password'=>Hash::make('admin@tuza-assets.com'),
        ]);

        $this->call(LeadsTableSeeder::class);
    }
}
