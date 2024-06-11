<?php

namespace Database\Seeders;

use App\Models\Outfit;
use App\Models\OutfitRoom;
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
        User::factory()->create([
            'first_name' => 'Firdaous',
            'last_name'=> 'Mohamed',
            'email'=> 'root@gmail.com',
            'email_verified_at' => now(),
            'role'=> 'admin',
            'phone_number'=> fake()->phoneNumber(),
            'birth_date'=> fake()->dateTimeBetween('-60 years', '-24 years'),
            'password'=> bcrypt('123')
        ]);


        User::factory()->create([
            'first_name' => 'Firdaous',
            'last_name'=> 'Mohamed',
            'email'=> 'mohamedfidorce@gmail.com',
            'email_verified_at' => now(),
            'role'=> 'manager',
            'phone_number'=> fake()->phoneNumber(),
            'birth_date'=> fake()->dateTimeBetween('-60 years', '-24 years'),
            'password'=> bcrypt('123')
        ]);

        User::factory(13)->create();
        Outfit::factory(100)->create();
        Room::factory(20)->create();
        OutfitRoom::factory(50)->create();
    }
}
