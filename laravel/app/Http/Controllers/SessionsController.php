<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', "Logged out");
    }

    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // attempt to authenticate and log in the user
        // based on the provided credentials
        if(! auth()->attempt($attributes)){
            // auth failed
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);

            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'Your provided credentials could not be verified']);
        }

        session()->regenerate();
        // redirect with a success flash message
        return redirect('/dashboard')->with('success', 'Welcome Back!');
    }
}
