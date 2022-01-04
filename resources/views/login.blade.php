<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
</head>
<body>

    <div>
        <h2>Log In</h2>

    <form action="login" enctype="multipart/form-data" method="POST" id="login-form">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="user@example.com" value="{{ Cookie::get('emailCookie') != null ? Cookie::get('emailCookie') : '' }}">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ Cookie::get('passwordCookie') != null ? Cookie::get('passwordCookie') : '' }}">
        </div>

        <div id="remember-field">
            <input type="checkbox" name="remember" id="remember" {{ Cookie::get('emailCookie') != null ? 'checked' : '' }}>
            <label for="remember">Remember Me</label>
        </div>

        <button type="submit">Log In</button>
    </form>

    @if ($errors->hasBag('login'))
        <div class="error-wrapper">
            <label for="error" class="error-label">
                {{ $errors->login->first() }}
            </label>
        </div>
    @endif
    </div>

</body>
</html>
