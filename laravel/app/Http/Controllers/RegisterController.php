<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('account.register');
    }

    public function store()
    {
        $attributes = request()->validate([ // validation automatically returns if it doesn't pass
            'name' => ['required', 'max:255', 'min:3'],
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', 'min:7']
        ]);

        $user = User::create($attributes);

        // log the user in
        auth()->login($user);

        return redirect('/dashboard')->with('success', 'Your account has been created.');
    }
}
