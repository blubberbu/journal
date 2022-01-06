<header>
    <h1>
        <a href="/">Journal</a>
    </h1>

    <nav>
        <ul>
            @guest
                <li>
                    <a href="/login">Log In</a>
                </li>

                <li>
                    <a href="/register">Register</a>
                </li>
            @endguest
            
            @auth
                <li>
                    <a href="/logout">Log Out</a>
                </li>
            @endauth
        </ul>   
    </nav>
</header>
