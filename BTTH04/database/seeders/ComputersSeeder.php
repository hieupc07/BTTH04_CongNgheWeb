<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Computer;
use Faker\Factory as Faker;

class ComputersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Computer::create([
                'computer_name' => $faker->word . '-' . $i, 
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Linux', 'macOS']),
                'processor' => $faker->word . ' ' . $faker->randomNumber(2, true),
                'ram' => $faker->numberBetween(4, 32),
                'available' => $faker->boolean(),
            ]);
        }
    }
}