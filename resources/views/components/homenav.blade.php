<nav class="navbar navbar-expand-lg bg-body-tertiary bg-transparent navbar-dark sticky"
    style="box-shadow: none !important;>
    <div class="container-fluid">
        <button class="navbar-toggler text-dark border-dark" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: red !important;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto container d-flex justify-content-end">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark me-5 fs-5" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class="bi bi-layout-text-sidebar-reverse me-2"></i>My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2 text-dark"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link text-dark fs-4"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link text-dark fs-4">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
