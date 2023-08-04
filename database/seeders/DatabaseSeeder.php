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
            'name' => 'Fajar Arief Budiman',
            'username' => 'FajrArf',
            'email' => 'budimanfajar660@gmail.com',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(3)->create();
        \App\Models\Category::create([
            "name" => "Story Of My Life",
            "slug" => "story-of-mylife"
        ]);
        \App\Models\Category::create([
            "name" => "My Dream",
            "slug" => "my-dream"
        ]);
        \App\Models\Category::create([
            "name" => "Earth",
            "slug" => "earth"
        ]);
        \App\Models\Post::factory(20)->create();
    }
}
