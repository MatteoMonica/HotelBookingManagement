<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
        <img src="https://img.icons8.com/carbon-copy/2x/domain.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            @if (Auth::check())
                <li class="nav-item active">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @else
                <li class="nav-item active">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endif

            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Management
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/manageUsers">Manage Users</a>
                        <a class="dropdown-item" href="/manageRooms">Manage Rooms</a>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>
