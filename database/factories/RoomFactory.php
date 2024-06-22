<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $managers = User::where('role', 'manager');

        return [
            'name' => fake()->words(5, true),
            'description' => fake()->text(),
            'site_url' => fake()->url(),
            'cover_image' => fake()->imageUrl(),
            'overview_image' => fake()->imageUrl(),
            'status' => fake()->boolean(),
            'user_id'  => fake()->randomElement($managers->pluck('id')),
        ];
    }
}
