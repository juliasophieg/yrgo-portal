<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentInfo>
 */
class StudentInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $programs = ["Webbutvecklare", "Digital Designer"];

        return [
            'program' => $this->faker->randomElement($programs),
        ];
    }
}
