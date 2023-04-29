<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::inRandomOrder()->first()->id; // Get a random user id from the User model
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'years' => rand(18,100),
            'user_id' => $user_id,
        ];
    }
}
