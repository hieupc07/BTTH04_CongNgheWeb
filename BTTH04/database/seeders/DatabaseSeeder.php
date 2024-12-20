<?php

namespace Database\Seeders;

use App\Models\User;
use ComputersTableSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use IssuesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    

        $this->call([
            ComputersSeeder::class,
            IssuesSeeder::class, 
        ]);
    }
}
