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
 
            {{-- @if(auth()->guard('admin')->user()->can('create-Admin-User')) --}}
            {{-- <li class="nav-item">
              <a class="nav-link" onclick="event.preventDefault()" data-toggle="collapse" href="#collapseExample" role="button">
                <i class="ni ni-badge text-dark"></i>
                <span class="nav-link-text">Admin Control</span>
              </a>
              <ul class="collapse" id="collapseExample">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.role.index') }}"><i class="fas fa-star-of-life"></i>Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.admin-user.index') }}"><i class="fas fa-star-of-life"></i>Users</a></li>
              </ul>
            </li> --}}
            {{-- @endif --}}

            {{-- testing --}}

            
              @php
              /* menu query's */
                $allMenuItem = DB::table('menus')->get();
                $parentMenuItem = DB::table('menus')->where('parent_id', 0)->get();
              @endphp
              @foreach ($parentMenuItem as $parentItem)
              <li class="nav-item">
                @php
                  $hasChild = DB::table('menus')->where('parent_id', $parentItem->id)->get();
                @endphp
                @if (count($hasChild)>0)
                  <a class="nav-link" onclick="event.preventDefault()" data-toggle="collapse" href="#collapse-{{ $parentItem->id }}" role="button">
                    <i class="{{ $parentItem->icon }}"></i>
                    <span class="nav-link-text">{{ $parentItem->name }}</span>
                  </a>
                  <ul class="collapse
                  @foreach ($allMenuItem as $childItem)
                  @if ($parentItem->id == $childItem->parent_id)
                  {{ (request()->is($childItem->uri)) ? 'show' : '' }}
                  @endif
                  @endforeach
                  " id="collapse-{{ $parentItem->id }}">
                    @foreach ($allMenuItem as $childItem)
                        @if ($parentItem->id == $childItem->parent_id)
                        <li class="nav-item {{ (request()->is($childItem->uri)) ? 'active' : '' }}"><a class="nav-link" href="{{ url($childItem->uri) }}"><i class="{{ $childItem->icon }}"></i>{{ $childItem->name }}</a></li>
                        @endif
                    @endforeach
                  </ul>
                @else
                  <a class="nav-link {{ (request()->is($parentItem->uri)) ? 'active' : '' }}" href="{{ url($parentItem->uri) }}" role="button">
                    <i class="{{ $parentItem->icon }}"></i>
                    <span class="nav-link-text">{{ $parentItem->name }}</span>
                  </a>
                @endif
              </li>
              @endforeach

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
