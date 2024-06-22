<?php

namespace Database\Seeders;

use App\Models\Outfit;
use App\Models\Pricing;
use App\Models\Room;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Firdaous',
            'last_name' => 'Mohamed',
            'email' => 'root@gmail.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'phone_number' => fake()->phoneNumber(),
            'birth_date' => fake()->dateTimeBetween('-60 years', '-24 years'),
            'password' => bcrypt('123')
        ]);

        $manager = User::create([
            'first_name' => 'Firdaous',
            'last_name' => 'Mohamed',
            'email' => 'mohamedfidorce@gmail.com',
            'email_verified_at' => now(),
            'role' => 'manager',
            'phone_number' => fake()->phoneNumber(),
            'birth_date' => fake()->dateTimeBetween('-60 years', '-24 years'),
            'password' => bcrypt('123')
        ]);

        $pricings = [
            [
                'name' => "Offre 1: Abonnement d'une année (365 jours)",
                'duration' => 360,
                'price' => 120000,
                'user_id'  => $manager->id,
            ],
            [
                'name' => "Offre 2: Abonnement de six mois (180 jours)",
                'duration' => 180,
                'price' => 60000,
                'user_id'  => $manager->id,
            ],
            [
                'name' => "Offre 3: Abonnement de trois mois (90 jours)",
                'duration' => 90,
                'price' => 30000,
                'user_id'  => $manager->id,
            ],
            [
                'name' => "Offre 4: Abonnement d'un mois (30 jours)",
                'duration' => 30,
                'price' => 10000,
                'user_id'  => $manager->id,
            ],
        ];

        foreach ($pricings as $item) {
            Pricing::create($item);
        }

        User::factory(13)->create();
        Outfit::factory(70)->create();
        Room::factory(20)->create();
    }
}
