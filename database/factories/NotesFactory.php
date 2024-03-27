<?php

namespace Database\Factories;

use App\Models\Likes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notes>
 */
class NotesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $like = Likes::query()->inRandomOrder()->first();
        return [
            "text" => $this->faker->realText(200),
            "like_id" => $like->id
        ];
    }
}
