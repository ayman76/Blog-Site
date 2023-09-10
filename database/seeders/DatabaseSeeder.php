<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user =  User::factory()->create();

        //This will allow us to set all posts to same user
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);

        //This is default way that each post will have a unique user and category
        // Post::factory(5)->create();
    }
}
