<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pricing>
 */
class PricingFactory extends Factory
{
    public $managersIds = [];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $managers = User::where('role', 'manager');

        if(isset($managers)) {
            foreach($managers as $manager) {
                // $this->managersIds[] = $manager->id;
                array_push($this->managersIds, $manager->id);
            }
            
            return [
                'name' => fake()->randomElement([' Offre Gold', 'Offre Platine', 'Offre Diamond']),
                'duration' => fake()->text(),
                'price' => fake()->randomNumber(),
                'user_id'  => $this->managersIds[array_rand($this->managersIds)],
            ];
        }
        
        return null;
    }
}
