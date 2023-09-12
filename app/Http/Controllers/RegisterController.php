<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
       $attributes = request()->validate(
            [
                'name' => 'required|max:255',
                'username' => 'required|max:255|min:3',
                'email' => 'required|email|max:255',
                'password' => 'required|min:7',
            ]
        );

        // dd('Request Successfully Submitted');

        //There are two ways to encrypt password
        //1 - using bcrypt function directly
        //Second way in Model Class

        // $attributes['password'] = bcrypt($attributes['password']);


        User::create($attributes);

        return redirect('/');
    }
}
