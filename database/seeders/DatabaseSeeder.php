<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        \App\Models\User::create([
            'fullname' => 'Fajar Arief Budiman',
            'username' => 'FajrArf',
            'email' => 'budimanfajar660@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => '1'
        ]);
        \App\Models\User::factory(3)->create();
        \App\Models\Category::create([
            "name" => "Story Of My Life",
            "slug" => "story-of-mylife",
            "description" => fake()->paragraph(1)
        ]);
        \App\Models\Category::create([
            "name" => "My Dream",
            "slug" => "my-dream",
            "description" => fake()->paragraph(1)
        ]);
        \App\Models\Category::create([
            "name" => "Earth",
            "slug" => "earth",
            "description" => fake()->paragraph(1)
        ]);
        \App\Models\Post::factory(50)->create();
    }
}
