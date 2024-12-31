@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h1>Login</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>

        <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
    </div>
@endsection
