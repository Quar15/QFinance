@extends('layout')

@section('styles')

    <link rel="stylesheet" href="./css/style-login.css">

@endsection

@section('content')

    <main class="wrapper">
        <h1 class="">Register</h1>

        <form method="POST" action="/register" class="mt-10">
            @csrf
            <div class="">
                <input class=""
                        placeholder="Name"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                >

                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="">
                <input class=""
                        placeholder="Username"
                        type="text"
                        name="username"
                        id="username"
                        value="{{ old('username') }}"
                        required
                >

                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="">
                <input class=""
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

            <div class="">
                <input class=""
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

            <div class="">
                <button type="submit" class="">
                    Register
                </button>
            </div>
        </form>
    </main>

@endsection