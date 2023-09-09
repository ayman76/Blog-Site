<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    return view('posts', [
        "posts" => Post::all(),
    ]);
});

//Route to get single post and it accepts only alphabetic, _ and -
Route::get('posts/{post}', function ($id) {

    return view('post', [
        'post' => Post::findOrFail($id),
    ]);
});
