{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    My Post
                </a>
            </li>
        </ul>

        @can('admin')
            <h5 class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mb-1 mt-4 text-muted fs-6">
                <span>Administrator</span></h5>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                    href="/dashboard/categories">
                    <span data-feather="grid" class="align-text-bottom ms-3"></span>
                    Categories
                </a>
            </li>
        @endcan

    </div>
</nav> --}}
<ul class="navbar-nav sidebar sidebar-dark accordio" id="accordionSidebar"
    style="background: linear-gradient(to bottom, rgb(68, 82, 173), rgb(105, 167, 233))">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Suggestion</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="text-white">Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('dashboard/posts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/dashboard/posts') }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span class="text-white">My Post</span>
        </a>
    </li>

    @can('admin')
        <li class="nav-item {{ request()->is('dashboard/admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/dashboard/admin') }}">
                <i class="fas fa-fw fa-key"></i>
                <span class="text-white">Admin</span>
            </a>
        </li>

        <li class="nav-item {{ request()->is('dashboard/categories') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/dashboard/categories') }}">
                <i class="fas fa-fw fa-list"></i>
                <span class="text-white">Categories</span>
            </a>
        </li>
    @endcan

    <!-- Dropdown Example -->


    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-right-from-bracket"></i>
            <span class="fw-semibold text-white">Logout</span>
        </a>
    </li>

</ul>



{{-- @can('admin')
        <h5 class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mb-1 mt-4 text-muted fs-6">
            <span>Administrator</span>
        </h5>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                <span data-feather="grid" class="align-text-bottom ms-3"></span>
                Categories
            </a>
        </li>
    @endcan --}}

<!-- Divider -->
{{-- <hr class="sidebar-divider"> --}}
