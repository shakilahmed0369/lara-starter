<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-card-dark" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav" >
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.html">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            {{-- @if(auth()->guard('admin')->user()->can('createUser')) --}}
            <li class="nav-item">
              <a class="nav-link" onclick="event.preventDefault()" data-toggle="collapse" href="#collapseExample" role="button">
                <i class="ni ni-badge text-dark"></i>
                <span class="nav-link-text">Admin Control</span>
              </a>
              <ul class="collapse" id="collapseExample">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.role.index') }}"><i class="fas fa-star-of-life"></i>Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.admin-user.index') }}"><i class="fas fa-star-of-life"></i>Users</a></li>
              </ul>
            </li>
            {{-- @endif --}}


            <li class="nav-item">
              <a class="nav-link" onclick="event.preventDefault()" data-toggle="collapse" href="#collapseExample" role="button">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Icons</span>
              </a>
              <ul class="collapse" id="collapseExample">
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-star-of-life"></i>hello</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-star-of-life"></i>hello</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-star-of-life"></i>hello</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
