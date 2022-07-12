<nav>
    <div class="menu">
        <h1 class="logo">QFinance</h1>
        @auth
        <ul>
            <li>
                <a href="/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <h2>Home</h2>
                </a>
            </li>
            <li>
                <a href="/stats">
                    <i class='bx bx-stats'></i>
                    <h2>Statistics</h2>
                </a>
            </li>
            <li>
                <a href="/history">
                    <i class='bx bx-history'></i>
                    <h2>History</h2>
                </a>
            </li>
        </ul>
        @endauth
    </div>

    <div class="profile-box">
        @auth
            <div class="profile">
                <a href="/profile">
                    <img src="img/avatar300x300.jpeg">
                    <h3>{{ auth()->user()->name }}</h3>
                </a>
            </div>
            <form method="POST" action="/logout" class="logout">
                @csrf
                <button type="submit"><i class='bx bx-exit'></i></button>
            </form>
        @else
            @if (\Request::is('login'))
                <a href="/register">Register</a>
            @else
                <a href="/login">Login</a>
            @endif
        @endauth
    </div>
</nav>