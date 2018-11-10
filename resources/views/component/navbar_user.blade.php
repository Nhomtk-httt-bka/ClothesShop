<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">Home Page</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Contact</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-id-card"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                <a class="dropdown-item" href="portfolio-2-col.html">Cards</a>
                <a class="dropdown-item" href="portfolio-3-col.html">1 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-4-col.html">2 Column Portfolio</a>
                <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
              </div>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Pages
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                <a class="dropdown-item" href="faq.html">FAQ</a>
                <a class="dropdown-item" href="404.html">404</a>
                <a class="dropdown-item" href="pricing.html">Pricing Table</a>
              </div>
            </li>
            @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-id-card"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                  <a class="dropdown-item" href="#">Activity log</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                </div>
              </li>
            @endauth
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ url('login') }}"><i class="fa fa-user"></i> Sign in</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('users/create') }}"><i class="fa fa-user-plus"></i> sign up</a>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>