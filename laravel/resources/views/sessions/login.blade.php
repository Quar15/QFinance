@extends('layout')

@section('styles')

    <link rel="stylesheet" href="./css/style-login.css">

@endsection

@section('content')

    <main class="wrapper">
        <h1>Login</h1>

        <form method="POST" action="/login">
            @csrf

            <div>
                <input 
                        placeholder="Email"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        required
                >

                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input 
                        placeholder="Password"
                        type="password"
                        name="password"
                        id="password"
                        required
                >

                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit">
                    Log In
                </button>
            </div>
        </form>
    </main>

@endsection