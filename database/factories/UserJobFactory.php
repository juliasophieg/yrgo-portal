<?php

namespace Database\Factories;

use App\Models\UserJob;
use App\Models\JobArea;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class UserJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::query()->inRandomOrder()->first();
        return [
            "description" => $this->faker->sentence(10),
            "user_id" => $user->id
        ];
    }
    public function withJobAreas($limit = 3)
    {

        return $this->afterCreating(function (UserJob $job) use ($limit) {
            $job->jobAreas()->attach(JobArea::inRandomOrder()->limit($limit)->get());
            $job->save();
        });
    }
}
