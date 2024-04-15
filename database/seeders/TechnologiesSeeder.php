<?php

namespace Database\Seeders;

use App\Models\Technologies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technologies::factory(10)->create();
        Technologies::factory(10)->create();
        Technologies::factory(10)->create();
        Technologies::factory(10)->create();
        Technologies::factory(10)->create();
        Technologies::factory(9)->create();
    }
}
