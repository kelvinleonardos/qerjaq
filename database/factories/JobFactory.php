<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'position' => fake()->jobTitle(),
            'category' => fake()->jobTitle(),
            'type' => fake()->word(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'description' => fake()->paragraph(5),
            'requirements' => fake()->paragraph(3),
            'salary' => fake()->randomNumber(6),
            'applicants_quota' => 3,
            'applicants_count' => 3,
            'isActive' => 1,
            'company_id' => 1,
        ];
    }
}
