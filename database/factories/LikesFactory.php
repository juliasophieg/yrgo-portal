<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Likes>
 */
class LikesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Get a random user with role "student"
        $student = User::where('role', 'student')->inRandomOrder()->first();

        // Get a random user with role "company"
        $company = User::where('role', 'company')->inRandomOrder()->first();

        // Randomly choose whether the student or company is the liker
        $liker = $this->faker->randomElement([$student, $company]);

        // Select the likee based on the liker's role
        $likee = ($liker->role === 'student') ? $company : $student;

        return [
            'liker_id' => $liker->id,
            'likee_id' => $likee->id,
        ];
    }
}
