<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h2>Journal</h2>
    <div>
        @guest
            <p>
                Please Log in to proceed, Register a new account if you don't have one already
            </p>
            <a href="/login"><button>Log in</button></a>
            <a href="/register"><button>Register</button></a>
        @endguest
        @auth
        <div>
            <a href="/logout"><button>Log out</button></a>
        </div>
            <div>
                <a href="/new-entry"><button>New entry</button></a>
            </div>
            <div>
                <a href="/entries"><button>Open Journal</button></a>
            </div>
        @endauth


    </div>
</body>
</html>
