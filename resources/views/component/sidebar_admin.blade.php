<ul class="sidebar navbar-nav">
  <!-- <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('admin/dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li> -->
  @if( Auth::guard('admin')->user()->admin_status == 2 )
    <li class="nav-item {{ Request::is('employees') ? 'active' : ''}}">
      <a class="nav-link" href="{{ url('employees') }}">
        <i class="fa fa-tasks"></i>
        <span>Employees</span>
      </a>
    </li>
     <li class="nav-item {{ Request::is('users') ? 'active' : ''}}">
      <a class="nav-link" href="{{ url('users') }}">
        <i class="fa fa-tasks"></i>
        <span>Users</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('categories') ? 'active' : ''}}">
      <a class="nav-link" href="{{ url('categories') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Categories</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('products') ? 'active' : ''}}">
      <a class="nav-link" href="{{ url('products') }}">
        <i class="fas fa-book"></i>
        <span>Products</span>
      </a>
    </li>
  @endif
  <li class="nav-item {{ Request::is('transactions') ? 'active' : ''}}">
    <a class="nav-link" href="{{ url('transactions') }}">
      <i class="fa fa-shopping-cart"></i>
      <span>Transactions</span>
    </a>
  </li>
  <!-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Login Screens:</h6>
      <a class="dropdown-item" href="login.html">Login</a>
      <a class="dropdown-item" href="register.html">Register</a>
      <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Other Pages:</h6>
      <a class="dropdown-item" href="404.html">404 Page</a>
      <a class="dropdown-item" href="blank.html">Blank Page</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->
</ul>