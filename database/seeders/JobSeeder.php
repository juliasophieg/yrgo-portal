<?php

namespace Database\Seeders;

use App\Models\UserJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserJob::factory(60)->withTechnologies(5)->create();
    }
}
