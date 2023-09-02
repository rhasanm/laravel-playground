<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterSchedule; // Import the MasterSchedule model
use App\Models\Team; // Import the Team model
use Faker\Factory as Faker;

class MasterSchedulesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $teams = Team::pluck('id')->toArray();

        // Define the start and end dates for seeding
        $startDate = '2023-09-01';
        $endDate = '2023-10-31';

        foreach (range(1, 20) as $index) {
            // Generate random dates within the specified range (September and October 2023)
            $randomDate = $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');
            
            MasterSchedule::create([
                'title' => $faker->sentence,
                'home_team_id' => $faker->randomElement($teams),
                'away_team_id' => $faker->randomElement($teams),
                'date' => $randomDate, // Use the generated random date
                'time' => $faker->time,
                'location' => $faker->city,
                'sub_location' => $faker->word,
            ]);
        }
    }
}

