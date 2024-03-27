<?php

namespace Database\Factories;

use App\Models\JobArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobArea>
 */
class JobAreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jobs = ["UX/UI", "webdesign", "front-end", "back-end", "fullstack", "animation", "3d", "illustration"];

        $randomJobName = $this->faker->randomElement($jobs);

        // Check if the job name already exists in the database
        $existingJob = JobArea::where('name', $randomJobName)->exists();

        // Loop until a unique job name is found
        while ($existingJob) {
            $randomJobName = $this->faker->randomElement($jobs);
            $existingJob = JobArea::where('name', $randomJobName)->exists();
        }

        return [
            "name" => $randomJobName
        ];
    }
}
