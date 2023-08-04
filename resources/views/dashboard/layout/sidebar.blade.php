<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is("dashboard") ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{ Request::is("dashboard/posts*") ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Post
          </a>
        </li>
      </ul>

      @can('admin')         
     <h5 class="sidebar-heading d-flex justify-content-beetwen align-items-center px-3 mb-1 mt-4 text-muted fs-6"><span>Administrator</span></h5>
      <li class="nav-item">
        <a class="nav-link  {{ Request::is("dashboard/categories*") ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid" class="align-text-bottom ms-3"></span>
          Categories
        </a>
      </li>
      @endcan
      
    </div>
  </nav>