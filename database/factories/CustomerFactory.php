<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->numberBetween(100, 999),
            'name' => fake()->company(),
            'manager_name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'street' => fake()->streetName(),
            'street_number' => fake()->numberBetween(0, 100)
        ];
    }
}
