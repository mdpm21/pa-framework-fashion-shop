<header class="navbar navbar-light sticky-top bg-dark flex-md-nowrap p-0 bg-primary">
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary bg-gradient sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <div class="text-center">
      <i class="bi bi-person-circle me-2 text-light fs-1"></i>
        <p class="text-light">{{Auth::user()->name }}  </p>
      </div>
      <!-- <hr class="me-3 ms-3 mb-2 text-light">
      <li class="nav-item">
        <a class="nav-link text-light" aria-current="page" href="/admin/dashboard">
          <span data-feather="pie-chart" class="align-text-bottom text-light"></span>
          Dashboard
        </a>
      </li>
      <hr class="me-3 ms-3 mt-2 text-light"> -->
      <li class="nav-item">
        <a class="nav-link text-light" href="/user/profile">
          <span data-feather="user" class="align-text-bottom text-light"></span>
          Profile 
          {{-- <span class="badge text-bg-danger float-end">1</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/user/wishlist">
          <span class="bi bi-bag-heart" class="align-text-bottom text-light"></span>
          &ensp;Wishlist 
          <!-- <span class="badge text-bg-danger float-end">{{ $pendingOrders }}</span> -->
          <span class="badge text-bg-danger float-end">10</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/user/cart">
          <span data-feather="shopping-cart" class="align-text-bottom text-light"></span>
          Cart 
          <span class="badge text-bg-danger float-end">2</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/user/setting">
          <span data-feather="settings" class="align-text-bottom text-light"></span>
          Setting 
          {{-- <span class="badge text-bg-danger float-end">1</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="/auth/logout">
          <span data-feather="log-out" class="align-text-bottom text-light"></span>
          Log Out
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="bar-chart-2" class="align-text-bottom"></span>
          Reports
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="layers" class="align-text-bottom"></span>
          Integrations
        </a>
      </li> --}}
    </ul>
  </div>
</nav>