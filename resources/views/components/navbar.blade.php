@props(['categories'])
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-white navbar-white sticky-top py-4" style="margin-bottom: 80px; ">
    <div class="container-fluid mx-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="text-decoration-none fajar d-lg-block me-5 d-none" href="/">SGS</a>
                    <!-- SGS Mobile -->
                    <a class="fajar-mobile text-decoration-none fajar d-lg-none" href="/">SGS</a>
                    {{-- <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog*') ? 'active' : '' }}" href="/blog">Blog</a>
                </li>

                <!-- Dropdown Category -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('categories*') ? 'active' : '' }}"
                        id="categoryDropdown" role="button">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('get-category-by-slug', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item">
                    <form class="d-flex" role="search" action="{{ route('search-posts') }}" method="GET">
                        <input class="form-control search-input w-100" type="search" name="q"
                            placeholder="Search" aria-label="Search" value="{{ request()->get('q') }}">
                    </form>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->fullname }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class="bi bi-layout-text-sidebar-reverse me-2"></i>My Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
