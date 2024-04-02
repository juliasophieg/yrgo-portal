<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyInfo>
 */
class CompanyInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyName = $this->faker->company();
        $companyEmail = "$companyName@" . fake()->safeEmailDomain();
        $companyPhone = $this->faker->phoneNumber();
        $industries = ["Web Development", "Digital Design"];
        $roles = ["cool dude", "web people", "someone that likes cats"];
        return [

            'company_name' => $companyName,
            'company_contact_number' => $companyPhone,
            'company_contact_email' => $companyEmail,
            'employees' => rand(1, 100),
            'company_industry' => $this->faker->randomElement($industries),
            'company_website' => 'www.website.com',
            'looking_for' => $this->faker->randomElement($roles),
            'total_positions' => 4,
            'location' => $this->faker->address(),

        ];
    }
}
