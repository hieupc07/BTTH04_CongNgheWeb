<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Issue;
use Faker\Factory as Faker;

class IssuesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Issue::create([
                'computer_id' => $faker->numberBetween(1, 50), 
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisYear(),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
            ]);
        }
    }
}
