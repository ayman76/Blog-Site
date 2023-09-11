<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $author)
    {
        return view('posts', [
            'posts' => $author->posts,
            'categories' => Category::all(),
        ]);
    }
}
