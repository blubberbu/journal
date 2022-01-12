<header>
    <h1>
        <a href="/">Photo Journal</a>
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
                <form action="/" method="GET" id="search-bar">
                    <input type="search" name="search" placeholder="Search" aria-label="Search">
                    <button type="submit">
                        <span class="material-icons-sharp">
                            search
                        </span>
                    </button>
                </form>

                <li>
                    <a href="/logout">Log Out</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>
