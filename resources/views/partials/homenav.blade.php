<nav class="navbar navbar-expand-lg bg-body-tertiary bg-transparent navbar-dark sticky">
  <ul class="navbar-nav ms-auto">
         @auth
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fs-5" href="#" id="navbarDropdown"role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse me-2"></i>My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right me-2 text-dark">Logout</i>
                </button>
              </form>
          </ul>
        </li>

             @else
             <li class="nav-item"></li>
              <a href="/login" class="nav-link text-dark fs-4"><i class="bi bi-box-arrow-in-right"></i>Login</a>
            <li class="nav-item"></li>
          <a href="/register" class="nav-link text-dark fs-4">Register</a>
          @endauth
        </ul>
    
      </div>
    </div>
  </nav>





  