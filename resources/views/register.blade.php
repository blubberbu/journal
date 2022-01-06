@extends('templates.master')

@section('title', 'Log In')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/form.css') }}">
@endsection

@section('content')
    <h2>Register</h2>

    <form action="register" enctype="multipart/form-data" method="POST" id="register-form" class="form">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="user@example.com">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
            <label for="password-confirm">Confirm Password</label>
            <input type="password" name="password-confirm" id="password-confirm">
        </div>

        <button type="submit">Register</button>
    </form>

    @if ($errors->hasBag('register'))
        <div class="error-container">
            <label for="error" class="error-label">
                <span class="material-icons-sharp">
                    warning
                </span>
                {{ $errors->register->first() }}
            </label>
        </div>
    @endif
@endsection
