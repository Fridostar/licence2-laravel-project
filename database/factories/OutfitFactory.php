<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outfit>
 */
class OutfitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->text(),
            'sale_price' => fake()->randomNumber(),
            'cover_image' => fake()->imageUrl(),
            'status' => fake()->boolean(),
            'user_id' => fake()->numberBetween(1, 15),
        ];
    }
}
