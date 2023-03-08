<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reg_number' => fake()->regexify('[A-Z]{3}[0-9]{3}'),
            'model' => fake()->word(),
            'carname' => fake()->word(),
            'owner_id' => null,
        ];
    }
}
