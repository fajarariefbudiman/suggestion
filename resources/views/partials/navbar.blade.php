<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark navbar-dark sticky-top">
    <div class="container-fluid">
      <a href="/"><img src="/img/suggestion.png" class="rounded-pill" alt="Error" width="40" height="40"></a>  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
      <a class="nav-link {{ Request::is("/") ? 'active' : '' }}" href="/">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is("blog*") ? 'active' : '' }} " href="/blog">Blog</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is("categories") ? 'active' : '' }}" href="/categories">Category</a>
    </li>
  </ul>
  
  <ul class="navbar-nav ms-auto">
         @auth
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse me-2"></i>My Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="bi bi-box-arrow-right me-2">Logout</i>
                </button>
              </form>
          </ul>
        </li>

             @else
             <li class="nav-item"></li>
              <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
            <li class="nav-item"></li>
          <a href="/register" class="nav-link">Register</a>
          @endauth
        </ul>
    
      </div>
    </div>
  </nav>





  