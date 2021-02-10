  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary bg-light elevation-4" style="position: fixed; overflow: hidden; height: 100%;">
    <!-- Brand Logo -->
    <a href="/" class="navbar-brand text-info p-3 brand-link text-center">
      	<img src="{{ asset('user/sundar-karnali.jpg') }}" class="img-fluid" style="height: 100px; width: 100px;" /> <span style="font-weight: bold;">सुन्दर कर्णाली</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('addnews') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add more</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('review') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reviews
              </p>
            </a>
          </li>
          @can('isAdmin')
          <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Register New User
              </p>
            </a>
          </li>
          @endcan
          <!-- @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
