<?php

namespace Database\Seeders;

use App\Models\Teams;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //Players::factory(10)->create();

        if (Teams::all()->count() == 0) {
            $team = new Teams();
            $team->name = 'ATSV';
            $team->save();
            $team = new Teams();
            $team->name = 'Gegner';
            $team->save();
        }

        if (User::where('email', 'admin@example.com')->exists()) {
            return;
        }
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Testus',
            'email' => 'test@example.com',
        ]);
    }
}
