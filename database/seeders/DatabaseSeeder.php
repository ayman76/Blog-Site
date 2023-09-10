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

        User::truncate();
        Post::truncate();
        Category::truncate();

        $user =  User::factory()->create();

        $perosnal = Category::create([
            'name' => "Personal",
            'slug' => "personal",
        ]);

        $work = Category::create([
            'name' => "Work",
            'slug' => "work",
        ]);

        $hobby = Category::create([
            'name' => "Hobby",
            'slug' => "hobby",
        ]);



        Post::create([
            'title' => "My Family Blog",
            'slug' => "my-family-blog",
            'excerpt' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body' => "<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum distinctio, sint dolorum voluptates ratione nostrum itaque iure excepturi ducimus. Illum expedita unde sequi repudiandae necessitatibus. Sit iure ipsum delectus amet.</p>",
            'category_id' => $perosnal->id,
            'user_id' => $user->id,
        ]);

        Post::create([
            'title' => "My Work Blog",
            'slug' => "my-work-blog",
            'excerpt' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body' => "<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum distinctio, sint dolorum voluptates ratione nostrum itaque iure excepturi ducimus. Illum expedita unde sequi repudiandae necessitatibus. Sit iure ipsum delectus amet.</p>",
            'category_id' => $work->id,
            'user_id' => $user->id,
        ]);

        Post::create([
            'title' => "My Hobbies Blog",
            'slug' => "my-hobbies-blog",
            'excerpt' => '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>',
            'body' => "<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum distinctio, sint dolorum voluptates ratione nostrum itaque iure excepturi ducimus. Illum expedita unde sequi repudiandae necessitatibus. Sit iure ipsum delectus amet.</p>",
            'category_id' => $hobby->id,
            'user_id' => $user->id,
        ]);
    }
}
