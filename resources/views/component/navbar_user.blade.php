<!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ url('home') }}">Home Page</a>
    <form class="form-inline" action="" method="post">
      <input class="form-control mr-sm-1" type="text" placeholder="Search" size="70px;">
      <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('about') }}">About</a>
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
              <img src="{{ asset('storage/' . Auth::user()->user_image) }}" height="30" width="40" alt="avatar"> {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="{{ url('users/'. Auth::user()->id) }}"><i class="fa fa-id-card"></i> Profile</a>
              <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Settings</a>
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
        <li class="nav-item">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart"></i> Cart</button>
        </li>
        
      </ul>
    </div>
  </nav>