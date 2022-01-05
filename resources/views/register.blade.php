<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <form action="register" enctype="multipart/form-data" method="POST" id="register-form" class="form">
        @csrf

        <div>
            <label for="name">Full Name</label>
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

        <div class="checkbox-field">
            <input type="checkbox" name="agreement" id="agreement" class="checkbox-input">
            <label for="agreement">I agree with the terms & conditions</label>
        </div>

        <button type="submit">Register</button>
    </form>

    @if ($errors->hasBag('register'))
        <div class="error-container">
            <label for="error" class="error-label">
                <span class="material-icons-round">
                    warning
                </span>
                {{ $errors->register->first() }}
            </label>
        </div>
    @endif
</body>
</html>
