<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\StudentInfo;
use App\Models\CompanyInfo;
use App\Models\UserJob;
use App\Models\Technologies;





/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $email = strtolower("$name@" . fake()->safeEmailDomain());


        return [
            'name' => $name,
            'email' => $email,
            'password' => static::$password ??= Hash::make('password123'),
            'description' => $this->faker->sentence,
            'profile_picture' => '',
            'role' => "",
            'phone' => $this->faker->phoneNumber(),
            'facebook' => 'www.facebook.com/' . $name,
            'linkedin' => 'www.linkedin.com/' . $name,
            'remember_token' => Str::random(10),
            'onboarding_completed' => true,

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Define a state for creating users with associated UserInfo.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withStudentInfo()
    {
        return $this->state(function (array $attributes) {
            return ['role' => 'student'];
        })->afterCreating(function (User $user) {
            $user->userable()->associate(StudentInfo::factory()->create());
        });
    }
    public function withCompanyInfo()
    {
        return $this->state(function (array $attributes) {
            return ['role' => 'company'];
        })->afterCreating(function (User $user) {
            $user->userable()->associate(CompanyInfo::factory()->create());
            $user->save();
        });
    }

    public function withTechnologies($count = 3)
    {
        return $this->afterCreating(function (User $user) use ($count) {
            $user->technologies()->attach(Technologies::inRandomOrder()->limit($count)->get());
            $user->save();
        });
    }

    public function withJob()
    {
        return $this->has(UserJob::factory()->withTechnologies()->count(1));
    }
}
