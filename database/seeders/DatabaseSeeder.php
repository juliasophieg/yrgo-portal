<?php

namespace Database\Seeders;

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

        // Creating a users with associated StudentInfo (student role)
        User::factory(50)->withStudentInfo()->withTechnologies(5)->create();

        // Creating users with associated CompanyInfo (company role)
        User::factory(50)->withCompanyInfo()->create();
    }
}
