<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

//to prevent N+1 Problem that query called many times in category as a lazy loading we need it to be eager
//for each post it calls a query to get its category this is wrong
//to fix it we use with('category')->get before all function

//Route to get all posts
Route::get('/', [PostController::class, 'index'])->name('home');

//Route to get single post and it accepts only alphabetic, _ and -
Route::get('posts/{post}', [PostController::class, 'show'])->name('showPost');

//Route to get all post with specific category
// Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('category');

//Route to get all post with its author
// Route::get('authors/{author:username}', [UserController::class, 'show'])->name('showAuthor');
