<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route to get all posts
Route::get('/', function () {


    //to prevent N+1 Problem that query called many times in category as a lazy loading we need it to be eager
    //for each post it calls a query to get its category this is wrong
    //to fix it we use with('category')->get before all function

    return view('posts', [
        "posts" => Post::with('category')->get(),
    ]);
});

//Route to get single post and it accepts only alphabetic, _ and -
Route::get('posts/{post}', function (Post $post) {

    return view('post', [
        'post' => $post,
    ]);
});


Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
    ]);
});
