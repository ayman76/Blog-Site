<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            "email" => 'required|email',
            "password" => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            //To Avoid Session fixation attack
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        //There is two ways to redirect if we can't login
        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified.',]);

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.',
        ]);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
