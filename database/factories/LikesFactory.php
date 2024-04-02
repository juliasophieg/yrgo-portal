<?php

namespace Database\Factories;

use App\Models\Likes;
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
        $student = User::where('role', 'student')->inRandomOrder()->first();
        // Get random company
        $company = User::where('role', 'company')->inRandomOrder()->first();

        // Ensure a student only likes a company and vice versa
        $liker = $this->faker->randomElement([$student, $company]);
        $likedUser = $liker->role === 'student' ? $company : $student;

        // Check if the like already exists, if so, recreate the like
        while (Likes::where('liker_id', $liker->id)->where('liked_user_id', $likedUser->id)->exists()) {
            // Get new random users
            $liker = User::where('role', $liker->role === 'student' ? 'student' : 'company')->inRandomOrder()->first();
            $likedUser = $liker->role === 'student' ? $company : $student;
        }

        return [
            'liker_id' => $liker->id,
            'liked_user_id' => $likedUser->id,
        ];
    }
}
