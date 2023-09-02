<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team; // Import the Team model
use Faker\Factory as Faker;

class TeamsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Team::create([
                'name' => $faker->unique()->word . ' Team',
                'sport' => $faker->word,
                'captain' => $faker->name,
                'division' => $faker->word,
                'status' => $faker->boolean(90), // 90% chance of 'true'
                'trash' => $faker->boolean(10),  // 10% chance of 'true'
            ]);
        }
    }
}

